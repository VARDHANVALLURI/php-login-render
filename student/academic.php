<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Academic Calendar</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- ===== ERP TOP BAR ===== -->
<div class="erp-topbar">
  <a href="dashboard.php" class="erp-back">
    <i class="bi bi-arrow-left"></i>
  </a>
  <div class="erp-title">Academic Calendar</div>
</div>

<!-- ===== PAGE WRAPPER ===== -->
<div class="academic-page">

  <!-- ===== CONTENT (ONLY THIS SCROLLS) ===== -->
  <div class="academic-content">

    <div class="timeline">

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">09-08-2025</div>
          <div class="event-title">Raksha Bandhan</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">15-08-2025</div>
          <div class="event-title">Independence Day / Parsi New Year</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">16-08-2025</div>
          <div class="event-title">Janmashtami (Shravan Vad-8)</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">27-08-2025</div>
          <div class="event-title">Samvatsari (Chaturthi Paksha)</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">02-10-2025</div>
          <div class="event-title">Mahatma Gandhi Jayanti / Dussehra</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">20-10-2025 → 25-10-2025</div>
          <div class="event-title">Diwali</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">27-10-2025 → 02-11-2025</div>
          <div class="event-title">Diwali Vacation</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">31-10-2025</div>
          <div class="event-title">Sardar Vallabhbhai Patel Jayanti</div>
        </div>
      </div>

      <div class="event">
        <div class="event-dot"><i class="bi bi-check"></i></div>
        <div class="event-card">
          <div class="event-date">25-12-2025</div>
          <div class="event-title">Christmas</div>
        </div>
      </div>

    </div>

  </div>
</div>

</body>
</html>
