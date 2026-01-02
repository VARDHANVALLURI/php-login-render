<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Profile</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- ================= ERP TOP BAR ================= -->
<div class="erp-topbar">
  <a href="dashboard.php" class="erp-back">
    <i class="bi bi-arrow-left"></i>
  </a>
  <div class="erp-title">Profile</div>
</div>

<!-- ================= PAGE ================= -->
<div class="profile-page">

  <!-- ================= PROFILE HEADER ================= -->
  <div class="profile-header">
    <img src="../assets/images/profile.jpg" class="profile-pic" alt="Profile">
    <h2 class="profile-name">Valluri Sri Krishna Vardan</h2>
    <span class="profile-status">Active</span>
  </div>

  <!-- ================= CONTENT (ONLY THIS SCROLLS) ================= -->
  <div class="profile-content">

    <!-- ================= EDUCATION ================= -->
    <div class="section">
      <h3>🎓 Education Details</h3>
      <div class="info-card">
        <div><b>Branch</b><br>Cyber Security</div>
        <div><b>Enrollment No.</b><br>2403031260215</div>
        <div><b>Division</b><br>PIET-BTech-CSE-4CYBER3</div>
        <div><b>Sem | Roll</b><br>3 | 48</div>
      </div>
    </div>

    <!-- ================= STUDENT CONTACT ================= -->
    <div class="section">
      <h3>📞 Student Contact Details</h3>
      <div class="info-card">
        <div><b>Mobile No.</b><br>6281048554</div>
        <div><b>Other Mobile</b><br>--</div>
        <div>
          <b>Email</b><br>
          2403031260215@paruluniversity.ac.in<br>
          krishnavardhan124@gmail.com
        </div>
      </div>
    </div>

    <!-- ================= PARENTS CONTACT ================= -->
    <div class="section">
      <h3>👨‍👩‍👦 Parents Contact Details</h3>
      <div class="info-card">
        <div><b>Father Phone</b><br>9951996671</div>
        <div><b>Mother Phone</b><br>6301244329</div>
        <div><b>Father Email</b><br>vvknchowdary@gmail.com</div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
