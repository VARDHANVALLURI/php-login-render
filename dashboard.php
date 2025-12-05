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
<meta name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Student Dashboard</title>

<!-- Libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
/* STRICT MOBILE ONLY UI */
html, body {
  width:100%;
  max-width:100%;
  overflow-x:hidden !important;
  font-family:'Inter',sans-serif;
  background:#f5f6fa;
  margin:0;
  padding:0;
  touch-action:pan-y;
}

/* Header */
.header {
  width:100%;
  background:#000;
  color:#fff;
  padding:15px;
  font-weight:700;
  font-size:19px;
  text-align:center;
  position:fixed;
  top:0; left:0;
  z-index:999;
}

/* Page containers */
.page {
  display:none;
  width:100%;
  max-width:100%;
  padding:18px;
  position:absolute;
  top:65px;
  left:0;
  opacity:0;
  transform:translateX(30%);
  transition:.35s ease;
}

.page.active {
  display:block;
  opacity:1;
  transform:translateX(0);
}

.page.back {
  transform:translateX(-30%);
  opacity:0;
}

/* HOME UI */
.profile-box{text-align:center;margin-top:10px;}
.profile-box img{width:110px;height:110px;border-radius:50%;object-fit:cover;border:3px solid #fff;}

.grid-menu{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(140px,1fr));
  gap:14px; margin-top:25px;
}
.menu-btn{
  background:#fff;padding:18px;border-radius:16px;text-align:center;
  box-shadow:0 4px 14px rgba(0,0,0,0.10);
  font-weight:600;cursor:pointer;transition:.25s;
}
.menu-btn:hover{transform:scale(1.05);}
.menu-btn i{font-size:32px;margin-bottom:6px;display:block;}

.back-btn{background:none;border:none;font-size:20px;font-weight:700;cursor:pointer;margin-bottom:12px;}

/* Attendance Styling */
.att-card{background:#fff;border-radius:14px;padding:14px;margin-bottom:14px;
  box-shadow:0 3px 10px rgba(0,0,0,0.08);}

.att-status-box{
  display:flex;justify-content:space-between;
  background:#fff;padding:14px;border-radius:12px;
  box-shadow:0 2px 10px rgba(0,0,0,0.05);
  font-size:14px;margin-bottom:14px;
}

