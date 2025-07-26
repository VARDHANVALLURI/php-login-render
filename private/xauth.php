<?php
// Only set cookie parameters if no session has started yet.
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 60 * 60 * 24 * 60, // 60 days in seconds
        'path'     => '/',
        'secure'   => false,  // Set to true if your site uses HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Login credentials stored here
$students = [
  "9951996671" => "vardhan123@"
];

// Process the login form if it's submitted
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
