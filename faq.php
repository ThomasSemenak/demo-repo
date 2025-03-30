<?php
// faq.php
$title = "Frequently Asked Questions";
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
    <section class="faq">
      <article class="faq-item">
        <h2>What is this website about?</h2>
        <p>This website is designed to provide helpful resources and information on various topics. We update our content regularly to ensure it remains accurate and useful.</p>
      </article>
      <article class="faq-item">
        <h2>How can I contact support?</h2>
        <p>You can contact our support team by emailing <a href="mailto:support@example.com">support@example.com</a> or using the contact form on our website.</p>
      </article>
      <!-- Add more FAQ items as needed -->
    </section>
  </main>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> Example Company. All rights reserved.</p>
  </footer>
</body>
</html>
