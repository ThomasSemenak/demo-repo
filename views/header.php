<?php
if (!isset($_SESSION)) {
     session_start();
 }
//$base_url = "http://localhost:8080/";
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
    <title><?= isset($page_title) ? $page_title : "Default"?></title>
    <meta property="og:title" content="SmartSummaries: AI-Powered Newsletter & Social Media Content Generator" />
    <meta property="og:description" content="Create engaging newsletters and social media posts effortlessly with AI-driven automation, summarization, and scheduling." />
    <meta property="og:url" content="<?= isset($page_url) ? $page_url : $base_url . basename($_SERVER['PHP_SELF']); ?>" />
    <meta name="twitter:title" content="AI-Powered Newsletter & Social Media Content Generator" />
    <meta name="twitter:description" content="Create engaging newsletters and social media posts effortlessly with AI-driven automation, summarization, and scheduling." />
    
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>styles/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
        if (isset($page_styles)) {
            foreach ($page_styles as $style) {
                echo '<link rel="stylesheet" type="text/css" href="' . $base_url . 'styles/' . $style . '">' . "\n";
            }
        }
    ?>
</head>
<body>

<div style="width: 100%; background-color: #f1f1f1; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
     <!-- Navigation Menu -->
     <div>
         <a href="welcome.php" style="margin-right: 15px; text-decoration: none;">Welcome</a>
         <a href="index.php" style="margin-right: 15px; text-decoration: none;">Dashboard</a>
         <a href="src/Generate/generate_page.php" style="margin-right: 15px; text-decoration: none;">Generate</a>
         <a href="about_us.php" style="margin-right: 15px; text-decoration: none;">About Us</a>
         <a href="faq.php" style="text-decoration: none;">FAQ</a>
     </div>
     <!-- User Welcome and Sign Out -->
     <div>
         <span>Welcome, <?php echo htmlspecialchars($_SESSION['UserName']); ?>!</span>
         <a href="logout.php" style="margin-left: 15px; text-decoration: none; font-weight: bold;">Sign Out</a>
     </div>
 </div>
