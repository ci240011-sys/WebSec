<?php
$conn = new mysqli("localhost", "root", "", "lab3_security");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = bin2hex(random_bytes(16));
    $password_hash = hash('sha256', $password . $salt);

    $sql = "INSERT INTO users_with_salt (username, salt, password_hash) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $salt, $password_hash);
    $stmt->execute();
    echo "User registered with salt.";
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>