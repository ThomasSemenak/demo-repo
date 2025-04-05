<?php
// header.php
$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";
function isActive($page) {
    return basename($_SERVER["PHP_SELF"]) == $page ? "active" : "";
}
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : "Default"?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>styles/main.css">
    <!-- Add additional CSS links or meta tags as needed -->
</head>
<body>
<div style="width: 100%; background-color: #f1f1f1; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
    <!-- Navigation Menu -->
    <div>
        <a href="<?php echo $base_url;?>welcome.php" class="<?php echo isActive('welcome.php'); ?>" style="margin-right: 15px; text-decoration: none;">Dashboard</a>
        <a href="<?php echo $base_url;?>generate.php" class="<?php echo isActive('generate.php'); ?>" style="margin-right: 15px; text-decoration: none;">Generate</a>
        <a href="<?php echo $base_url;?>aboutus.php" class="<?php echo isActive('aboutus.php'); ?>" style="margin-right: 15px; text-decoration: none;">About Us</a>
        <a href="<?php echo $base_url;?>faq.php" class="<?php echo isActive('faq.php'); ?>" style="text-decoration: none;">FAQ</a>
    </div>
    <!-- User Welcome and Sign Out -->
    <div>
        <span>Welcome, <?php echo htmlspecialchars($_SESSION['UserName']); ?>!</span>
        <a href="<?php echo $base_url;?>logout.php" style="margin-left: 15px; text-decoration: none; font-weight: bold;">Sign Out</a>
    </div>
</div>
