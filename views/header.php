<?php
session_start();
$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";

// Debug: view session data (remove for production)
echo "<!-- Session Data: " . print_r($_SESSION, true) . " -->";

function isActive($page) {
    return basename($_SERVER["PHP_SELF"]) == $page ? "active" : "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- head content remains the same -->
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
            <!-- When logged in, show welcome message and logout -->
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="<?php echo $base_url; ?>src/Login/logout.php" class="nav-btn">Log Out</a>
            </div>
        <?php else: ?>
            <!-- When not logged in, display two-line login form -->
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
