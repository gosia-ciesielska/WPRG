<?php
if (!$dblink = mysqli_connect("localhost", "root", "zaq1@WSX")) {
    echo "Failed to connect to database.";
    exit;
}
if (!mysqli_select_db($dblink, "carservice")) {
    mysqli_close($dblink);
    echo "Failed to connect to database.";
    exit;
}

if (isset($_POST["add_car"])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $query = "INSERT INTO car (make, model, price, year";
    if ($description != null) {
        $query .= ", description) VALUES ('".$make."','".$model."',".$price.",".$year.",'".$description."')";
    } else {
        $query .= ") VALUES ('".$make."','".$model."',".$price.",".$year.")";
    }
    if (!$result = mysqli_query($dblink, $query)) {
        echo "Failed to update database!";
    }
    header("Location: index.php?tab=all");
}

$tab = $_GET['tab'] ?? 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Inventory</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="tabs">
        <a href="?tab=home" class="<?= $tab == 'home' ? 'active' : '' ?>">Home</a>
        <a href="?tab=all" class="<?= $tab == 'all' ? 'active' : '' ?>">All Cars</a>
        <a href="?tab=add" class="<?= $tab == 'add' ? 'active' : '' ?>">Add a Car</a>
    </div>

    <?php if ($tab == 'home'): ?>
        <h2>Cheapest Cars</h2>
        <table>
            <tr>
                <th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Details</th>
            </tr>
            <?php
            $query = "SELECT id, make, model, price FROM car ORDER BY price ASC LIMIT 5";
            $result = mysqli_query($dblink, $query);
            while ($row = mysqli_fetch_array($result)):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['make']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= number_format($row['price'], 2) ?> PLN</td>
                <td><a href="details.php?id=<?= $row['id'] ?>">Details</a></td>
            </tr>
            <?php endwhile; ?>
        </table>

    <?php elseif ($tab == 'all'): ?>
        <h2>All Cars</h2>
        <table>
            <tr>
                <th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Details</th>
            </tr>
            <?php
            $query = "SELECT id, make, model, year, price FROM car ORDER BY year";
            $result = mysqli_query($dblink, $query);
            while ($row = mysqli_fetch_array($result)):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['make']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= number_format($row['price'], 2) ?> PLN</td>
                <td><a href="details.php?id=<?= $row['id'] ?>">Details</a></td>
            </tr>
            <?php endwhile; ?>
        </table>

    <?php elseif ($tab == 'add'): ?>
        <h2>Add a New Car</h2>
        <form method="POST" action="">
            <label>Make: <input type="text" name="make" required></label><br><br>
            <label>Model: <input type="text" name="model" required></label><br><br>
            <label>Price: <input type="number" step="0.01" name="price" required></label><br><br>
            <label>Year: <input type="number" name="year" required></label><br><br>
            <label>Description: <textarea name="description"></textarea></label><br><br>
            <input type="submit" name="add_car" value="Add Car">
        </form>
    <?php 
        endif; 
        mysqli_close($dblink);
    ?>
</body>
</html>
