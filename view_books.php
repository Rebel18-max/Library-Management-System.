<?php
include 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM Books");
    $books = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error fetching books: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Books</title>
</head>
<body>
    <h2>Books List</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Available Copies</th>
            </tr>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['book_id']); ?></td>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo htmlspecialchars($book['published_year']); ?></td>
                <td><?php echo htmlspecialchars($book['available_copies']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>