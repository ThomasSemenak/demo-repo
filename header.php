<?php
// header.php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div style="width: 100%; background-color: #f1f1f1; padding: 10px; text-align: right;">
    <span>Welcome, <?php echo htmlspecialchars($_SESSION['UserName']); ?>!</span>
    <a href="logout.php" style="margin-left: 15px; text-decoration: none; font-weight: bold;">Sign Out</a>
</div>
