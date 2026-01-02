<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Notifications</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- ================= ERP TOP BAR ================= -->
<div class="erp-topbar">
  <a href="dashboard.php" class="erp-back">
    <i class="bi bi-arrow-left"></i>
  </a>
  <div class="erp-title">Notifications</div>
</div>

<!-- ================= PAGE ================= -->
<div class="notification-page">

  <!-- ================= CONTENT (ONLY THIS SCROLLS) ================= -->
  <div class="notification-content">

    <!-- ================= NOTIFICATION ================= -->
    <div class="notify-card">
      <div class="notify-icon">🔔</div>

      <div class="notify-body">
        <div class="notify-date">📅 25-12-2025</div>

        <div class="notify-title">
          VALLURI SRI KRISHNA VARDAN – Hostel IN at 25-12-2025 02:48 PM
        </div>

        <div class="notify-text expanded">
          Dear <b>VALLURI SRI KRISHNA VARDAN</b>,<br><br>

          You have been marked as <b>IN</b> on <b>25-12-2025 02:48 PM</b>
          with the following leave details:<br><br>

          • <b>Leave Duration:</b> 25-12-2025 11:30 AM to 25-12-2025 06:30 PM<br>
          • <b>Leave Reason:</b> Personal Reason<br>
          • <b>Approved By:</b> Mr. KALISETTI NEELAYYA<br><br>

          Thanks & Regards,<br>
          <b>PU</b>
        </div>

        <div class="toggle-btn" onclick="toggleNote(this)">Show less</div>
      </div>
    </div>

    <!-- ================= NOTIFICATION ================= -->
    <div class="notify-card">
      <div class="notify-icon">🔔</div>

      <div class="notify-body">
        <div class="notify-date">📅 25-12-2025</div>

        <div class="notify-title">
          VALLURI SRI KRISHNA VARDAN – Hostel OUT at 25-12-2025 01:06 PM
        </div>

        <div class="notify-text">
          Dear <b>VALLURI SRI KRISHNA VARDAN</b>,<br><br>

          You have been marked as <b>OUT</b> on <b>25-12-2025 01:06 PM</b>
          with the following leave details:<br><br>

          • <b>Leave Duration:</b> 25-12-2025 11:30 AM to 25-12-2025 06:30 PM<br>
          • <b>Leave Reason:</b> Personal Reason<br>
          • <b>Approved By:</b> Mr. KALISETTI NEELAYYA<br><br>

          Thanks & Regards,<br>
          <b>PU</b>
        </div>

        <div class="toggle-btn" onclick="toggleNote(this)">Show more</div>
      </div>
    </div>

  </div>
</div>

<script>
function toggleNote(btn) {
  const text = btn.previousElementSibling;
  text.classList.toggle("expanded");
  btn.innerText = text.classList.contains("expanded")
    ? "Show less"
    : "Show more";
}
</script>

</body>
</html>
