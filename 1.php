<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
} else {
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
</head>
<body>

<h2><?php echo $product['name']; ?></h2>
<p><?php echo $product['description']; ?></p>
<p>Price: ₹<?php echo $product['price']; ?></p>
<img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="200">

<a href="products.php">Back to Products</a>

</body>
</html>

