<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Placements</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<div class="placements-page">

  <!-- ===== TOP BAR ===== -->
  <div class="erp-topbar">
    <a href="dashboard.php" class="erp-back">
      <i class="bi bi-arrow-left"></i>
    </a>
    <div class="erp-title">Placements</div>
  </div>

  <!-- ===== CONTENT ===== -->
  <div class="placements-content">

    <!-- ===== STATS ===== -->
    <div class="placements-stats">

      <div class="stat-card">
        <div class="stat-value">₹60 LPA</div>
        <div class="stat-label">Highest Package</div>
      </div>

      <div class="stat-card">
        <div class="stat-value">₹6.5 LPA</div>
        <div class="stat-label">Average Package</div>
      </div>

      <div class="stat-card">
        <div class="stat-value">2200+</div>
        <div class="stat-label">Recruiters</div>
      </div>

      <div class="stat-card">
        <div class="stat-value">2500+</div>
        <div class="stat-label">Students Placed</div>
      </div>

    </div>

    <!-- ===== PLACEMENT CARDS ===== -->
    <div class="placements-grid">

      <div class="placement-card">
        <img src="../assets/images/place1.jpg" alt="TCS">
        <div class="placement-info">
          <div class="company">TOP-MNC's</div>
          <div class="role">SOFTWARE</div>
          <div class="ctc"></div>
        </div>
      </div>

      <div class="placement-card">
        <img src="../assets/images/place2.jpg" alt="Infosys">
        <div class="placement-info">
          <div class="company">RECURITERS</div>
          <div class="role"></div>
          <div class="ctc">2200+</div>
        </div>
      </div>

      <div class="placement-card">
        <img src="../assets/images/place3.jpg" alt="Wipro">
        <div class="placement-info">
          <div class="company">CAREER-PLAN</div>
          <div class="role"></div>
          <div class="ctc"></div>
        </div>
      </div>

      <div class="placement-card">
        <img src="../assets/images/place4.jpg" alt="Accenture">
        <div class="placement-info">
          <div class="company">DEPARTMENTS</div>
          <div class="role"></div>
          <div class="ctc"></div>
        </div>
      </div>

    </div>

  </div>
</div>

</body>
</html>
