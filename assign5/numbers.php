<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 5</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $count = $sum = $average = $largest = $smallest = 0;
    $error = "";
    if(isset($_REQUEST['count']) && is_numeric($_REQUEST['count'])) $count = $_REQUEST['count'];
    if(isset($_REQUEST['sum']) && is_numeric($_REQUEST['sum'])) $sum = $_REQUEST['sum'];
    if(isset($_REQUEST['average']) && is_numeric($_REQUEST['average'])) $average = $_REQUEST['average'];
    if(isset($_REQUEST['largest']) && is_numeric($_REQUEST['largest'])) $largest = $_REQUEST['largest'];
    if(isset($_REQUEST['smallest']) && is_numeric($_REQUEST['smallest'])) $smallest = $_REQUEST['smallest'];
    if(isset($_REQUEST['num']) && is_numeric($_REQUEST['num'])){
      $count += 1;
      $sum += $_REQUEST['num'];
      $average = number_format($sum / $count, 2);
      if($largest == 0) $largest = $_REQUEST['num'];
      else $largest = max($largest, $_REQUEST['num']);
      if($smallest == 0) $smallest = $_REQUEST['num'];
      else $smallest = min($smallest, $_REQUEST['num']);
    }else{
      if($count > 0){
        $error = "Enter a valid number.";
      }
    }
  ?>
  <body>
    <h1>Number Sequence</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="./">Go Back</a><a class="source" href="source.php?page=numbers">View Source</a><br>
    <form class="form" method="get">
      <input type="text" name="num" placeholder="Number" autocomplete="off" autofocus="on"><br>
      <input type="hidden" name="count" value="<?php echo $count; ?>">
      <input type="hidden" name="sum" value="<?php echo $sum; ?>">
      <input type="hidden" name="avg" value="<?php echo $average; ?>">
      <input type="hidden" name="largest" value="<?php echo $largest; ?>">
      <input type="hidden" name="smallest" value="<?php echo $smallest; ?>">

      <input type="submit" value="Enter">
      <a class="clear" href="./numbers.php">Restart</a>
    </form><br>
    <span class="text error"><?php echo $error; ?></span><br>
    <span class="text">Number of values: <?php echo $count; ?></span><br>
    <span class="text">Sum of values: <?php echo $sum; ?></span><br>
    <span class="text">Average of values: <?php echo $average; ?></span><br>
    <span class="text">Largest of values: <?php echo $largest; ?></span><br>
    <span class="text">Smallest of values: <?php echo $smallest; ?></span><br>
  </body>
</html>
