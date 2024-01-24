<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $unit_price = $_POST['unit_price'];

    $stmt = $conn->prepare("INSERT INTO products (product_name, product_code, unit_price) VALUES (:product_name, :product_code, :unit_price)");
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':product_code', $product_code);
    $stmt->bindParam(':unit_price', $unit_price);
    $stmt->execute();

    header("Location: new_product.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
</head>
<body>
<h1>New Product</h1>

<form action="new_product.php" method="post">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br>

    <label for="product_code">Product Code:</label>
    <input type="text" name="product_code" required><br>

    <label for="unit_price">Unit Price:</label>
    <input type="number" name="unit_price" step="any" required><br>

    <input type="submit" value="Add Product">
</form>

<hr>

<h2>Existing Products</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Unit Price</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['product_name'] ?></td>
            <td><?= $product['product_code'] ?></td>
            <td><?= $product['unit_price'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
