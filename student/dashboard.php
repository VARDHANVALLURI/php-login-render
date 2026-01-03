<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <link rel="stylesheet" href="../assets/css/common.css?v=3.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<div class="page dashboard-page">

  <!-- LOGOUT BUTTON -->
  <a href="logout.php" class="dashboard-logout">Logout</a>

  <!-- CENTER PROFILE -->
  <div class="dashboard-center">
    <img src="../assets/images/profile.jpg" class="dashboard-avatar" alt="Profile">

    <div class="dashboard-name">Valluri Sri Krishna Vardan</div>
    <div class="dashboard-status">Active</div>
  </div>

  <!-- DASHBOARD CONTENT -->
  <div class="dashboard-content">
    <div class="card-grid">

      <a href="profile.php" class="card"><i class="bi bi-person-circle"></i>Profile</a>
      <a href="academic.php" class="card"><i class="bi bi-calendar-event"></i>Academic</a>
      <a href="timetable.php" class="card"><i class="bi bi-clock-history"></i>Timetable</a>
      <a href="attendance.php" class="card"><i class="bi bi-clipboard2-check"></i>Attendance</a>
      <a href="results.php" class="card"><i class="bi bi-file-earmark-text"></i>Results</a>
      <a href="fees.php" class="card"><i class="bi bi-wallet2"></i>Fees</a>
      <a href="hostel.php" class="card"><i class="bi bi-building"></i>Hostel</a>
      <a href="notification.php" class="card"><i class="bi bi-bell"></i>Notifications</a>
      <a href="placements.php" class="card"><i class="bi bi-briefcase-fill"></i>Placements</a>

    </div>
  </div>

</div>
<script>
(function () {
  // Do not show back button on dashboard
  if (window.location.pathname.includes('dashboard.php')) return;

  // Create back button
  const backBtn = document.createElement('a');
  backBtn.href = 'dashboard.php';
  backBtn.className = 'webview-back-btn';
  backBtn.innerHTML = '<i class="bi bi-arrow-left"></i>';

  document.body.appendChild(backBtn);
})();
</script>

</body>
</html>

