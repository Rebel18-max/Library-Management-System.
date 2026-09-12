<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM Members");
$members = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Members</title>
</head>
<body>
    <h2>Members List</h2>
    <table>
        <tr>
            <th>Member ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php foreach ($members as $member): ?>
        <tr>
            <td><?php echo $member['member_id']; ?></td>
            <td><?php echo $member['name']; ?></td>
            <td><?php echo $member['email']; ?></td>
            <td><?php echo $member['phone']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>