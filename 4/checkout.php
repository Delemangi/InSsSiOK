<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id = $_POST['cart_id'];

    $stmt = $conn->prepare("SELECT payment_type FROM shopping_cart WHERE id = :cart_id");
    $stmt->bindParam(':cart_id', $cart_id);
    $stmt->execute();
    $paymentType = $stmt->fetchColumn();

    $stmt = $conn->prepare("SELECT p.unit_price, ci.product_amount
                                FROM cart_items ci
                                JOIN products p ON ci.product_id = p.id
                                WHERE ci.cart_id = :cart_id");
    $stmt->bindParam(':cart_id', $cart_id);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalPrice = 0;
    foreach ($items as $item) {
        $totalPrice += $item['unit_price'] * $item['product_amount'];
    }

    if (isset($_POST['cash'])) {
        echo "Receipt for cash payment. Total Price: $$totalPrice";
    } elseif (isset($_POST['card'])) {
        $totalPrice *= 0.95;
        echo "Receipt for card payment with 5% discount. Total Price: $$totalPrice";
    } else {
        echo "Invalid payment type.";
    }
}
