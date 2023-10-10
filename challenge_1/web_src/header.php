<?php

session_start();
error_reporting(0);
$url = "http://localhost/";

?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <title>
    <?php echo $title; ?>VCS Academy
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $url; ?>css/reset.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/style.css">
  <script src="<?php echo $url; ?>js/jquery-3.1.0.min.js"></script>
  <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo $url; ?>js/style.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $url; ?>images/favicon.ico" />
</head>

<body>
  <div class="container">
    <!-- Header -->
    <header>
      <h2><a style="color: white" href="../index.php">
          <p>
            <?php echo $_SESSION["tensv"]; ?>
        </a></h2>

      <a href="index.php" title="VCS Academy">
      </a>
      <marquee behavior="scroll" direction="left" scrollamount="5"> <span
          style="font-weight:bold; color:white; text-shadow: 2px 2px 4px black; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.7)); font-size: 50px;">SOCで働く一日だけど、TIで働く一生だ。</span>
      </marquee>

    </header>
    <!-- End header -->
  </div>