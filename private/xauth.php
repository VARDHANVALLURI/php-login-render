<?php
// 60 days in seconds
define('LOGIN_COOKIE_LIFETIME', 60 * 60 * 24 * 60); 

// Start session only if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Auto-login using cookie
if (!isset($_SESSION["student"]) && isset($_COOKIE["student_login"])) {
    $_SESSION["student"] = $_COOKIE["student_login"];
    // Optional: validate against file if needed
}

// Handle login form POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = json_decode(file_get_contents(__DIR__ . "/students.txt"), true);

    if (isset($data[$username]) && $data[$username] === $password) {
        $_SESSION["student"] = $username;

        // Set login cookie for 60 days
        setcookie("student_login", $username, time() + LOGIN_COOKIE_LIFETIME, "/");

        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
