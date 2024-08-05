const cartItems = []; 

// Function to update the cart display
function updateCartDisplay(itemPrice) {
    const cartItemElement = document.getElementById("cart-item");
    const cartBalanceElement = document.getElementById("cart-balance");
    
    const totalItems = cartItems.length;
    const totalBalance = cartItems.reduce((sum, itemPrice) => sum + itemPrice, 0);

    
    // cartItemElement.textContent = totalItems;
    // cartBalanceElement.textContent = totalBalance;
}



function addToCart(event, number) {
    const itemElement = event.target.parentElement.parentElement;
    const itemName = itemElement.querySelector("h4").textContent;
    const itemPrice = parseFloat(itemElement.querySelector("p.price").textContent);
    
    cartItems.push(itemPrice);
    
    updateCartDisplay(itemPrice);

    const details = {
        balance: itemPrice, 
        item: itemName 
    };

    $.ajax({
        type: 'POST',
        url: 'process_details.php',
        data: {
            details: JSON.stringify(details)
        },
        success: function(response) {
            console.log('Response from PHP:', response);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });

    location.reload();

}

