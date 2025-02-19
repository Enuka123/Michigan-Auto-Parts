<?php
session_start();
include("connect.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Check if data is received and valid
    if (json_last_error() !== JSON_ERROR_NONE || !$data || !isset($data['items']) || !isset($data['total'])) {
        echo json_encode(["success" => false, "message" => "Invalid order data."]);
        exit;
    }

    $items = $data['items'];
    $total = $data['total'];
    $user_email = $_SESSION['email'] ?? null;

    if (!$user_email) {
        echo json_encode(["success" => false, "message" => "User is not logged in."]);
        exit;
    }

    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Insert order into `orders` table
        $sql = "INSERT INTO cart (user_email, total_price, order_date) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sd", $user_email, $total);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to save order.");
        }

        $order_id = $stmt->insert_id;
/*
        // Prepare to insert order details
        $sql_details = "INSERT INTO shop (order_id, product_name, price) VALUES (?, ?, ?)";
        $stmt_details = $conn->prepare($sql_details);
        
        foreach ($items as $item) {
            $stmt_details->bind_param("isd", $order_id, $item['title'], $item['price']);
            if (!$stmt_details->execute()) {
                throw new Exception("Failed to save order details for item: " . $item['title']);
            }
        }*/

        // Commit transaction
        $conn->commit();
        echo json_encode(["success" => true, "message" => "Order placed successfully."]);
    } catch (Exception $e) {
        $conn->rollback(); // Rollback transaction on error
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
    } finally {
        $stmt->close();
        $stmt_details->close();
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

$conn->close();
?>
