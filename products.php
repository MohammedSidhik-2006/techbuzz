<?php

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>

<h2>Our Products</h2>
<div>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div>
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" width="100">
            <h3><?php echo $row['name']; ?></h3>
            <p>Price: ₹<?php echo $row['price']; ?></p>
            <a href="product_details.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>
    <?php } ?>
</div>

</body>
</html>
