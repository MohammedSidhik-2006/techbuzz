<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techbuzz"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['username'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$address = $_POST['address'];
$sql = "INSERT INTO shipping_details (username, mobile, country, state, pincode, address)
        VALUES ('$name', '$mobile', '$country', '$state', '$pincode', '$address')";

if ($conn->query($sql) === TRUE) {
    header("Location: payment.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
