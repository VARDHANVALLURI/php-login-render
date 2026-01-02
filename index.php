<?php
session_start();

/* ================= AUTO LOGIN USING COOKIE ================= */
if (!isset($_SESSION["student"]) && isset($_COOKIE["student_login"])) {
    $_SESSION["student"] = $_COOKIE["student_login"];
    header("Location: student/dashboard.php");
    exit;
}

/* ================= ALREADY LOGGED IN ================= */
if (isset($_SESSION["student"])) {
    header("Location: student/dashboard.php");
    exit;
}

/* ================= HANDLE LOGIN SUBMIT ================= */
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "9951996671";
    $password = $_POST["password"] ?? "vardhan123";

    // 🔐 SIMPLE STUDENT LOGIN (CHANGE IF YOU WANT)
    if ($username === "9951996671" && $password === "vardhan123") {

        $_SESSION["student"] = $username;

        // Remember login for 7 days
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
}

/* ================= BACKGROUND IMAGE ================= */
$bgPathCandidates = [
  'assets/images/college_photo.jpg',
  'college_photo.jpg',
  'uploaded_bg.jpg',
  'bg.jpg'
];

$bg = '';
foreach ($bgPathCandidates as $p) {
    if (file_exists(__DIR__ . '/' . $p)) {
        $bg = $p;
        break;
    }
}

$fallbackBg = 'data:image/svg+xml;charset=utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%221200%22 height=%22800%22%3E%3Cdefs%3E%3CradialGradient id=%22g%22 cx=%22.5%22 cy=%22.5%22 r=%22.8%22%3E%3Cstop offset=%220%22 stop-color=%22%23e6eefc%22/%3E%3Cstop offset=%221%22 stop-color=%22%23dfe9f8%22/%3E%3C/radialGradient%3E%3C/defs%3E%3Crect width=%22100%25%22 height=%22100%25%22 fill=%22url(%23g)%22/%3E%3C/svg%3E';
$bgUrl = $bg ? $bg : $fallbackBg;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Student Portal</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- PWA -->
<link rel="manifest" href="manifest.json">
<meta name="theme-color" content="#0d6efd">
<link rel="apple-touch-icon" href="icons/icon-192.png">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
html, body {
  height: 100%;
  margin: 0;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto;
}
body {
  position: relative;
  background: linear-gradient(180deg,#e6eefc,#dfe9f8);
}
body::before {
  content:"";
  position: fixed;
  inset: 0;
  z-index: -2;
  background-image: url("<?= htmlspecialchars($bgUrl, ENT_QUOTES) ?>");
  background-size: cover;
  background-position: center;
}
body::after {
  content:"";
  position: fixed;
  inset: 0;
  z-index: -1;
  background: rgba(0,0,0,0.35);
}
.login-wrapper {
  min-height: 100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:24px;
}
.login-box {
  max-width:320px;
  width:100%;
  padding:18px;
  border-radius:12px;
  background:rgba(255,255,255,0.2);
  backdrop-filter: blur(10px);
}
</style>
</head>

<body>

<div class="login-wrapper">
  <div class="login-box">

    <div class="text-center mb-3">
      <img src="https://i.postimg.cc/tJ6d4mf3/logo.png" height="64">
    </div>

    <h4 class="text-center mb-3">Student Login</h4>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button class="btn btn-primary w-100">Login</button>
    </form>

  </div>
</div>

<script>
if ("serviceWorker" in navigator) {
  navigator.serviceWorker.register("service-worker.js");
}
</script>

</body>
</html>
