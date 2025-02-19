// Get the search input and items
const searchInput = document.getElementById('searchInput');
const items = document.querySelectorAll('.item');

// Add an event listener to the search input
searchInput.addEventListener('input', function() {
    const searchText = searchInput.value.toLowerCase();

    items.forEach(item => {
        const itemName = item.getAttribute('data-name').toLowerCase();
        
        // Show or hide the item based on the search input
        if (itemName.includes(searchText)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
