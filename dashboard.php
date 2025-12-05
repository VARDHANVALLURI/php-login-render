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
<title> </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body {
  margin:0; padding:0; background:#f5f6fa;
  font-family:'Inter',sans-serif; overflow-x:hidden;
}

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
<section id="attendance" class="page">
  <button class="back-btn" onclick="openPage('home')"><i class="bi bi-arrow-left"></i> Back</button>
  <h3>Attendance</h3>
   <!-- ATTENDANCE -->
  
<div style="background:#000; color:#fff; padding:12px 14px; border-radius:10px; font-size:14px; font-weight:600; margin:10px 0; text-align:center;">
  ⏳ Attendance refreshes at 3:00 AM daily • Weekly summary below
</div>


<?php
/* ---------------------
   MANUAL ATTENDANCE DATA
   --------------------- */

// Each date contains slot values: "P" (Present), "A" (Absent), "-" (No class)
// You can add/remove dates and slots anytime.

$attendance = [
    "2025-12-04" => ["P", "P", "P", "P", "P"],     // 5 slots day
    "2025-12-02" => ["P", "P", "P", "P", "P"],     // 5 slots day
    "2025-12-01" => ["P", "P", "P", "P", "-"],     // 4 slots day
    "2025-11-28" => ["P", "P", "P", "A", "-"],     // 4 slots day
    "2025-11-27" => ["P", "P", "P", "P", "P"],     // 5 slots day
    "2025-11-25" => ["P", "P", "P", "P", "P"],     // 5 slots day
    "2025-11-24" => ["P", "P", "P", "-"],          // 4 slot day
    
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

// Maximum slots = 5
$maxSlots = 5;

// Helper to get weekday
function getDayName($date) {
    return date("D", strtotime($date));
}
?>

<style>
.att-card{background:#fff;border-radius:14px;padding:14px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:14px;}
.att-title{font-size:20px;font-weight:700;}
.att-sub{font-size:14px;color:#555;margin-top:2px;}
.att-bar{width:100%;height:9px;background:#e3e3e3;border-radius:10px;margin-top:10px;overflow:hidden;}
.att-bar-fill{height:100%;background:#26c85f;}
.att-percent{text-align:right;font-weight:700;color:#1fa950;margin-top:4px;}

.att-status-box{display:flex;justify-content:space-between;background:#fff;padding:14px;border-radius:12px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);font-size:14px;margin-bottom:14px;}
.att-ok{color:#27ae60;font-weight:600;}
.att-bad{color:#e74c3c;font-weight:600;}
.att-mid{color:#e67e22;font-weight:600;}
.att-info{color:#3498db;font-weight:600;}
.att-legend{font-size:13px;color:#444;margin-bottom:8px;}

.att-table{background:#fff;border-radius:14px;overflow:hidden;
box-shadow:0 2px 12px rgba(0,0,0,0.06);}
.att-header,.att-row{display:flex;padding:12px;border-bottom:1px solid #eee;}
.att-header{background:#f8fafc;font-weight:700;}
.att-col{flex:1;text-align:center;}

.att-slot-p{background:#e7fbe9;color:#27ae60;font-weight:700;border-radius:10px;padding:6px 0;}
.att-slot-a{background:#fdecea;color:#c0392b;font-weight:700;border-radius:10px;padding:6px 0;}
.att-slot-n{background:#f0f0f0;color:#666;border-radius:10px;padding:6px 0;}
</style>


<!-- TOP CARD -->
<div class="att-card">
    <div class="att-title">Sem 4</div>
    <div class="att-sub">A.Y. 2025–26 • Even</div>

    <div class="att-bar">
        <div class="att-bar-fill" style="width: <?= $percent ?>%;"></div>
    </div>

    <div class="att-percent"><?= $percent ?>%</div>
</div>

<!-- STATUS ROW -->
<div class="att-status-box">
    <div class="att-ok">Present: <b><?= $totalPresent ?> / <?= $totalSlots ?></b></div>
    <div class="att-bad">Absent: <b><?= $totalSlots - $totalPresent ?></b></div>
    <div class="att-mid">Pending: <b>0</b></div>
    <div class="att-info">No Attendance: <b>0</b></div>
</div>

<div class="att-legend">P = Present, A = Absent, – = No Lecture/Lab</div>

<!-- DYNAMIC TABLE -->
<div class="att-table">

    <!-- TABLE HEADER -->
    <div class="att-header">
        <div class="att-col">Date</div>
        <?php for ($i=1; $i <= $maxSlots; $i++): ?>
            <div class="att-col">Slot <?= $i ?></div>
        <?php endfor; ?>
    </div>

    <!-- TABLE ROWS -->
    <?php foreach ($attendance as $date => $slots): ?>
        <div class="att-row">

            <!-- DATE + DAY -->
            <div class="att-col">
                <?= date("d-M-y", strtotime($date)) ?><br>
                <span style="font-size:12px;color:#777;"><?= getDayName($date) ?></span>
            </div>

            <!-- SLOT VALUES -->
            <?php for ($i=0; $i < $maxSlots; $i++): ?>

                <div class="att-col">
                    <?php
                    if (!isset($slots[$i])) {
                        echo '<div class="att-slot-n">-</div>';
                    } else if ($slots[$i] === "P") {
                        echo '<div class="att-slot-p">P</div>';
                    } else if ($slots[$i] === "A") {
                        echo '<div class="att-slot-a">A</div>';
                    } else {
                        echo '<div class="att-slot-n">-</div>';
                    }
                    ?>
                </div>

            <?php endfor; ?>

        </div>
    <?php endforeach; ?>

</div>

  <!-- SUBJECT WISE ATTENDANCE -->
<br><br>
<h4 class="section-title">Subject Wise Attendance</h4>

<?php
$subjects = [
    "Operating Systems"          => ["present" => 05, "total" => 05],
    "Operating Systems Lab"      => ["present" => 02, "total" => 02],
    "Python"                     => ["present" => 04, "total" => 04],
    "Python Lab"                 => ["present" => 02, "total" => 02],
    "Networking"                 => ["present" => 04, "total" => 04],
    "Networking Lab"             => ["present" => 02, "total" => 02],
    "Software Engineering"       => ["present" => 05, "total" => 05],
    "Software Engineering Lab"   => ["present" => 02, "total" => 02],
    "Cryptography"               => ["present" => 04, "total" => 04],
    "PGPD"                       => ["present" => 01, "total" => 0]
];
?>

<style>
.sub-card{
  background:#fff;
  padding:14px;
  border-radius:14px;
  box-shadow:0 3px 10px rgba(0,0,0,0.06);
  margin-bottom:12px;
}
.sub-name{font-size:16px;font-weight:700;margin-bottom:6px;}
.sub-info{font-size:14px;color:#555;}
</style>

<?php foreach($subjects as $name => $data): ?>
<?php
    $present = $data["present"];
    $total   = $data["total"];
    $absent  = $total - $present;
?>

<div class="sub-card">
    <div class="sub-name"><?= $name ?></div>

    <div class="sub-info">
        Present: <b><?= $present ?></b> / <?= $total ?><br>
        Absent: <b><?= $absent ?></b> / <?= $total ?>
    </div>
</div>

<?php endforeach; ?>

</section>   <!-- CLOSE ATTENDANCE SECTION -->



<!-- ================= STUDENT INFO PAGE ================ -->
<section id="student" class="page" style="display:none">
  <button class="back-btn" onclick="openPage('home')">
    <i class="bi bi-arrow-left"></i> Back
  </button>
  <h3>Student Information</h3>

  <div class="card-box">

    <!-- Profile photo -->
    <div class="profile-pic text-center mb-3">
      <img 
        src="your_profile_medium.jpg"
        alt="Student Photo"
        style="width:160px;height:160px;object-fit:cover;border-radius:14px;border:3px solid #d0d0d0;">
      <h5 class="fw-bold mt-3 mb-1">VALLURI SRI KRISHNA VARDAN</h5>
      <div class="text-muted">Roll No: 2403031260215 | CSE (4CYBER3)</div>
    </div>

    <!-- Information grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:14px;">

      <div class="card-box" style="padding:12px;">
        <div class="text-muted">DOB</div>
        <div style="font-weight:600;margin-top:6px;">28-11-2006</div>
      </div>

      <div class="card-box" style="padding:12px;">
        <div class="text-muted">Student Phone</div>
        <div style="font-weight:600;margin-top:6px;">6281048554</div>
      </div>

      <div class="card-box" style="padding:12px;">
        <div class="text-muted">College Email</div>
        <div style="word-break:break-all;font-weight:600;margin-top:6px;">
          2403031260215@paruluniversity.ac.in
        </div>
      </div>

      <div class="card-box" style="padding:12px;">
        <div class="text-muted">Personal Email</div>
        <div style="word-break:break-all;font-weight:600;margin-top:6px;">
          krishnavardhan124@gmail.com
        </div>
      </div>

    </div>

    <!-- Parents -->
    <div style="margin-top:18px;">
      <div class="section-title">Parents / Guardian</div>
      <p><strong>Father:</strong> VALLURI VENKATA KRISHNANANDA CHOWDARY | 9951996671</p>
      <p><strong>Mother:</strong> VALLURI VISALAKSHI | 6301244329</p>
    </div>

  </div>
</section>


<!-- ================= HOSTEL PAGE ================ -->
<section id="hostel" class="page" style="display:none">
  <button class="back-btn" onclick="openPage('home')">
    <i class="bi bi-arrow-left"></i> Back
  </button>
  <h3>Hostel</h3>

  <div class="card" style="margin-top:10px;">
    <h4 class="section-title">Hostel Details</h4>
    <p><strong>Reg No:</strong> 42043</p>
    <p><strong>Block:</strong> TAGORE BHAWAN - C (Non AC)</p>
    <p><strong>Room:</strong> Floor 3 | Room C-361 | Bed 3</p>
    <p><strong>Duration:</strong> 01-07-2025 → 30-06-2026</p>
    <p><strong>City:</strong> EAST GODAVARI</p>
    <p><strong>Address:</strong> HOUSE NO-1-18 MAIN ROAD, NELAPARTHIPADU, DRAKSHARAMAM</p>
  </div>

  <div class="card" style="margin-top:14px;">
    <h4 class="section-title">Recent Gate Passes</h4>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
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

    <div style="padding:10px 0; text-align:center; font-size:13px; color:#555;">
      <b>NOTE:</b> Only recent gate passes will be shown.
    </div>
  </div>

  <!-- ================= MESS MENU WITH TABS ================= -->
<h4 class="section-title" style="margin-top:28px;font-weight:700;">Mess Menu (01 Dec - 08 Dec 2025)</h4>

<style>
.tab-buttons {display:flex;overflow-x:auto;gap:10px;margin-top:14px;}
.tab-buttons button{
  padding:10px 16px;border:none;border-radius:10px;
  font-weight:600;cursor:pointer;white-space:nowrap;
  background:#e5e7eb;
}
.tab-buttons button.active{background:#000;color:#fff;}

.menu-box{
  background:#fff;margin-top:16px;padding:16px;border-radius:14px;
  box-shadow:0 3px 10px rgba(0,0,0,0.08);
}
.menu-title{font-weight:700;font-size:18px;margin-bottom:10px;color:#333;}
.menu-item{margin-bottom:8px;font-size:15px;font-weight:500;color:#444;}
</style>

<div class="tab-buttons">
  <button class="tab-btn active" onclick="openMenu('mon')">Monday</button>
  <button class="tab-btn" onclick="openMenu('tue')">Tuesday</button>
  <button class="tab-btn" onclick="openMenu('wed')">Wednesday</button>
  <button class="tab-btn" onclick="openMenu('thu')">Thursday</button>
  <button class="tab-btn" onclick="openMenu('fri')">Friday</button>
  <button class="tab-btn" onclick="openMenu('sat')">Saturday</button>
  <button class="tab-btn" onclick="openMenu('sun')">Sunday</button>
</div>

<!-- MENU CONTENT -->
<div id="mon" class="menu-box">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Veg Upma & Chutney | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Dudhi Sabji, Chora, Tomato Rasam, Roti, Dal, Plain Rice, Buttermilk, Papad, Salad, Tomato Pickle</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Dum Aloo, Roti, Rice, **</div>
</div>

<div id="tue" class="menu-box" style="display:none;">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Idly & Peanut Chutney | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Tindora Fry, Matar, Miriyalu Rasam, Roti, Palak Dal, Plain Rice, Buttermilk, Papad, Salad</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Beetroot Chana Dal Fry, Roti, Rice, Sambhar, Onion</div>
</div>

<div id="wed" class="menu-box" style="display:none;">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Imli Rice | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Jeera Aloo, Math, Pachi Pulusu, Roti, Tomato Dal, Plain Rice, Buttermilk, Papad, Salad, Karam Podi</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Brinjal Curry, Roti, Rice, Onion Tomato Chutney</div>
</div>

<div id="thu" class="menu-box" style="display:none;">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Onion Pakoda | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Cabbage Matar, Chana Dal, Tomato Rasam, Roti, Dal, Plain Rice, Buttermilk, Papad, Salad, Karela Pickle</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Tomato Kurma, Roti, Veg Biryani, Chaas Boondi Raita, Chutney</div>
</div>

<div id="fri" class="menu-box" style="display:none;">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Veg Pasta | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Dahi Onion Sabji, Desi Chana, Tomato Rasam, Roti, Drumstick Dal, Plain Rice, Buttermilk, Papad, Salad</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Drumstick Tomato Curry, Roti, Rice, **</div>
</div>

<div id="sat" class="menu-box" style="display:none;">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Semia Upma & Chutney | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Aloo Palak, Tuver, Miriyala Rasam, Roti, Dal, Plain Rice, Buttermilk, Papad, Salad, Karam Podi</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Dry Cauliflower, Roti, Rice, **</div>
</div>

<div id="sun" class="menu-box" style="display:none;">
  <div class="menu-title">Breakfast</div>
  <div class="menu-item">Bread Jam | Tea/Coffee</div>

  <div class="menu-title">Lunch</div>
  <div class="menu-item">Chole, **, Puri, Kadhi, Jeera Rice, Sweet, Frymes, Salad</div>

  <div class="menu-title">Dinner</div>
  <div class="menu-item">Sambar Rice, Pickle, **</div>
</div>

<script>
function openMenu(id){
  document.querySelectorAll(".menu-box").forEach(box => box.style.display="none");
  document.getElementById(id).style.display="block";

  document.querySelectorAll(".tab-btn").forEach(btn=>btn.classList.remove("active"));
  event.target.classList.add("active");
}
</script>


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
    ❗ PROMOTED TO 3rd SEM (...0 BACKLOGS...)
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
  <h3>Fee Status</h3>

<style>
.dashboard-row{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
  gap:18px;
  margin-top:20px;
}
.dash-card{
  background:#fff;
  border-radius:12px;
  padding:22px;
  box-shadow:0 4px 18px rgba(0,0,0,0.08);
}
.dash-value{
  font-size:34px;
  font-weight:700;
}
.dash-title{
  font-size:15px;
  margin-top:8px;
  font-weight:600;
}
.dash-line{
  width:100%;
  height:5px;
  border-radius:6px;
  margin-top:6px;
}
.green-line{background:#20bf6b;}
.blue-line{background:#2980b9;}
.gold-line{background:#c49a38;}
.red-line{background:#e74c3c;}
.icon{float:right;font-size:28px;}
</style>

<!-- Summary Cards -->
<div class="dashboard-row">
  <div class="dash-card">
    <div class="dash-value" style="color:#20bf6b;">5,95,500</div>
    <div class="icon">🎓</div>
    <div class="dash-line green-line"></div>
    <div class="dash-title">Fees To Be Collected</div>
  </div>

  <div class="dash-card">
    <div class="dash-value" style="color:#2980b9;">0</div>
    <div class="icon">🔄</div>
    <div class="dash-line blue-line"></div>
    <div class="dash-title">Previously Paid</div>
  </div>

  <div class="dash-card">
    <div class="dash-value" style="color:#c49a38;">5,95,500</div>
    <div class="icon">✔️</div>
    <div class="dash-line gold-line"></div>
    <div class="dash-title">Paid</div>
  </div>

  <div class="dash-card">
    <div class="dash-value" style="color:#e74c3c;">0</div>
    <div class="icon">₹</div>
    <div class="dash-line red-line"></div>
    <div class="dash-title">Outstanding Amount</div>
  </div>
</div>

<br>

<!-- ACADEMIC FEE DETAILS TABLE -->
<h4 style="font-weight:700;margin-top:10px;">Academic Fee Details</h4>

<div class="table-responsive" style="margin-top:10px;">
  <table class="table table-bordered text-center">
    <thead style="background:#f8fafc;font-weight:700;">
      <tr>
        <th>Sr</th>
        <th>Semester</th>
        <th>Fees To Be Collected</th>
        <th>Refunded</th>
        <th>Previously Paid</th>
        <th>Paid</th>
        <th>Outstanding</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>1</td><td>1</td><td>1,75,000</td><td>50,000</td><td>0</td><td>1,75,000</td><td>0</td></tr>
      <tr><td>2</td><td>2</td><td>1,75,000</td><td>0</td><td>0</td><td>1,75,000</td><td>0</td></tr>
      <tr style="font-weight:700;background:#f5f5f5;"><td colspan="2">Total</td><td>3,50,000</td><td>50,000</td><td>0</td><td>3,50,000</td><td>0</td></tr>
    </tbody>
  </table>
</div>

<!-- HOSTEL FEE DETAILS -->
<h4 style="font-weight:700;margin-top:20px;">Hostel Fee Details</h4>

<div class="table-responsive" style="margin-top:10px;">
  <table class="table table-bordered text-center">
    <thead style="background:#f8fafc;font-weight:700;">
      <tr>
        <th>Sr</th>
        <th>Hostel</th>
        <th>Year</th>
        <th>Room Type</th>
        <th>Fees To Be Collected</th>
        <th>Paid</th>
        <th>Outstanding</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>1</td><td>TAGORE BHAWAN - A</td><td>2024-25</td><td>Non AC</td><td>1,19,500</td><td>1,19,500</td><td>0</td></tr>
      <tr><td>2</td><td>TAGORE BHAWAN - C</td><td>2025-26</td><td>Non AC</td><td>1,24,000</td><td>1,24,000</td><td>0</td></tr>
      <tr style="font-weight:700;background:#f5f5f5;"><td colspan="4">Total</td><td>2,43,500</td><td>2,43,500</td><td>0</td></tr>
    </tbody>
  </table>
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
</script>

</body>
</html>
