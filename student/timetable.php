<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Time Table</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- ================= ERP TOP BAR ================= -->
<div class="erp-topbar">
  <a href="dashboard.php" class="erp-back">
    <i class="bi bi-arrow-left"></i>
  </a>
  <div class="erp-title">Time Table</div>
</div>

<!-- ================= PAGE ================= -->
<div class="timetable-page">

  <!-- ================= CONTENT (ONLY THIS SCROLLS) ================= -->
  <div class="timetable-content">

    <!-- ================= DAY SELECTOR ================= -->
    <div class="day-tabs">
      <button class="active" onclick="openDay('mon', this)">Mon</button>
      <button onclick="openDay('tue', this)">Tue</button>
      <button onclick="openDay('wed', this)">Wed</button>
      <button onclick="openDay('thu', this)">Thu</button>
      <button onclick="openDay('fri', this)">Fri</button>
      <button onclick="openDay('sat', this)">Sat</button>
    </div>

    <!-- ================= MONDAY ================= -->
    <div class="day-card" id="mon">
      <div class="day-title">Monday</div>

      <div class="slot"><span>09:30 – 10:25</span><b>SE – NW</b></div>
      <div class="slot"><span>10:25 – 11:20</span><b>OS – TP</b></div>

      <div class="recess">Recess 11:20 – 12:20</div>

      <div class="slot"><span>12:20 – 01:15</span><b>NSC – KB</b></div>
      <div class="slot"><span>01:15 – 02:10</span><b>SE – NW</b></div>

      <div class="recess">Recess 02:10 – 02:30</div>

      <div class="slot"><span>02:30 – 03:25</span><b>CRY – DC</b></div>
      <div class="slot"><span>03:25 – 04:20</span><b>SE – NW</b></div>
    </div>

    <!-- ================= TUESDAY ================= -->
    <div class="day-card" id="tue" style="display:none;">
      <div class="day-title">Tuesday</div>

      <div class="slot"><span>09:30 – 11:20</span><b>PPFD – RK</b></div>
      <div class="recess">Recess 11:20 – 12:20</div>
      <div class="slot"><span>12:20 – 02:10</span><b>NSC – KB</b></div>
      <div class="recess">Recess 02:10 – 02:30</div>
      <div class="slot"><span>02:30 – 04:20</span><b>OS – TP</b></div>
    </div>

    <!-- ================= WEDNESDAY ================= -->
    <div class="day-card" id="wed" style="display:none;">
      <div class="day-title">Wednesday</div>
      <div class="slot"><span>09:30 – 04:20</span><b>CODECHEF</b></div>
    </div>

    <!-- ================= THURSDAY ================= -->
    <div class="day-card" id="thu" style="display:none;">
      <div class="day-title">Thursday</div>

      <div class="slot"><span>09:30 – 11:20</span><b>OS – TP</b></div>
      <div class="recess">Recess 11:20 – 12:20</div>
      <div class="slot"><span>12:20 – 02:10</span><b>PPFD – RK</b></div>
    </div>

    <!-- ================= FRIDAY ================= -->
    <div class="day-card" id="fri" style="display:none;">
      <div class="day-title">Friday</div>

      <div class="slot"><span>09:30 – 10:25</span><b>LIBRARY</b></div>
      <div class="recess">Recess 11:20 – 12:20</div>
      <div class="slot"><span>12:20 – 02:10</span><b>OS – TP</b></div>
      <div class="recess">Recess 02:10 – 02:30</div>
      <div class="slot"><span>02:30 – 04:20</span><b>CRY – DC</b></div>
    </div>

    <!-- ================= SATURDAY ================= -->
    <div class="day-card" id="sat" style="display:none;">
      <div class="day-title">Saturday</div>

      <div class="slot"><span>09:30 – 10:25</span><b>NSC – KB</b></div>
      <div class="slot"><span>10:25 – 11:20</span><b>PPFD – RK</b></div>
      <div class="slot"><span>12:20 – 01:15</span><b>PALO ALTO – AJ</b></div>
      <div class="slot"><span>02:30 – 04:20</span><b>CRY – DC</b></div>
    </div>

    <!-- ================= STAFF DETAILS ================= -->
    <div class="day-card">
      <div class="day-title">Staff Details</div>

      <div class="staff-card"><b>NW</b> – Ms.NEHAWAGH<br>Software Engineering<br><a href="mailto:nwaghmare@piet.edu">nwaghmare@piet.edu</a></div>
      <div class="staff-card"><b>TP</b> – Ms.TANVIPATEL<br>Operating Systems<br><a href="mailto:tpatil@piet.edu">tpatil@piet.edu</a></div>
      <div class="staff-card"><b>KB</b> – Mr. KUSHAL BOHAR<br>Network Security<br><a href="mailto:kborkar@piet.edu">kborkar@piet.edu</a></div>
      <div class="staff-card"><b>DC</b> – Mr.RAJINIKANTH CHAUHAN<br>Cryptography<br><a href="mailto:dchavan@piet.edu">dchavan@piet.edu</a></div>
      <div class="staff-card"><b>RK</b> – Mr.KULKARNI<br>Python & Full Stack<br><a href="mailto:rkulkarni@piet.edu">rkulkarni@piet.edu</a></div>
      <div class="staff-card"><b>AJ</b> – Mr.AJAY<br>Palo Alto Networks<br><a href="mailto:ajoshi@piet.edu">ajoshi@piet.edu</a></div>
    </div>

  </div>
</div>

<script>
function openDay(day, btn) {
  document.querySelectorAll('.day-card').forEach(d => d.style.display = 'none');
  document.getElementById(day).style.display = 'block';

  document.querySelectorAll('.day-tabs button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}
</script>

</body>
</html>
