<div class="app-header">
    <div class="back-container" onclick="goDashboard()">
        <span class="back-icon">&#x2190;</span>
    </div>

    <div class="app-title">
        <?php echo $pageTitle ?? 'Dashboard'; ?>
    </div>
</div>

<script>
function goDashboard() {
    window.location.href = "/student/dashboard.php";
}
</script>
