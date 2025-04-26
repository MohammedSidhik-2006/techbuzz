<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techbuzz"; // make sure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['username'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$address = $_POST['address'];

// SQL query to insert data
$sql = "INSERT INTO shipping_details (username, mobile, country, state, pincode, address)
        VALUES ('$name', '$mobile', '$country', '$state', '$pincode', '$address')";

if ($conn->query($sql) === TRUE) {
    header("Location: payment.html"); // Redirect after storing
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
