<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "techbuzz";

// Connect to DB
$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("<script>alert('Database connection failed!');</script>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $enteredPassword = trim($_POST["password"]);

    $sql = $conn->prepare("SELECT * FROM users WHERE name = ?");
    $sql->bind_param("s", $name);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($enteredPassword, $user['password'])) {
            session_start();
            $_SESSION["username"] = $user["username"];
            echo "<script>
                    alert('Sign-in Successful!');
                    window.location.href='nn.html';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Login Failed! Incorrect Password.');
                    window.location.href='login.html';
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('User not found! Please Sign Up.');
                window.location.href='signup page.html';
              </script>";
        exit();
    }
}

$conn->close();
?>
