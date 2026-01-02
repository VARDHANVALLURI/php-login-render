<?php
ob_start();
include __DIR__ . "/includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Fees</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<!-- ================= ERP TOP BAR (ALWAYS FIRST) ================= -->
<div class="erp-topbar">
  <a href="dashboard.php" class="erp-back">
    <i class="bi bi-arrow-left"></i>
  </a>
  <div class="erp-title">Fees</div>
</div>

<!-- ================= PAGE ================= -->
<div class="fees-page">

  <!-- ================= LEDGER SUMMARY ================= -->
  <div class="ledger-card">
    <div class="ledger-title">Student Ledger</div>

    <div class="ledger-grid">

      <div class="ledger-item">
        <div class="ledger-label ledger-teal">To Be Collected</div>
        <div class="ledger-amount ledger-teal">₹ 5,95,500</div>
      </div>

      <div class="ledger-item">
        <div class="ledger-label ledger-green">Paid</div>
        <div class="ledger-amount ledger-green">₹ 5,95,500</div>
      </div>

      <div class="ledger-item">
        <div class="ledger-label ledger-yellow">Previous Fee</div>
        <div class="ledger-amount ledger-yellow">₹ 0</div>
      </div>

      <div class="ledger-item">
        <div class="ledger-label ledger-red">Pending</div>
        <div class="ledger-amount ledger-red">₹ 0</div>
      </div>

    </div>
  </div>

  <!-- ================= CONTENT (ONLY THIS SCROLLS) ================= -->
  <div class="fees-content">

    <!-- ===== SEMESTER FEES ===== -->
    <div class="fees-card">
      <div class="fees-title">Fee Details</div>

      <div class="fee-block">
        <div class="fee-block-title">Semester 1</div>
        <div class="fee-row">
          <div class="fee-label">Fees</div>
          <div class="fee-value">₹ 1,75,000</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Paid</div>
          <div class="fee-value">₹ 1,75,000</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Balance</div>
          <div class="fee-value">₹ 0</div>
        </div>
      </div>

      <div class="fee-block">
        <div class="fee-block-title">Semester 2</div>
        <div class="fee-row">
          <div class="fee-label">Fees</div>
          <div class="fee-value">₹ 1,75,000</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Paid</div>
          <div class="fee-value">₹ 1,75,000</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Balance</div>
          <div class="fee-value">₹ 0</div>
        </div>
      </div>

      <div class="fee-total">
        Total Paid: ₹ 3,50,000<br>
        Balance: ₹ 0
      </div>
    </div>

    <!-- ===== HOSTEL FEES ===== -->
    <div class="fees-card">
      <div class="fees-title">Hostel Fee</div>

      <div class="fee-block">
        <div class="fee-block-title">TAGORE BHAWAN - A (2024–25)</div>
        <div class="fee-row">
          <div class="fee-label">Amount</div>
          <div class="fee-value">₹ 1,19,500</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Paid</div>
          <div class="fee-value">₹ 1,19,500</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Balance</div>
          <div class="fee-value">₹ 0</div>
        </div>
      </div>

      <div class="fee-block">
        <div class="fee-block-title">TAGORE BHAWAN - C (2025–26)</div>
        <div class="fee-row">
          <div class="fee-label">Amount</div>
          <div class="fee-value">₹ 1,24,000</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Paid</div>
          <div class="fee-value">₹ 1,24,000</div>
        </div>
        <div class="fee-row">
          <div class="fee-label">Balance</div>
          <div class="fee-value">₹ 0</div>
        </div>
      </div>

    </div>

  </div>
</div>

</body>
</html>
