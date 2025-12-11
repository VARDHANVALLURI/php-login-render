<?php
session_start();
if (!isset($_SESSION['student'])) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>STUDENT DASHBOARD</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body {
  margin:0; padding:0; background:#f5f6fa;
  font-family:'Inter',sans-serif; overflow-x:hidden;
}
  /* ==================== MESS MENU STYLE ==================== */

.tab-buttons {
  display: flex;
  overflow-x: auto;
  gap: 10px;
  margin-top: 12px;
  padding-bottom: 5px;
  scrollbar-width: none;       /* hide scrollbar */
}
.tab-buttons::-webkit-scrollbar {
  display: none;               /* hide scrollbar for chrome */
}

.tab-btn {
  padding: 10px 18px;
  border: none;
  border-radius: 10px;
  background: #e5e7eb;
  font-weight: 600;
  cursor: pointer;
  white-space: nowrap;
  transition: 0.25s;
  font-size: 15px;
}

.tab-btn.a


/* Header */
.header {
  width:100%; background:#000; color:#fff;
  padding:15px; font-weight:700; font-size:19px; text-align:center;
}

/* Main pages */
.page { display:none; padding:18px; }
#home { display:block; }

/* Profile Circle */
.profile-box { text-align:center; margin-top:20px; }
.profile-box img {
  width:110px; height:110px; border-radius:50%;
  object-fit:cover; border:3px solid #fff;
}
.profile-box h3 { margin-top:10px; font-weight:700; }
.profile-box p { color:#555; margin:3px 0; }

/* Grid menu */
.grid-menu {
  display:grid; grid-template-columns:repeat(2,1fr);
  gap:15px; margin-top:24px;
}
.menu-btn {
  background:#fff; padding:20px; border-radius:16px;
  text-align:center; box-shadow:0 4px 14px rgba(0,0,0,0.12);
  font-weight:600; cursor:pointer;
}
.menu-btn i {
  font-size:32px; margin-bottom:8px; display:block;
}
.menu-btn:hover { background:#e8e8e8; }

/* Back button */
.back-btn {
  background:none; border:none; font-size:20px;
  font-weight:700; margin-bottom:15px; cursor:pointer;
}
</style>
</head>

<body>

<div class="header"> </div>

<!-- ================= HOME PAGE ================ -->
<section id="home" class="page" style="display:block;">

  <div class="profile-box">
    <img src="your_profile_small.jpg" alt="Profile">
    <h3>VALLURI SRI KRISHNA VARDAN</h3>
    <p>Roll No: 2403031260215|48</p>
    <p>CSE(4CYBER3)BATCH 2</p>
  </div>

  <div class="grid-menu">
    <div class="menu-btn" onclick="openPage('attendance')"><i class="bi bi-clipboard2-check"></i>Attendance</div>
    <div class="menu-btn" onclick="openPage('results')"><i class="bi bi-bar-chart"></i>Results</div>
    <div class="menu-btn" onclick="openPage('fees')"><i class="bi bi-cash-coin"></i>Fees</div>
    <div class="menu-btn" onclick="openPage('student')"><i class="bi bi-person-vcard"></i>Student Info</div>
    <div class="menu-btn" onclick="openPage('hostel')"><i class="bi bi-building"></i>Hostel</div>
  </div>

</section>


<!-- ================= ATTENDANCE PAGE ================ -->
 <!-- ===================== ATTENDANCE PAGE ===================== -->

<?php
/* ---------------------
   ATTENDANCE DATA BLOCK
   REQUIRED FOR PAGE TO WORK
   --------------------- */

$attendance = [
    "2025-12-11"=>["P","P","P","P","P"],
    "2025-12-09"=>["P","P","P","P","P"],
    "2025-12-08"=>["P","P","P","P","-"],
    "2025-12-05"=>["P","P","P","P","-"],
    "2025-12-04"=>["P","P","P","P","P"],
    "2025-12-02"=>["P","P","P","P","P"],
    "2025-12-01"=>["P","P","P","P","-"],
    "2025-11-28"=>["P","P","P","A","-"],
    "2025-11-27"=>["P","P","P","P","P"],
    "2025-11-25"=>["P","P","P","P","P"],
    "2025-11-24"=>["P","P","P","-","-"],
];

$subjects = [
    "Operating Systems"            => ["present"=>8,"total"=>8],
    "Operating Systems Lab"        => ["present"=>3,"total"=>3],
    "Python"                       => ["present"=>6,"total"=>6],
    "Python Lab"                   => ["present"=>3,"total"=>3],
    "Networking"                   => ["present"=>6,"total"=>6],
    "Networking Lab"               => ["present"=>3,"total"=>3],
    "Software Engineering"         => ["present"=>8,"total"=>8],
    "Software Engineering Lab"     => ["present"=>3,"total"=>3],
    "Cryptography"                 => ["present"=>7,"total"=>7],
    "PGPD"                         => ["present"=>1,"total"=>2],
];

$totalPresent = 0;
$totalSlots = 0;

foreach ($attendance as $date => $slots) {
    foreach ($slots as $s) {
        if ($s === "P") $totalPresent++;
        if ($s === "P" || $s === "A") $totalSlots++;
    }
}

$percent = ($totalSlots > 0) ? round(($totalPresent / $totalSlots) * 100, 2) : 0;
$maxSlots = 5;
?>
<section id="attendance" class="page" style="display:none;">


<button class="back-btn" onclick="openPage('home')">
  <i class="bi bi-arrow-left"></i> Back
</button>

<h3 class="fw-bold mb-2">Attendance</h3>

<style>
.att-tab-nav {
  display:flex;
  gap:10px;
  margin-bottom:15px;
  overflow-x:auto;
}
.att-tab-nav::-webkit-scrollbar { display:none; }

.att-tab-btn {
  padding:10px 18px;
  border:none;
  background:#e5e7eb;
  border-radius:10px;
  font-weight:600;
  white-space:nowrap;
  cursor:pointer;
  transition:0.2s;
}

.att-tab-btn.active {
  background:#2563eb;
  color:#fff;
  box-shadow:0 2px 8px rgba(0,0,0,0.2);
}

.att-box {
  background:#fff;
  padding:16px;
  border-radius:16px;
  box-shadow:0 3px 12px rgba(0,0,0,0.1);
  margin-bottom:18px;
}

.att-percent-bar {
  width:100%;
  height:14px;
  background:#e5e7eb;
  border-radius:10px;
  overflow:hidden;
  margin-top:10px;
}
.att-percent-fill {
  height:100%;
  background:#22c55e;
  transition:0.3s;
}

.att-summary-row {
  display:flex;
  justify-content:space-between;
  font-size:15px;
  margin-top:10px;
}
.att-summary-label { font-weight:600; color:#333; }
.att-summary-val { font-weight:700; }

.sub-card{
  background:#fff;
  padding:14px;
  border-radius:14px;
  box-shadow:0 2px 10px rgba(0,0,0,0.05);
  margin-bottom:12px;
}

.sub-name { font-size:16px; font-weight:700; margin-bottom:5px; }
.sub-info { font-size:14px; color:#555; }

.att-table {
  background:#fff;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 2px 12px rgba(0,0,0,0.06);
}

.att-header,.att-row {
  display:flex;
  padding:12px;
  border-bottom:1px solid #eee;
}
.att-header { background:#f8fafc; font-weight:700; }
.att-col { flex:1; text-align:center; }

.att-slot-p { background:#e7fbe9; padding:6px 0; border-radius:10px; font-weight:700; color:#22c55e; }
.att-slot-a { background:#fdecec; padding:6px 0; border-radius:10px; font-weight:700; color:#dc2626; }
.att-slot-n { background:#f1f1f1; padding:6px 0; border-radius:10px; font-weight:700; color:#555; }

.faculty-card {
  background:#fff;
  padding:16px;
  border-radius:14px;
  box-shadow:0 2px 10px rgba(0,0,0,0.07);
  margin-bottom:12px;
}
.faculty-name {
  font-weight:700;
  font-size:16px;
  margin-bottom:4px;
}
.faculty-sub {
  font-size:14px;
  color:#555;
}
</style>

<!-- TAB BUTTONS -->
<div class="att-tab-nav">
  <button class="att-tab-btn active" onclick="openAttTab('att-overview', this)">Overview</button>
  <button class="att-tab-btn" onclick="openAttTab('att-daywise', this)">Day-Wise</button>
  <button class="att-tab-btn" onclick="openAttTab('att-faculty', this)">Faculty Info</button>
</div>
<!-- =============== OVERVIEW TAB =============== -->
<div id="att-overview" class="att-tab">

  <div class="att-box">
    <h4 class="fw-bold">Attendance Summary</h4>

    <div style="font-size:32px; font-weight:800; margin-top:10px;">
      <?= $percent ?>%
    </div>

    <div class="att-percent-bar">
      <div class="att-percent-fill" style="width: <?= $percent ?>%;"></div>
    </div>

    <div class="att-summary-row">
      <span class="att-summary-label">Present:</span>
      <span class="att-summary-val"><?= $totalPresent ?> / <?= $totalSlots ?></span>
    </div>

    <div class="att-summary-row">
      <span class="att-summary-label">Absent:</span>
      <span class="att-summary-val"><?= $totalSlots - $totalPresent ?></span>
    </div>

  </div>

  <!-- SUBJECT WISE -->
  <h5 class="fw-bold mb-2">Subject Wise Attendance</h5>

  <?php foreach($subjects as $name => $data): 
      $present = $data["present"]; $total = $data["total"]; ?>

    <div class="sub-card">
      <div class="sub-name"><?= $name ?></div>
      <div class="sub-info">
        Present: <b><?= $present ?></b> / <?= $total ?> <br>
        Absent: <b><?= $total - $present ?></b>
      </div>
    </div>

  <?php endforeach; ?>
</div>
<!-- =============== DAY-WISE TAB =============== -->
<div id="att-daywise" class="att-tab" style="display:none;">

  <div class="att-table">

    <div class="att-header">
      <div class="att-col">Date</div>
      <?php for ($i=1; $i <= $maxSlots; $i++): ?>
        <div class="att-col">Slot <?= $i ?></div>
      <?php endfor; ?>
    </div>

    <?php foreach ($attendance as $date => $slots): ?>
      <div class="att-row">

        <div class="att-col">
          <?= date("d-M-y", strtotime($date)) ?><br>
          <span style="font-size:12px; color:#777;">
            <?= date("D", strtotime($date)) ?>
          </span>
        </div>

        <?php for ($i=0; $i < $maxSlots; $i++): ?>
          <div class="att-col">
            <?php
              if (!isset($slots[$i])) echo "<div class='att-slot-n'>-</div>";
              else if ($slots[$i] === "P") echo "<div class='att-slot-p'>P</div>";
              else if ($slots[$i] === "A") echo "<div class='att-slot-a'>A</div>";
              else echo "<div class='att-slot-n'>-</div>";
            ?>
          </div>
        <?php endfor; ?>

      </div>
    <?php endforeach; ?>

  </div>

</div>
<!-- =============== FACULTY INFO =============== -->
<div id="att-faculty" class="att-tab" style="display:none;">

  <h5 class="fw-bold mb-2">Faculty Information</h5>

  <div class="faculty-card">
    <div class="faculty-name">TANVI PATEL (TP)</div>
    <div class="faculty-sub">Operating System, OS Lab</div>
  </div>

  <div class="faculty-card">
    <div class="faculty-name">NEHA WAGH (NW)</div>
    <div class="faculty-sub">Software Engineering, SE Lab</div>
  </div>

  <div class="faculty-card">
    <div class="faculty-name">Khushal Bhoyar (KB)</div>
    <div class="faculty-sub">Network Security, NSC Lab</div>
  </div>

  <div class="faculty-card">
    <div class="faculty-name">RAJ KELAWALA (RK)</div>
    <div class="faculty-sub">Python, Python Lab</div>
  </div>

  <div class="faculty-card">
    <div class="faculty-name">Debojyoti Chakraborty (DC)</div>
    <div class="faculty-sub">Cryptography</div>
  </div>

</div>


</section>   
<script>
function openAttTab(id, btn){
  document.querySelectorAll(".att-tab").forEach(t => t.style.display="none");
  document.getElementById(id).style.display = "block";

  document.querySelectorAll(".att-tab-btn").forEach(b => b.classList.remove("active"));
  btn.classList.add("active");
}
</script>


<!-- ================= STUDENT INFO ================ -->
 
<section id="student" class="page" style="display:none">
  <button class="back-btn" onclick="openPage('home')">
    <i class="bi bi-arrow-left"></i> Back
  </button>

  <style>
    .stu-card {
      background:#fff;
      padding:18px;
      border-radius:14px;
      box-shadow:0 3px 12px rgba(0,0,0,0.08);
      margin-bottom:18px;
      text-align:center;
    }
    .stu-img {
      width:160px;
      height:160px;
      object-fit:cover;
      border-radius:50%;
      border:4px solid #e5e7eb;
      margin-bottom:14px;
    }
    .stu-name {
      font-size:22px;
      font-weight:700;
      color:#2b4f77;
      margin-bottom:6px;
    }
    .stu-badge {
      background:#2eccb6;
      color:#fff;
      padding:5px 14px;
      border-radius:20px;
      font-size:14px;
      font-weight:600;
      display:inline-block;
      margin-bottom:12px;
    }
    .stu-line {
      width:100%;
      height:1px;
      background:#ddd;
      margin:14px 0;
    }
    .info-row {
      font-size:15px;
      text-align:left;
      margin:8px 0;
      display:flex;
      justify-content:space-between;
      color:#4a5568;
    }
    .info-label { font-weight:600; color:#2d3748; }
  </style>

  <div class="stu-card">

    <!-- PROFILE PHOTO -->
    <img src="your_profile_medium.jpg" class="stu-img">

    <!-- NAME -->
    <div class="stu-name">VALLURI SRI KRISHNA VARDAN</div>

    <!-- ACTIVE BADGE -->
    <div class="stu-badge">Active</div>

    <!-- COURSE INFO -->
    <div style="font-size:16px; font-weight:600; color:#555;">
      PIET-1 - BTech - Cyber Security (Semester - 3)
    </div>

    <!-- ENROLLMENT & ABC NUMBER -->
    <div style="margin-top:12px; font-size:16px; font-weight:600; color:#2d3748;">
      Enrollment Number:<br>
      <span style="font-size:18px; font-weight:700;">2403031260215</span>
      <br><br>
      Academic Bank Credit (ABC) Number:<br>
      <span style="font-size:18px; font-weight:700;">163032646172</span>
    </div>

    <!-- BRANCH - SECTION -->
    <div style="margin-top:18px; font-size:16px; font-weight:600; color:#445;">
      PIET-BTech-CSE-4CYBER3 | 2 | 48
    </div>

    <div class="stu-line"></div>

    <!-- DETAILS -->
    <div class="info-row">
      <span class="info-label">DOB :</span>
      <span>28-11-2006</span>
    </div>

    <div class="info-row">
      <span class="info-label">Student :</span>
      <span>6281048554</span>
    </div>

    <div class="info-row">
      <span class="info-label">Father :</span>
      <span>VALLURI VENKATA KRISHNANANDA CHOWDARY | 9951996671</span>
    </div>

    <div class="info-row">
      <span class="info-label">Mother :</span>
      <span>VALLURI VISALAKSHI | 6301244329</span>
    </div>

    <div class="info-row" style="flex-direction:column; align-items:flex-start;">
      <span class="info-label">Email :</span>
      <span>2403031260215@paruluniversity.ac.in</span>
      <span>krishnavardhan124@gmail.com</span>
    </div>

  </div>
</section>


   




<!-- ================= HOSTEL PAGE ================ -->
<section id="hostel" class="page" style="display:none">

  <button class="back-btn" onclick="openPage('home')">
    <i class="bi bi-arrow-left"></i> Back
  </button>

  <style>
    .hostel-tabs { 
      display:flex; 
      gap:10px; 
      margin-top:10px; 
      overflow-x:auto; 
      padding-bottom:6px;
    }
    .hostel-tabs::-webkit-scrollbar { display:none; }

    .hostel-tab-btn {
      padding:10px 18px;
      border:none;
      border-radius:12px;
      background:#e5e7eb;
      font-weight:600;
      white-space:nowrap;
      cursor:pointer;
      transition:0.25s;
    }
    .hostel-tab-btn.active {
      background:#2563eb;
      color:white;
      box-shadow:0 3px 8px rgba(0,0,0,0.3);
    }

    .hostel-box {
      background:#fff;
      padding:18px;
      border-radius:14px;
      box-shadow:0 3px 12px rgba(0,0,0,0.1);
      margin-top:16px;
      animation:fadeIn .3s ease;
    }

    .hostel-img {
      width:170px; height:170px;
      object-fit:cover;
      border-radius:50%;
      border:4px solid #e2e8f0;
      display:block;
      margin:auto;
    }

    .hostel-name {
      font-size:20px;
      text-align:center;
      font-weight:700;
      color:#2b4f77;
      margin-top:12px;
    }
    .hostel-active {
      background:#2eccb6;
      color:white;
      padding:5px 14px;
      border-radius:20px;
      font-weight:600;
      display:inline-block;
      margin:10px 0;
    }
    .info-row {
      font-size:15px; margin:6px 0;
      display:flex; justify-content:space-between;
      color:#445;
    }
    .info-label { font-weight:700; }
    @keyframes fadeIn {
      from { opacity:0; transform:translateY(6px); }
      to   { opacity:1; transform:translateY(0); }
    }
  </style>

  <!-- SWITCH TABS -->
  <div class="hostel-tabs">
    <button class="hostel-tab-btn active" onclick="openHostelTab('info', this)">Hostel Info</button>
    <button class="hostel-tab-btn" onclick="openHostelTab('passes', this)">Gate Passes</button>
    <button class="hostel-tab-btn" onclick="openHostelTab('mess', this)">Mess Menu</button>
  </div>


  <!-- ===================== HOSTEL INFO (DEFAULT) ===================== -->
  <div id="info" class="hostel-box">

    <img src="your_profile_medium.jpg" class="hostel-img">

    <div class="hostel-name">42043 - 2403031260215 - VALLURI SRI KRISHNA VARDAN</div>

    <div style="text-align:center;">
      Student | <span class="hostel-active">Active</span>
    </div>

    <div class="info-row"><span class="info-label">Registration No. :</span> <span>42043</span></div>

    <div class="info-row"><span class="info-label">Hostel :</span> <span>TAGORE BHAWAN - C</span></div>

    <div class="info-row"><span class="info-label">Room Type :</span> <span>Non AC</span></div>

    <div class="info-row"><span class="info-label">Room Details :</span> 
      <span>Floor: 3 | Room: C-361 | Bed: 3</span>
    </div>

    <div class="info-row">
      <span class="info-label"><i class="bi bi-calendar2"></i> Duration :</span>
      <span>01-07-2025 to 30-06-2026</span>
    </div>

    <br>

    <div class="info-row"><span class="info-label">Student Phone :</span> <span>6281048554</span></div>

    <div class="info-row"><span class="info-label">Student Email :</span>
      <span style="text-align:right;">
        2403031260215@paruluniversity.ac.in
      </span>
    </div>

    <div class="info-row"><span class="info-label">Guardian Phone :</span>
      <span>9951996671 , 6301244329</span>
    </div>

    <div class="info-row"><span class="info-label">Guardian Email :</span> <span>-</span></div>

    <div class="info-row"><span class="info-label">City :</span> <span>EAST GODAVARI</span></div>

    <div class="info-row" style="flex-direction:column;align-items:flex-start;">
      <span class="info-label">Address :</span>
      <span>HOUSE NO-1-18 MAIN ROAD, NELAPARTHIPADU, DRAKSHARAMAM RAMCHANDRAPURAM DR B R AMBEDKAR NEAR PANCHAYAT</span>
    </div>

    <div class="info-row" style="flex-direction:column;align-items:flex-start;">
      <span class="info-label">Rector Name :</span>
      <span>Mr. CHANDAN SINGH, Mr. JAY PAL SINGH BHADOURIYA, Mr. KALISETTI NEELAYYA, Mr. LALIT KUMAR, Mr. RAJ VAKSH SINGH</span>
    </div>

  </div>




  <!-- ===================== HOSTEL PASSES ===================== -->
  <div id="passes" class="hostel-box" style="display:none;">
    <h4 class="fw-bold mb-2">Recent Gate Passes</h4>

    <div class="table-responsive">
      <table class="table table-bordered text-center">
        <thead class="table-light">
          <tr>
            <th>Sr</th>
            <th>Reason</th>
            <th>Place</th>
            <th>From</th>
            <th>To</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Holiday</td>
            <td>HOME</td>
            <td>17-10-2025</td>
            <td>02-11-2025</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Personal</td>
            <td>PAVGADH</td>
            <td>19-07-2025</td>
            <td>19-07-2025</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    <p class="text-center mt-2" style="font-size:13px;color:#777;">
      <b>NOTE:</b> Only recent gate passes will be shown.
    </p>
  </div>




  <!-- ===================== MESS MENU (Premium UI Fixed) ===================== -->
   <?php
// Get this week's Monday
$weekStart = strtotime("monday this week");

// Build days array (Monday to Sunday)
$messDays = [];
for ($i = 0; $i < 7; $i++) {
    $ts = strtotime("+$i day", $weekStart);
    $messDays[] = [
        "id"   => $i,
        "name" => strtoupper(date("D", $ts)), // MON, TUE…
        "date" => date("d M", $ts)            // 02 Dec
    ];
}
?>
<div id="messmenu" style="display:none;">

<style>
.mess-nav {
  display:flex;
  gap:10px;
  overflow-x:auto;
  padding-bottom:8px;
  margin-top:10px;
  scrollbar-width:none;
}
.mess-nav::-webkit-scrollbar { display:none; }

.mess-nav-btn {
  padding:10px 18px;
  border-radius:14px;
  border:none;
  background:#f3f4f6;
  font-weight:600;
  color:#475569;
  cursor:pointer;
  white-space:nowrap;
  transition:0.25s ease;
  text-align:center;
  box-shadow:0 2px 6px rgba(0,0,0,0.08);
}
.mess-nav-btn.active {
  background:#4f46e5;
  color:#fff;
  transform:translateY(-2px);
  box-shadow:0 6px 14px rgba(79,70,229,0.35);
}

.mess-date {
  font-size:12px;
  color:#6b7280;
  font-weight:500;
}

.meal-card {
  background:white;
  padding:18px;
  border-radius:16px;
  box-shadow:0 4px 16px rgba(0,0,0,0.09);
  margin-top:15px;
  animation:fadeSlide 0.35s ease;
}

.meal-header {
  font-size:18px;
  font-weight:700;
  color:#1e293b;
  margin-bottom:10px;
  display:flex;
  align-items:center;
  gap:8px;
}

.meal-item {
  font-size:15px;
  background:#f8fafc;
  padding:10px 12px;
  border-radius:12px;
  margin-bottom:8px;
  border-left:4px solid #4f46e5;
  color:#334155;
}

@keyframes fadeSlide {
  from { opacity:0; transform:translateY(10px); }
  to   { opacity:1; transform:translateY(0); }
}
</style>

<h4 class="fw-bold mt-4">🍽️ Mess Menu</h4>

<!-- NAVIGATION -->
<div class="mess-nav">
  <?php foreach ($messDays as $d): ?>
    <button class="mess-nav-btn <?= $d['id']==0?'active':'' ?>"
            onclick="openPremiumMess('mess-<?= $d['id'] ?>', this)">
      <?= $d['name'] ?><br>
      <span class="mess-date"><?= $d['date'] ?></span>
    </button>
  <?php endforeach; ?>
</div>

<!-- DAY MENUS -->

<!-- MONDAY -->
<div id="mess-0" class="meal-card">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">POHA, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">ALOO DHUM, DAL, PAPAD, RICE</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">DRUMSTICK TOMATO, RICE, SAMBAR</div>
</div>

<!-- TUESDAY 09 DEC -->
<div id="mess-1" class="meal-card">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">Dabeli & Sauce, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">Tindora Fry, Matar, Miriyala Rasam, Roti, Dal, Plain Rice, Papad, Salad, Buttermilk</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">Mirchi Onion Tomato Dry Sabji, Roti, Sambar, Rice, Chutney</div>
</div>

<!-- WEDNESDAY 10 DEC -->
<div id="mess-2" class="meal-card" style="display:none;">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">Corn Peanut Chaat, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">Masala Ravvaya, Moong, Pachi Pulusu, Roti, Tomato Dal, Plain Rice, Papad, Salad, Buttermilk</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">Cauliflower Matar, Masala Roti, Sambar, Rice, Salad</div>
</div>

<!-- THURSDAY 11 DEC -->
<div id="mess-3" class="meal-card" style="display:none;">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">Paratha & Chutney, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">Cabbage Matar, Chana Dal, Tomato Rasam, Roti, Dal, Plain Rice, Papad, Buttermilk, Salad, Amla Pickle</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">Aloo Sukhi Bhaji, Monawali Roti, Dahi Raita, Rice</div>
</div>

<!-- FRIDAY 12 DEC -->
<div id="mess-4" class="meal-card" style="display:none;">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">Lemon Rice, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">Fansi Sabji, Desi Chana, Miriyala Rasam, Roti, Dal, Plain Rice, Papad, Salad, Buttermilk</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">Matar Paneer, Roti, Majjiga Pulusu, Rice</div>
</div>

<!-- SATURDAY 13 DEC -->
<div id="mess-5" class="meal-card" style="display:none;">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">Idly Sambhar, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">Suran Sabji, Tuver, Pachi Pulusu, Roti, Drumstick Dal, Plain Rice, Papad, Salad</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">Gutti Vankaya, Rice, Sambar, Chutney</div>
</div>

<!-- SUNDAY 14 DEC -->
<div id="mess-6" class="meal-card" style="display:none;">
  <div class="meal-header">🥞 Breakfast</div>
  <div class="meal-item">Bread Butter, Tea/Coffee</div>

  <div class="meal-header">🍛 Lunch</div>
  <div class="meal-item">Aloo Sabji, Sweet, Papad, Salad</div>

  <div class="meal-header">🍽️ Dinner</div>
  <div class="meal-item">Rice, Sambar, Chutney</div>
</div>

<script>
function openPremiumMess(dayId, btn){
  document.querySelectorAll(".meal-card").forEach(c => c.style.display = "none");
  document.getElementById(dayId).style.display = "block";

  document.querySelectorAll(".mess-nav-btn").forEach(b => b.classList.remove("active"));
  btn.classList.add("active");
}
</script>
<script>
function openHostelTab(tab, btn) {

  // Hide all hostel sections
  document.getElementById("info").style.display = "none";
  document.getElementById("passes").style.display = "none";
  document.getElementById("messmenu").style.display = "none";

  // Convert 'mess' to correct section ID
  if (tab === "mess") tab = "messmenu";

  // Show selected section
  document.getElementById(tab).style.display = "block";

  // Update active button
  document.querySelectorAll(".hostel-tab-btn")
    .forEach(b => b.classList.remove("active"));
  
  btn.classList.add("active");

  // Smooth scroll
  document.getElementById("hostel").scrollIntoView({ behavior: "smooth" });
}
</script>


</div>




</section>



<!-- ================= RESULTS PAGE ================ -->
<section id="results" class="page" style="display:none">

  <button class="back-btn" onclick="openPage('home')">
    <i class="bi bi-arrow-left"></i> Back
  </button>
  <h3>Results</h3>

<style>
.res-card{
  background:#fff;
  padding:14px;
  border-radius:14px;
  box-shadow:0 2px 12px rgba(0,0,0,0.06);
  margin-top:14px;
  margin-bottom:14px;
}

.res-table{
  width:100%;
  border-collapse:collapse;
  font-size:14px;
}
.res-table th{
  background:#f0f4f7;
  padding:10px;
  font-weight:700;
  border-bottom:1px solid #ddd;
  text-align:center;
}
.res-table td{
  padding:10px;
  border-bottom:1px solid #eee;
  text-align:center;
}

.result-pass{background:#e8fbe8;color:#1E9D32;font-weight:700;border-radius:6px;padding:4px 6px;}
.result-fail{background:#fde4e4;color:#C62828;font-weight:700;border-radius:6px;padding:4px 6px;}
.result-mid{background:#eef3ff;color:#3454D1;font-weight:700;border-radius:6px;padding:4px 6px;}

.alert-fail{
  background:#ffe5e5;
  color:#c0392b;
  font-weight:600;
  padding:10px 14px;
  border-radius:10px;
  margin-top:10px;
}
.info-box{
  background:#fff;
  padding:14px;
  border-radius:14px;
  box-shadow:0 2px 10px rgba(0,0,0,0.05);
  margin-top:14px;
}
.info-row{
  display:flex;
  justify-content:space-between;
  padding:6px 0;
  font-size:15px;
}
</style>

<div class="res-card">
  <h4 class="section-title">Semester - 2 Result</h4>

  <div class="table-responsive">
    <table class="res-table">
      <thead>
        <tr>
          <th>Sr</th>
          <th>Code</th>
          <th>Subject</th>
          <th>Credit</th>
          <th>Result</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>303105151</td><td>Computational Thinking for Structured Design-2</td><td>4.00</td><td><span class="result-pass">B</span></td></tr>
        <tr><td>2</td><td>303105153</td><td>Global Certifications – Azure, AWS, GCP</td><td>2.00</td><td><span class="result-pass">A+</span></td></tr>
        <tr><td>3</td><td>303105154</td><td>Mastering Kali Linux and OSINT</td><td>3.00</td><td><span class="result-pass">B</span></td></tr>
        <tr><td>4</td><td>303107152</td><td>ICT Workshop</td><td>1.00</td><td><span class="result-pass">B+</span></td></tr>
        <tr><td>5</td><td>303191151</td><td>Mathematics-II</td><td>4.00</td><td><span class="result-pass">B</span></td></tr>
        <tr><td>6</td><td>303191202</td><td>Engineering Physics-II</td><td>4.00</td><td><span class="result-pass">B+</span></td></tr>
        <tr><td>7</td><td>303193152</td><td>Advanced Communication & Technical Writing</td><td>2.00</td><td><span class="result-pass">A</span></td></tr>
      </tbody>
    </table>
  </div>

  <div class="alert-fail">
    ❗ PROMOTED TO 3RD SEMESTER (O BACKLOGS)
  </div>

  <div class="info-box">
    <div class="info-row"><span>Seat No:</span><span><b>AF23604</b></span></div>
    <div class="info-row"><span>Name:</span><span><b>VALLURI SRI KRISHNA VARDAN</b></span></div>
    <div class="info-row"><span>Current Backlog:</span><span><b>0</b></span></div>
    <div class="info-row"><span>Total Backlog:</span><span><b>0</b></span></div>
    <div class="info-row"><span>SGPA:</span><span><b>6.75</b></span></div>
    <div class="info-row"><span>CGPA:</span><span><b>6.92</b></span></div>
  </div>

</div>

</section>


<!-- ================= FEES PAGE ================ -->
<section id="fees" class="page" style="display:none">

  <button class="back-btn" onclick="openPage('home')">
    <i class="bi bi-arrow-left"></i> Back
  </button>

  <h3 class="fw-bold mb-3">Fee Status</h3>

  <style>
    .fee-card {
      background:#fff;
      padding:14px;
      border-radius:14px;
      box-shadow:0 3px 12px rgba(0,0,0,0.08);
      margin-bottom:14px;
    }
    .fee-amount {
      font-size:26px;
      font-weight:700;
    }
    .fee-label {
      font-size:14px;
      color:#666;
      margin-top:6px;
    }
    .bar-line {
      width:100%;
      height:5px;
      border-radius:6px;
      margin-top:10px;
    }
    .bar-green { background:#20c997; }
    .bar-blue  { background:#0d6efd; }
    .bar-gold  { background:#d4a017; }
    .bar-red   { background:#dc3545; }

    .tbl-box {
      background:#fff;
      padding:14px;
      border-radius:14px;
      box-shadow:0 3px 12px rgba(0,0,0,0.08);
      margin-top:20px;
    }

    table td, table th {
      font-size:14px !important;
      vertical-align:middle !important;
    }
  </style>

  <!-- ================= TOP 4 CARDS ================= -->
  <div class="fee-card">
    <div class="fee-amount text-success">5,95,500</div>
    <div class="bar-line bar-green"></div>
    <div class="fee-label">Fees To Be Collected</div>
  </div>

  <div class="fee-card">
    <div class="fee-amount text-primary">0</div>
    <div class="bar-line bar-blue"></div>
    <div class="fee-label">Previously Paid</div>
  </div>

  <div class="fee-card">
    <div class="fee-amount" style="color:#b8860b;">5,95,500</div>
    <div class="bar-line bar-gold"></div>
    <div class="fee-label">Paid</div>
  </div>

  <div class="fee-card">
    <div class="fee-amount text-danger">0</div>
    <div class="bar-line bar-red"></div>
    <div class="fee-label">Outstanding Amount</div>
  </div>

  <!-- ================= SEMESTER TABLE ================= -->
  <div class="tbl-box">
    <h5 class="fw-bold mb-2">Semester Fees</h5>
    <div class="table-responsive">
      <table class="table table-bordered text-center">
        <thead class="table-light">
          <tr>
            <th>Semester</th>
            <th>Fees To Be Collected</th>
            <th>Refunded</th>
            <th>Previously Paid</th>
            <th>Paid</th>
            <th>Outstanding</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td><td>1,75,000</td><td>50,000</td><td>0</td><td class="text-success">1,75,000</td><td class="text-danger">0</td>
          </tr>
          <tr>
            <td>2</td><td>1,75,000</td><td>0</td><td>0</td><td class="text-success">1,75,000</td><td class="text-danger">0</td>
          </tr>
        </tbody>
        <tfoot class="table-light fw-bold">
          <tr>
            <td>Total</td>
            <td>3,50,000</td>
            <td>50,000</td>
            <td>0</td>
            <td class="text-success">3,50,000</td>
            <td class="text-danger">0</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <!-- ================= HOSTEL TABLE ================= -->
  <div class="tbl-box">
    <h5 class="fw-bold mb-2">Hostel Fee</h5>

    <div class="table-responsive">
      <table class="table table-bordered text-center">
        <thead class="table-light">
          <tr>
            <th>Hostel</th>
            <th>Year</th>
            <th>Fees</th>
            <th>Paid</th>
            <th>Outstanding</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>TAGORE BHAWAN - A</td>
            <td>2024-25</td>
            <td>1,19,500</td>
            <td class="text-success">1,19,500</td>
            <td class="text-danger">0</td>
          </tr>

          <tr>
            <td>TAGORE BHAWAN - C</td>
            <td>2025-26</td>
            <td>1,24,000</td>
            <td class="text-success">1,24,000</td>
            <td class="text-danger">0</td>
          </tr>
        </tbody>

        <tfoot class="table-light fw-bold">
          <tr>
            <td colspan="2">Total</td>
            <td>2,43,500</td>
            <td class="text-success">2,43,500</td>
            <td class="text-danger">0</td>
          </tr>
        </tfoot>

      </table>
    </div>
  </div>

</section>

 



<script>

function openPage(pageId){
  const pages = ['home','attendance','student','hostel','results','fees'];
  pages.forEach(p=>{
    document.getElementById(p).style.display = (p === pageId) ? "block" : "none";
  });
  window.scrollTo(0,0);
}

function openMenu(id){
  document.querySelectorAll(".menu-box").forEach(box => box.style.display = "none");
  document.getElementById(id).style.display = "block";

  document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
  event.target.classList.add("active");
}
</script>



</body>
</html>
