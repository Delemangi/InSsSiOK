<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_date = $_POST['selected_date'];
    $stmt = $conn->prepare("SELECT date_and_time, payment_type FROM shopping_cart WHERE DATE(date_and_time) = :selected_date ORDER BY date_and_time ASC");
    $stmt->bindParam(':selected_date', $selected_date);
    $stmt->execute();
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Report</title>
</head>
<body>
<h1>Purchase Report</h1>

<form action="report.php" method="post">
    Select Date: <input type="date" name="selected_date" required>
    <input type="submit" value="Generate Report">
</form>

<table>
    <tr>
        <th>Date and Time</th>
        <th>Payment Type</th>
    </tr>
    <?php if (isset($transactions)) foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= $transaction['date_and_time'] ?></td>
            <td><?= $transaction['payment_type'] == 1 ? 'Cash' : 'Card' ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
