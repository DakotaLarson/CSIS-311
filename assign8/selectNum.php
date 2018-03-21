<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 8</title>
    <link rel="stylesheet" href="./css/selectNum.css">
  </head>
  <body>
    <h1>Day of Week Calculator</h1>
    <?php
      $text = "";
      $show = FALSE;
      if(! empty($_REQUEST["month"])){
        $month = $_REQUEST['month'];
        $day = $_REQUEST['day'];
        $year = $_REQUEST['year'];
        $time = mktime(0, 0, 0, $month, $day, $year);
        $dow = date("l", $time);
        $show = TRUE;
        if(!checkdate($month, $day, $year)){
          $text = "That is not a valid date";
        }else{
          $text = date("F jS, Y", $time) . " is a $dow";
        }
      }
    ?>
    <?php if(!$show): ?>
      <form>
        <span>Month:</span>
        <select name="month">
          <?php
            $month = date("n");
            for ($i=1; $i < 13; $i++):?>
            <option value="<?php echo $i; ?>"<?php if($i == $month) echo "selected" ?>><?php echo $i; ?></option>
          <?php endfor; ?>
        </select><br>
        <span>Day:</span>
        <select name="day">
          <?php
            $day = date("j");
            for ($i=1; $i < 32; $i++):?>
            <option value="<?php echo $i; ?>"<?php if($i == $day) echo "selected" ?>><?php echo $i; ?></option>
          <?php endfor; ?>
        </select><br>
        <span>Year:</span>
        <select name="year">
          <?php
            $year = date("Y");
            for ($i=2100; $i > 1899; $i--):?>
            <option value="<?php echo $i; ?>"<?php if($i == $year) echo "selected" ?>><?php echo $i; ?></option>
          <?php endfor; ?>
        </select><br>
        <input type="submit" value="Enter">
      </form>
    <?php else: ?>
      <h3><?php echo $text; ?></h3>
      <a href="./selectNum.php">Next Date</a><br>
    <?php endif; ?>
    <a href="../">Return</a><br>
    <a href="./source.php?page=selectNum.php">Source</a>
  </body>
</html>
