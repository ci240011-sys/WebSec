<?php
$conn = new mysqli("localhost", "root", "", "lab3_security");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = sha1($password);

    $sql = "SELECT * FROM users_no_salt WHERE username = ? AND password_hash = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password_hash);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Login successful.";
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!-- Simple form added below -->
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>