<?php
session_start();
$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";

function isActive($page) {
    return basename($_SERVER["PHP_SELF"]) == $page ? "active" : "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : "Default" ?></title>
    
    <meta property="og:title" content="<?= isset($page_title) ? $page_title : 'News Portal'; ?>" />
    <meta property="og:description" content="<?= isset($page_description) ? $page_description : 'Default description for the page.'; ?>" />
    <meta property="og:url" content="<?= isset($page_url) ? $page_url : $base_url . basename($_SERVER['PHP_SELF']); ?>" />
    <meta property="og:type" content="website" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>styles/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
        if (isset($page_styles)) {
            foreach ($page_styles as $style) {
                echo '<link rel="stylesheet" type="text/css" href="' . $base_url . 'styles/' . $style . '">' . "\n";
            }
        }
    ?>
    
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67d6417b86189a0019fafc7a&product=sop" async></script>
</head>
<body>

<div id="top-nav-bar">
    <div id="nav-title">
        <h2>News Portal</h2>
    </div>
    <nav id="main-nav-bar">
        <a href="<?php echo $base_url; ?>index.php" class="<?php echo isActive('index.php'); ?>">Dashboard</a>
        <a href="<?php echo $base_url; ?>src/Generate/generate_page.php" class="<?php echo isActive('generate_page.php'); ?>">Generate</a>
        <a href="<?php echo $base_url; ?>index.php" class="<?php echo isActive('about_us.php'); ?>">About Us</a>
        <a href="<?php echo $base_url; ?>index.php" class="<?php echo isActive('faq.php'); ?>">FAQ</a>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Logged in: show welcome message and logout button -->
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="<?php echo $base_url; ?>src/Login/logout.php" class="nav-btn">Log Out</a>
            </div>
        <?php else: ?>
            <!-- Not logged in: display two-line login form -->
            <div class="login-form">
                <form action="<?php echo $base_url; ?>src/Login/process_login.php" method="post">
                    <div>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
            <!-- Registration link remains unchanged -->
            <a href="<?php echo $base_url; ?>src/Register/register_pageNew.php" class="nav-btn">Register</a>
        <?php endif; ?>
    </nav>
</div>
