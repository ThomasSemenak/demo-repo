<?php 
// about.php

include "./views/header.php";
?>
<!-- Hero Section -->
<div class="hero" style="background: url('assets/images/hero_about.jpg') no-repeat center center; background-size: cover; height: 300px; position: relative; color: #fff;">
  <div class="hero-overlay" style="background: rgba(0,0,0,0.6); position: absolute; top:0; left:0; width:100%; height:100%;"></div>
  <div class="hero-content" style="position: relative; z-index: 2; padding: 100px 20px; text-align: center;">
    <h1>About SmartSummaries</h1>
    <p>Transforming complex web content into engaging social media posts</p>
  </div>
</div>

<!-- Main About Content -->
<div class="container section" style="padding: 60px 0;">
  <h2 class="text-center mb-4">Our Mission</h2>
  <p class="lead text-center">
    At SmartSummaries, our mission is to empower you to quickly discover and share the most relevant content from the web. 
    We bridge the gap between detailed online articles and the short, engaging posts you love on social media.
  </p>

  <h3 class="mt-5">What We Do</h3>
  <p>
    SmartSummaries works by taking your search keyword and gathering links from various reputable sources across the web. 
    Our advanced summarization algorithms analyze each link and extract the key points into concise, reader-friendly posts.
    Whether you need a quick digest for Facebook or a punchy snippet for Twitter, our tool is designed to help you save time and share smarter.
  </p>

  <h3 class="mt-5">Our Vision & Story</h3>
  <p>
    Founded by innovators passionate about digital communication, SmartSummaries was built on the belief that valuable content should be accessible 
    and easily shareable. We envisioned a future where the overwhelming abundance of online information is transformed into digestible, quality summaries 
    that help our users stay informed and connected.
  </p>
  <p>
    From our humble beginnings as a small project to a fully realized platform, we continue to refine our technology to ensure that every summary not only 
    informs but also inspires conversation and engagement across social media channels.
  </p>

  <h3 class="mt-5">Our Team</h3>
  <p>
    Our dedicated team of developers, content strategists, and digital marketers work tirelessly to deliver a seamless experience that turns raw web data 
    into artfully crafted posts. With expertise spanning machine learning, natural language processing, and UX design, our team is committed to excellence 
    and continuous innovation.
  </p>
</div>

<!-- Footer -->
<footer class="bg-light text-center p-4">
  <p>&copy; <?php echo date("Y"); ?> SmartSummaries. All Rights Reserved.</p>
</footer>

</body>
</html>
