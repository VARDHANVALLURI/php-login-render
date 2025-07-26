<?php
// Ensure no previous session or output
if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close(); // Close current session if already started
}

// Set cookie params BEFORE session_start
session_set_cookie_params([
    'lifetime' => 60 * 60 * 24 * 60, // 60 days
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);

session_start();

$students = [
    "9951996671" => "vardhan123@"
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (isset($students[$username]) && $students[$username] === $password) {
        $_SESSION["student"] = $username;
        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
