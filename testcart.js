// OPEN & CLOSE CART
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => {
    cart.classList.add("active");
});

closeCart.addEventListener("click", () => {
    cart.classList.remove("active");
});

// Start when the document is ready
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", start);
} else {
    start();
}

// =============== START ====================
function start() {
    addEvents();
}

// ============= UPDATE & RERENDER ===========
function update() {
    addEvents();
    updateTotal();
}

// =============== ADD EVENTS ===============
function addEvents() {
    // Remove items from cart
    let cartRemoveBtns = document.querySelectorAll(".cart-remove");
    cartRemoveBtns.forEach((btn) => {
        btn.addEventListener("click", handleRemoveCartItem);
    });

    // Change item quantity
    let cartQuantityInputs = document.querySelectorAll(".cart-quantity");
    cartQuantityInputs.forEach((input) => {
        input.addEventListener("change", handleChangeItemQuantity);
    });

    // Add item to cart
    let addCartBtns = document.querySelectorAll(".add-cart");
    addCartBtns.forEach((btn) => {
        btn.addEventListener("click", handleAddCartItem);
    });

    // Buy Order
    const buyBtn = document.querySelector(".btn-buy");
    buyBtn.addEventListener("click", handleBuyOrder);
}

// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

function handleAddCartItem() {
    let product = this.parentElement;
    let title = product.querySelector(".product-title").innerHTML;
    let price = parseFloat(product.querySelector(".product-price").innerHTML);
    let imgSrc = product.querySelector(".product-img").src;

    // Handle item already exists
    if (itemsAdded.find((el) => el.title === title)) {
        alert("This Item Is Already in the Cart!");
        return;
    } else {
        itemsAdded.push({ title, price, imgSrc });
    }

    // Add product to cart
    let cartBoxElement = CartBoxComponent(title, price, imgSrc);
    let newNode = document.createElement("div");
    newNode.innerHTML = cartBoxElement;
    const cartContent = cart.querySelector(".cart-content");
    cartContent.appendChild(newNode);

    update();
}

function handleRemoveCartItem() {
    this.parentElement.remove();
    itemsAdded = itemsAdded.filter(
        (el) => el.title !== this.parentElement.querySelector(".cart-product-title").innerHTML
    );
    update();
}

function handleChangeItemQuantity() {
    if (isNaN(this.value) || this.value < 1) {
        this.value = 1;
    }
    this.value = Math.floor(this.value); // to keep it integer
    update();
}

async function handleBuyOrder() {
    if (itemsAdded.length <= 0) {
        alert("There is No Order to Place Yet! \nPlease Make an Order first.");
        return;
    }

    const cartData = {
        items: itemsAdded,
        total: document.querySelector(".total-price").innerText.replace("Rs.", "").trim(),
    };

    try {
        const response = await fetch("save_order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(cartData),
        });

        const result = await response.json();

        if (response.ok && result.success) {
            alert("Your Order is Placed Successfully :)");
            document.querySelector(".cart-content").innerHTML = "";
            itemsAdded = [];
            update();
        } else {
            alert(result.message || "Failed to place order. Please try again later.");
        }
    } catch (error) {
        console.error("Error placing order:", error);
        alert("Error placing order, please try again.");
    }
}

// =========== UPDATE & RERENDER FUNCTIONS =========
function updateTotal() {
    let cartBoxes = document.querySelectorAll(".cart-box");
    const totalElement = cart.querySelector(".total-price");
    let total = 0;
    cartBoxes.forEach((cartBox) => {
        let priceElement = cartBox.querySelector(".cart-price");
        let price = parseFloat(priceElement.innerHTML.replace("Rs.", ""));
        let quantity = cartBox.querySelector(".cart-quantity").value;
        total += price * quantity;
    });

    total = total.toFixed(2); // Keep 2 digits after the decimal point
    totalElement.innerHTML = "Rs. " + total;
}

// ============= HTML COMPONENTS =============
function CartBoxComponent(title, price, imgSrc) {
    return `
        <div class="cart-box">
            <img src="${imgSrc}" alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">Rs. ${price.toFixed(2)}</div>
                <input type="number" value="1" class="cart-quantity">
            </div>
            <i class='bx bxs-trash-alt cart-remove'></i>
        </div>`;
}
