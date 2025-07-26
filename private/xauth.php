<?php
// Save login session for 60 days (2 months)
session_set_cookie_params([
  'lifetime' => 5184000, // 60 days in seconds
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


