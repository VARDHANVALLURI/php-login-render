<?php
// Set session cookie lifetime to 60 days (before session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 60 * 60 * 24 * 60, // 60 days
        'path' => '/',
        'secure' => false, // change to true if using HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Only start session if not already started
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Simple user auth array (you can replace with your file-based or DB-based logic)
$students = [
    "9951996671" => "vardhan123@"
];

// Handle form POST
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
<?php
// Set session cookie lifetime to 60 days (before session_start)
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 60 * 60 * 24 * 60, // 60 days
        'path' => '/',
        'secure' => false, // change to true if using HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Only start session if not already started
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Simple user auth array (you can replace with your file-based or DB-based logic)
$students = [
    "9951996671" => "vardhan123@"
];

// Handle form POST
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
