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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php
        $id = intval($_GET['id']);
        $query = "SELECT * FROM car WHERE id = $id";
        $result = mysqli_query($dblink, $query);
        if ($car = mysqli_fetch_array($result)):
        ?>
        <div class="details-container">
            <h2>Car Details</h2>
            <ul class="details-list">
                <li><span>ID:</span> <?= $car['id'] ?></li>
                <li><span>Make:</span> <?= htmlspecialchars($car['make']) ?></li>
                <li><span>Model:</span> <?= htmlspecialchars($car['model']) ?></li>
                <li><span>Year:</span> <?= $car['year'] ?></li>
                <li><span>Price:</span> <?= number_format($car['price'], 2) ?>PLN</li>
                <li><span>Description:</span> <?= nl2br(htmlspecialchars($car['description'])) ?></li>
            </ul>
            <a class="details-back" href="index.php">← Back to home</a>
        </div>
        <?php else: ?>
            <p>Car not found.</p>
        <?php 
            endif; 
            mysqli_close($dblink);
        ?>
    </body>
</html>