.att-table-wrapper{overflow-x:auto;width:100%;}
.att-table{min-width:600px;background:#fff;}
.att-col{text-align:center;}

.sub-card{
  background:#fff;padding:14px;border-radius:14px;
  box-shadow:0 2px 10px rgba(0,0,0,0.06);
  margin-bottom:12px;
}

/* Mess Menu */
.tab-buttons{display:flex;overflow-x:auto;gap:10px;margin-top:12px;}
.tab-btn{padding:10px 16px;background:#e5e7eb;border:none;border-radius:10px;
  font-weight:600;white-space:nowrap;}
.tab-btn.active{background:#000;color:#fff;}
.menu-box{
  background:#fff;margin-top:16px;padding:16px;border-radius:14px;
  box-shadow:0 3px 10px rgba(0,0,0,0.08);
}

*{box-sizing:border-box;}
</style>
</head>

<body>

<div class="header">📱 Student Dashboard</div>

<!-- ============================== HOME PAGE ============================== -->
<section id="home" class="page active">
  <div class="profile-box">
    <img src="your_profile_small.jpg">
    <h3 class="fw-bold mt-2">VALLURI SRI KRISHNA VARDAN</h3>
    <p>Roll No: 2403031260215 | CSE(4CYBER3) Batch-2</p>
  </div>

  <div class="grid-menu">
    <div class="menu-btn" onclick="openPage('student')"><i class="fa-solid fa-address-card"></i>Student Info</div>
    <div class="menu-btn" onclick="openPage('hostel')"><i class="fa-solid fa-building-columns"></i>Hostel</div>
    <div class="menu-btn" onclick="openPage('attendance')"><i class="fa-solid fa-calendar-check"></i>Attendance</div>
    <div class="menu-btn" onclick="openPage('results')"><i class="fa-solid fa-chart-line"></i>Results</div>
    <div class="menu-btn" onclick="openPage('fees')"><i class="fa-solid fa-receipt"></i>Fees</div>
  </div>
</section>


<!-- ============================== ATTENDANCE ============================== -->
<section id="attendance" class="page">
  <button class="back-btn" onclick="openPage('home',true)"><i class="bi bi-arrow-left"></i> Back</button>
  <h3>Attendance</h3>

  <div style="background:#000;color:#fff;padding:12px;border-radius:10px;text-align:center;font-weight:600;font-size:14px;margin-bottom:12px;">
    ⏳ Attendance updates daily at 3:00 AM • Weekly summary below
  </div>

<?php
$attendance=[
"2025-12-04"=>["P","P","P","P","P"],
"2025-12-02"=>["P","P","P","P","P"],
"2025-12-01"=>["P","P","P","P","-"],
"2025-11-28"=>["P","P","P","A","-"],
"2025-11-27"=>["P","P","P","P","P"]
];

$totalPresent=0; $totalSlots=0; $maxSlots=5;
foreach ($attendance as $date=>$slots){
  foreach ($slots as $s){
    if ($s=="P") $totalPresent++;
    if ($s=="P"||$s=="A") $totalSlots++;
  }
}
$percent=$totalSlots>0 ? round(($totalPresent/$totalSlots)*100,2) : 0;
?>

<div class="att-card">
  <div class="fw-bold">Sem 4</div>
  <div style="font-size:14px;color:#666;">A.Y 2025–26</div>
  <div style="margin-top:10px;width:100%;height:8px;background:#e1e1e1;border-radius:10px;">
    <div style="height:8px;width:<?= $percent ?>%;background:#20bf6b;border-radius:10px;"></div>
  </div>
  <div class="fw-bold mt-2" style="text-align:right;color:#20bf6b;"><?= $percent ?>%</div>
</div>

<div class="att-status-box">
  <div>Present <b><?= $totalPresent ?>/<?= $totalSlots ?></b></div>
  <div>Absent <b><?= $totalSlots-$totalPresent ?></b></div>
  <div>Pending <b>0</b></div>
  <div>No Data <b>0</b></div>
</div>

<div class="att-table-wrapper">
  <div class="att-table">
    <div class="att-header d-flex fw-bold bg-light">
      <div class="att-col">Date</div>
      <?php for($i=1;$i<=$maxSlots;$i++):?>
      <div class="att-col">Slot <?=$i?></div>
      <?php endfor;?>
    </div>

    <?php foreach($attendance as $date=>$slots):?>
    <div class="att-row d-flex" style="padding:10px;border-bottom:1px solid #eee;">
      <div class="att-col"><?= date("d-M-y",strtotime($date))?></div>
      <?php for($i=0;$i<$maxSlots;$i++):?>
      <div class="att-col"><?= isset($slots[$i]) ? $slots[$i] : "-" ?></div>
      <?php endfor;?>
    </div>
    <?php endforeach;?>
  </div>
</div>

<h4 class="fw-bold mt-3">Subject Wise Attendance</h4>

<?php
$subjects=[
"Operating Systems"=>["present"=>05,"total"=>05],
"Operating Systems Lab"=>["present"=>02,"total"=>02],
"Python"=>["present"=>04,"total"=>04],
"Python Lab"=>["present"=>02,"total"=>02],
"Networking"=>["present"=>04,"total"=>04],
"Networking Lab"=>["present"=>02,"total"=>02],
"Software Engineering"=>["present"=>05,"total"=>05],
"Software Engineering Lab"=>["present"=>02,"total"=>02],
"Cryptography"=>["present"=>04,"total"=>04],
"PGPD"=>["present"=>01,"total"=>0]
];

foreach($subjects as $name=>$data):
$present=$data["present"]; $total=$data["total"]; $abs=$total-$present;
?>

<div class="sub-card">
  <div class="fw-bold"><?= $name ?></div>
  <div>Present: <b><?= $present ?></b> / <?= $total ?> | Absent: <b><?= $abs ?></b></div>
</div>

<?php endforeach; ?>
</section>


<!-- ============================== STUDENT INFO ============================== -->
<section id="student" class="page">
  <button class="back-btn" onclick="openPage('home',true)"><i class="bi bi-arrow-left"></i> Back</button>
  <h3>Student Information</h3>

  <div class="card text-center p-3 mt-2 mb-3">
    <img src="your_profile_medium.jpg" style="width:160px;height:160px;object-fit:cover;border-radius:14px;border:3px solid #d1d1d1;">
    <h5 class="fw-bold mt-3 mb-1">VALLURI SRI KRISHNA VARDAN</h5>
    <div class="text-muted">Roll No: 2403031260215 | CSE(4CYBER3)</div>
  </div>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:14px;">
    <div class="card p-3"><div class="text-muted">DOB</div><div class="fw-bold mt-1">28-11-2006</div></div>
    <div class="card p-3"><div class="text-muted">Phone</div><div class="fw-bold mt-1">6281048554</div></div>
    <div class="card p-3"><div class="text-muted">College Email</div><div class="fw-bold mt-1">2403031260215@paruluniversity.ac.in</div></div>
    <div class="card p-3"><div class="text-muted">Personal Email</div><div class="fw-bold mt-1">krishnavardhan124@gmail.com</div></div>
  </div>

  <div class="card p-3 mt-3">
    <h5 class="fw-bold">Parents / Guardian</h5>
    <p><b>Father:</b> VALLURI VENKATA KRISHNANANDA CHOWDARY | 9951996671</p>
    <p><b>Mother:</b> VALLURI VISALAKSHI | 6301244329</p>
  </div>
</section>


<!-- ============================== HOSTEL ============================== -->
<section id="hostel" class="page">
  <button class="back-btn" onclick="openPage('home',true)"><i class="bi bi-arrow-left"></i> Back</button>
  <h3>Hostel</h3>

  <div class="card p-3 mt-2">
    <h5 class="fw-bold">Hostel Details</h5>
    <p><b>Reg No:</b> 42043</p>
    <p><b>Block:</b> TAGORE BHAWAN - C (Non AC)</p>
    <p><b>Room:</b> Floor 3 | Room C-361 | Bed 3</p>
    <p><b>Duration:</b> 01-07-2025 → 30-06-2026</p>
    <p><b>City:</b> EAST GODAVARI</p>
    <p><b>Address:</b> HOUSE NO-1-18 MAIN ROAD, NELAPARTHIPADU, DRAKSHARAMAM</p>
  </div>

  <div class="card mt-3 p-3">
    <h5 class="fw-bold">Recent Gate Passes</h5>
    <table class="table table-bordered text-center mt-2">
      <thead class="fw-bold bg-light">
        <tr><th>Sr</th><th>Reason</th><th>Place</th><th>From</th><th>To</th><th>Status</th></tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>Holiday</td><td>HOME</td><td>17-10-2025</td><td>02-11-2025</td><td><span class="badge bg-success">Approved</span></td></tr>
        <tr><td>2</td><td>Personal</td><td>PAVGADH</td><td>19-07-2025</td><td>19-07-2025</td><td><span class="badge bg-success">Approved</span></td></tr>
      </tbody>
    </table>
    <p class="text-center" style="font-size:13px;color:#555;">ONLY RECENT GATE PASSES WILL BE SHOWN.</p>
  </div>

  <!-- Mess Menu -->
  <h4 class="fw-bold mt-4">Mess Menu</h4>

  <div class="tab-buttons">
    <button class="tab-btn active" onclick="openMenu('mon')">Mon</button>
    <button class="tab-btn" onclick="openMenu('tue')">Tue</button>
    <button class="tab-btn" onclick="openMenu('wed')">Wed</button>
    <button class="tab-btn" onclick="openMenu('thu')">Thu</button>
    <button class="tab-btn" onclick="openMenu('fri')">Fri</button>
    <button class="tab-btn" onclick="openMenu('sat')">Sat</button>
    <button class="tab-btn" onclick="openMenu('sun')">Sun</button>
  </div>

  <div id="mon" class="menu-box">
    <div><b>Breakfast:</b> Veg Upma & Chutney | Tea/Coffee</div>
    <div><b>Lunch:</b> Dudhi Sabji, Dal, Rice, Papad</div>
    <div><b>Dinner:</b> Dum Aloo, Rice, Roti</div>
  </div>

  <div id="tue" class="menu-box" style="display:none;">
    <div><b>Breakfast:</b> Idly & Peanut Chutney | Tea/Coffee</div>
    <div><b>Lunch:</b> Palak Dal, Rice</div>
    <div><b>Dinner:</b> Beetroot Dal Curry, Rice</div>
  </div>

  <div id="wed" class="menu-box" style="display:none;">
    <div><b>Breakfast:</b> Imli Rice | Tea/Coffee</div>
    <div><b>Lunch:</b> Jeera Aloo, Tomato Dal</div>
    <div><b>Dinner:</b> Brinjal Curry, Rice</div>
  </div>

  <div id="thu" class="menu-box" style="display:none;">
    <div><b>Breakfast:</b> Onion Pakoda | Tea/Coffee</div>
    <div><b>Lunch:</b> Cabbage Matar, Dal</div>
    <div><b>Dinner:</b> Veg Biryani + Raita</div>
  </div>

  <div id="fri" class="menu-box" style="display:none;">
    <div><b>Breakfast:</b> Veg Pasta | Tea/Coffee</div>
    <div><b>Lunch:</b> Drumstick Dal</div>
    <div><b>Dinner:</b> Tomato Curry, Roti</div>
  </div>

  <div id="sat" class="menu-box" style="display:none;">
    <div><b>Breakfast:</b> Semia Upma | Tea/Coffee</div>
    <div><b>Lunch:</b> Aloo Palak, Dal</div>
    <div><b>Dinner:</b> Dry Cauliflower</div>
  </div>

  <div id="sun" class="menu-box" style="display:none;">
    <div><b>Breakfast:</b> Bread Jam</div>
    <div><b>Lunch:</b> Chole, Puri, Jeera Rice, Sweet</div>
    <div><b>Dinner:</b> Sambar Rice</div>
  </div>

</section>



<!-- ============================== RESULTS ============================== -->
<section id="results" class="page">
  <button class="back-btn" onclick="openPage('home')"><i class="bi bi-arrow-left"></i> Back</button>
  <h3>Results</h3>

  <div class="card p-3 mt-2">
    <h4 class="fw-bold">Semester - 2 Result</h4>

    <div class="table-responsive mt-2">
      <table class="table table-bordered text-center">
        <thead style="background:#f8fafc;font-weight:700;">
          <tr><th>Sr</th><th>Code</th><th>Subject</th><th>Credit</th><th>Result</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>303105151</td><td>Computational Thinking-2</td><td>4.00</td><td><span class="badge bg-success">B</span></td></tr>
          <tr><td>2</td><td>303105153</td><td>Cloud Certifications</td><td>2.00</td><td><span class="badge bg-success">A+</span></td></tr>
          <tr><td>3</td><td>303105154</td><td>Kali Linux & OSINT</td><td>3.00</td><td><span class="badge bg-success">B</span></td></tr>
          <tr><td>4</td><td>303107152</td><td>ICT Workshop</td><td>1.00</td><td><span class="badge bg-success">B+</span></td></tr>
          <tr><td>5</td><td>303191151</td><td>Mathematics-II</td><td>4.00</td><td><span class="badge bg-success">B</span></td></tr>
          <tr><td>6</td><td>303191202</td><td>Engineering Physics-II</td><td>4.00</td><td><span class="badge bg-success">B+</span></td></tr>
          <tr><td>7</td><td>303193152</td><td>Communication Skills</td><td>2.00</td><td><span class="badge bg-success">A</span></td></tr>
        </tbody>
      </table>
    </div>

    <div class="alert alert-danger fw-bold mt-2 text-center">
      ❗ PROMOTED TO 3rd SEM (0 BACKLOGS)
    </div>

    <div class="card p-3 mt-2">
      <div class="d-flex justify-content-between"><span>Seat No:</span><b>AF23604</b></div>
      <div class="d-flex justify-content-between"><span>Name:</span><b>VALLURI SRI KRISHNA VARDAN</b></div>
      <div class="d-flex justify-content-between"><span>SGPA:</span><b>6.75</b></div>
      <div class="d-flex justify-content-between"><span>CGPA:</span><b>6.92</b></div>
    </div>
  </div>
</section>



<!-- ============================== FEES PAGE ============================== -->
<section id="fees" class="page">
  <button class="back-btn" onclick="openPage('home')"><i class="bi bi-arrow-left"></i> Back</button>
  <h3>Fee Status</h3>

  <div class="card p-3 mt-2">
    <h5 class="fw-bold">Fee Details</h5>

    <div class="table-responsive mt-2">
      <table class="table table-bordered text-center">
        <thead style="background:#f8fafc;font-weight:700;">
          <tr><th>Sr</th><th>Semester</th><th>Fees</th><th>Paid</th><th>Balance</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>1</td><td>1,75,000</td><td>1,75,000</td><td>0</td></tr>
          <tr><td>2</td><td>2</td><td>1,75,000</td><td>1,75,000</td><td>0</td></tr>
          <tr style="font-weight:700;background:#f0f0f0;"><td colspan="2">Total</td><td>3,50,000</td><td>3,50,000</td><td>0</td></tr>
        </tbody>
      </table>
    </div>

    <h5 class="fw-bold mt-4">Hostel Fee</h5>
    <div class="table-responsive mt-2">
      <table class="table table-bordered text-center">
        <thead style="background:#f8fafc;font-weight:700;">
          <tr><th>Hostel</th><th>Year</th><th>Amount</th><th>Paid</th><th>Balance</th></tr>
        </thead>
        <tbody>
          <tr><td>TAGORE BHAWAN - A</td><td>2024-25</td><td>1,19,500</td><td>1,19,500</td><td>0</td></tr>
          <tr><td>TAGORE BHAWAN - C</td><td>2025-26</td><td>1,24,000</td><td>1,24,000</td><td>0</td></tr>
        </tbody>
      </table>
    </div>

  </div>
</section>



<!-- ============================== SCRIPT ============================== -->
<script>
function openPage(id, back=false){
  document.querySelectorAll(".page").forEach(p=>p.classList.remove("active"));
  const pg=document.getElementById(id);
  pg.classList.add("active");
  pg.classList.toggle("back", back);
  window.scrollTo(0,0);
}

function openMenu(id){
  document.querySelectorAll(".menu-box").forEach(b=>b.style.display="none");
  document.getElementById(id).style.display="block";

  document.querySelectorAll(".tab-btn").forEach(btn=>btn.classList.remove("active"));
  event.target.classList.add("active");
}
</script>

</body>
</html>
