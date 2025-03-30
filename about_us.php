<?php
// aboutus.php
$title = "About Us";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
  <header>
    <h1><?php echo $title; ?></h1>
    <!-- Optionally include navigation here -->
  </header>
  <main>
    <section class="about-us">
      <p>Welcome to our website! We are a dedicated team committed to providing high-quality resources and support to our users.</p>
      <p>Our mission is to help you find the information you need quickly and efficiently while ensuring a pleasant user experience.</p>
      <p>If you have any questions or suggestions, please feel free to <a href="mailto:info@example.com">get in touch</a>.</p>
    </section>
  </main>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> Example Company. All rights reserved.</p>
  </footer>
</body>
</html>
