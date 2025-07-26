<?php
// Set cookie parameters to keep login session for 7 days
session_set_cookie_params([
  'lifetime' => 604800, // 7 days
  'path' => '/',
  'secure' => true,      // use https
  'httponly' => true,
  'samesite' => 'Lax'
]);

session_start();

// Dummy login data
$users = [
  "9951996671" => "vardhan123@"
];

// Check if login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Validate credentials
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["student"] = $username;
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Invalid credentials. <a href='../index.php'>Try again</a>";
    }
} else {
    echo "Access denied.";
}
?>

