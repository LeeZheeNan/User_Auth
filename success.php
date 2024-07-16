<?php
// success.php

// Check if the payment was successful 
$paymentSuccessful = true; 

if ($paymentSuccessful) {
    // Display success message
    echo "<script>alert('Payment successful! Thank you for your order.')</script>";

    // Redirect back to cart page (cart.php)
    echo "<script>location.href='order.html'</script>";
    exit;
} else {
    // Payment failed
    echo "Payment failed. Please try again later.";
}
?>