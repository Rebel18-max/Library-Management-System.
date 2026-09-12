<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_id = $_POST['transaction_id'];
    $return_date = date('Y-m-d');

    // Get book_id to update available copies
    $stmt = $pdo->prepare("SELECT book_id FROM Transactions WHERE transaction_id = ?");
    $stmt->execute([$transaction_id]);
    $book_id = $stmt->fetchColumn();

    $pdo->prepare("UPDATE Transactions SET return_date = ? WHERE transaction_id = ?")->execute([$return_date, $transaction_id]);
    $pdo->prepare("UPDATE Books SET available_copies = available_copies + 1 WHERE book_id = ?")->execute([$book_id]);
    
    echo "Book returned successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Return Book</title>
</head>
<body>
    <h2>Return Book</h2>
    <form method="post">
        <input type="number" name="transaction_id" placeholder="Transaction ID" required>
        <button type="submit">Return Book</button>
    </form>
</body>
</html>