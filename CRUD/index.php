<?php
include "db.php";

$result = $conn->query("SELECT * FROM items ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sample CRUD</title>
</head>
<body>

    <h1>Items List</h1>

    <a href="create.php">Add New Item</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this item?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
