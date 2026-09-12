<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $available_copies = $_POST['available_copies'];

    $stmt = $pdo->prepare("INSERT INTO Books (title, author, published_year, available_copies) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $author, $published_year, $available_copies]);
    echo "Book added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Book</title>
</head>
<body>
    <h2>Add Book</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="number" name="published_year" placeholder="Published Year" required>
        <input type="number" name="available_copies" placeholder="Available Copies" required>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>