<?php
include "db.php";

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>

    <h1>Edit Item</h1>

    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"><?= htmlspecialchars($item['description']) ?></textarea><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="index.php">Back to List</a>

</body>
</html>
