<?php
ob_start();
include __DIR__ . "/includes/auth.php";

/* ==================================================
   YOUR ORIGINAL ATTENDANCE LOGIC (UNCHANGED)
   ================================================== */

// MANUAL ATTENDANCE DATA
$attendance = [
  "2025-12-05"=>["-","P","P","P","P"],
  "2025-12-04"=>["P","P","P","P","P"],
  "2025-12-02"=>["P","P","P","P","P"],
  "2025-12-01"=>["P","P","P","P","-"]
];

// Calculate totals
$totalPresent = 0;
$totalSlots = 0;

foreach ($attendance as $date => $slots) {
  foreach ($slots as $s) {
    if ($s === "P") $totalPresent++;
    if ($s === "P" || $s === "A") $totalSlots++;
  }
}

$percent = $totalSlots > 0 ? round(($totalPresent / $totalSlots) * 100, 2) : 0;
$maxSlots = 5;

function getDayName($date) {
  return date("D", strtotime($date));
}

// SUBJECT WISE
$subjects = [
  "Operating Systems"=>["present"=>6,"total"=>6],
  "Operating Systems Lab"=>["present"=>2,"total"=>2],
  "Python"=>["present"=>4,"total"=>4],
  "Python Lab"=>["present"=>2,"total"=>2],
  "Networking"=>["present"=>4,"total"=>4],
  "Networking Lab"=>["present"=>2,"total"=>2],
  "Software Engineering"=>["present"=>6,"total"=>6],
  "Software Engineering Lab"=>["present"=>2,"total"=>2],
  "Cryptography"=>["present"=>5,"total"=>5],
  "PGPD"=>["present"=>1,"total"=>2]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Attendance</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- ===== ERP TOP BAR ===== -->
<div class="erp-topbar">
  <a href="dashboard.php" class="erp-back">
    <i class="bi bi-arrow-left"></i>
  </a>
  <div class="erp-title">Attendance</div>
</div>

<!-- ===== PAGE ===== -->
<div class="attendance-page">

  <!-- ===== CONTENT (ONLY THIS SCROLLS) ===== -->
  <div class="attendance-content">

    <!-- INFO BANNER -->
    <div class="att-info-banner">
      ⏳ Attendance updates daily at 3:00 AM • Weekly summary below
    </div>

    <!-- TOP CARD -->
    <div class="att-card">
      <div class="att-title">Sem 4</div>
      <div class="att-sub">A.Y. 2025–26 • Even</div>

      <div class="att-bar">
        <div class="att-bar-fill" style="width: <?= $percent ?>%;"></div>
      </div>

      <div class="att-percent"><?= $percent ?>%</div>
    </div>

    <!-- STATUS -->
    <div class="att-status-box">
      <div class="att-ok">Present<br><b><?= $totalPresent ?>/<?= $totalSlots ?></b></div>
      <div class="att-bad">Absent<br><b><?= $totalSlots - $totalPresent ?></b></div>
      <div class="att-mid">Pending<br><b>0</b></div>
      <div class="att-info">No Class<br><b>0</b></div>
    </div>

    <div class="att-legend">P = Present • A = Absent • – = No Lecture/Lab</div>

    <!-- DATE / SLOT TABLE -->
    <div class="att-table">

      <div class="att-header">
        <div class="att-col">Date</div>
        <?php for ($i=1; $i <= $maxSlots; $i++): ?>
          <div class="att-col">S<?= $i ?></div>
        <?php endfor; ?>
      </div>

      <?php foreach ($attendance as $date => $slots): ?>
        <div class="att-row">

          <div class="att-col">
            <?= date("d M y", strtotime($date)) ?><br>
            <span class="att-day"><?= getDayName($date) ?></span>
          </div>

          <?php for ($i=0; $i < $maxSlots; $i++): ?>
            <div class="att-col">
              <?php
                if (!isset($slots[$i])) echo '<div class="att-slot-n">-</div>';
                else if ($slots[$i] === "P") echo '<div class="att-slot-p">P</div>';
                else if ($slots[$i] === "A") echo '<div class="att-slot-a">A</div>';
                else echo '<div class="att-slot-n">-</div>';
              ?>
            </div>
          <?php endfor; ?>

        </div>
      <?php endforeach; ?>

    </div>

    <!-- SUBJECT WISE -->
    <h4 class="sub-title">Subject Wise Attendance</h4>

    <?php foreach($subjects as $name => $data): ?>
      <div class="sub-card">
        <div class="sub-name"><?= $name ?></div>
        <div class="sub-info">
          Present: <b><?= $data["present"] ?></b> / <?= $data["total"] ?><br>
          Absent: <b><?= $data["total"] - $data["present"] ?></b>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

</body>
</html>
