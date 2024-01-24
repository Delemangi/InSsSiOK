<?php
include 'config.php';

session_start();

if (!isset($_SESSION['cart_id'])) {
    $stmt = $conn->prepare("INSERT INTO shopping_cart (date_and_time) VALUES (NOW())");
    $stmt->execute();
    $_SESSION['cart_id'] = $conn->lastInsertId();
}

$cart_id = $_SESSION['cart_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_code = $_POST['product_code'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("SELECT id FROM products WHERE product_code = :product_code");
    $stmt->bindParam(':product_code', $product_code);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $stmt = $conn->prepare("INSERT INTO cart_items (product_id, cart_id, product_amount) VALUES (:product_id, :cart_id, :product_amount)");
        $stmt->bindParam(':product_id', $product['id']);
        $stmt->bindParam(':cart_id', $cart_id);
        $stmt->bindParam(':product_amount', $quantity);
        $stmt->execute();
    } else {
        echo "The product does not exist :(";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket Cash Register</title>
</head>
<body>
<h1>Supermarket Cash Register</h1>

<form action="index.php" method="post">
    Product Code: <input type="text" name="product_code" required>
    Quantity: <input type="number" name="quantity" step="any" required>
    <input type="submit" value="Add to Basket">
</form>

<h2>Report</h2>
<a href="report.php">Generate Report</a>

<h2>New Product</h2>
<a href="new_product.php">Add New Product</a>

<h2>Basket</h2>
<table>
    <tr>
        <th>Product Name</th>
        <th>Single Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
    </tr>
    <?php
    $stmt = $conn->prepare("SELECT p.product_name, p.unit_price, ci.product_amount, (p.unit_price * ci.product_amount) as total_price
                                FROM cart_items ci
                                JOIN products p ON ci.product_id = p.id
                                WHERE ci.cart_id = :cart_id");
    $stmt->bindParam(':cart_id', $cart_id);
    $stmt->execute();
    $basketItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($basketItems as $item): ?>
        <tr>
            <td><?= $item['product_name'] ?></td>
            <td><?= $item['unit_price'] ?></td>
            <td><?= $item['product_amount'] ?></td>
            <td><?= $item['total_price'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Total Price: <?= array_sum(array_column($basketItems, 'total_price')) ?></p>

<form action="checkout.php" method="post">
    <input type="hidden" name="cart_id" value="<?= $cart_id ?>">
    <input type="submit" name="cash" value="Pay by Cash">
    <input type="submit" name="card" value="Pay by Card">
</form>
</body>
</html>
