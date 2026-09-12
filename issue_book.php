<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $issue_date = date('Y-m-d');

    $stmt = $pdo->prepare("INSERT INTO Transactions (book_id, member_id, issue_date) VALUES (?, ?, ?)");
    $stmt->execute([$book_id, $member_id, $issue_date]);
    
    // Update available copies
    $pdo->prepare("UPDATE Books SET available_copies = available_copies - 1 WHERE book_id = ?")->execute([$book_id]);
    echo "Book issued successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Issue Book</title>
</head>
<body>
    <h2>Issue Book</h2>
    <form method="post">
        <input type="number" name="book_id" placeholder="Book ID" required>
        <input type="number" name="member_id" placeholder="Member ID" required>
        <button type="submit">Issue Book</button>
    </form>
</body>
</html>