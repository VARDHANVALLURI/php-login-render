<?php
// Simple hardcoded credentials
$VALID_USER = "9951996671";
$VALID_PASS = "vardhan123";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if ($username === $VALID_USER && $password === $VALID_PASS) {

    $_SESSION["student"] = $username;

    // Optional remember-login cookie (7 days)
    setcookie(
        "student_login",
        $username,
        time() + (7 * 24 * 60 * 60),
        "/",
        "",
        false,
        true
    );

    header("Location: student/dashboard.php");
    exit;
}

$error = "Invalid username or password";
