<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "techbuzz";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $phone = $_POST["phone"];

    $sql = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $name, $email, $password, $phone);

    if ($sql->execute()) {
        echo 
        "<script>
         alert('Sign-in Successful');
         window.location.href='nn.html';
         </script>";
    } else {
        echo "Error: " . $sql->error;
    }
}

$conn->close();
?>
