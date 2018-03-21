<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Airport Parking</title>
    <link rel="stylesheet" href="./css/airport.css">
  </head>
  <?php
    $cost = 0;
    $changed = FALSE;
    $longCustomers = $shortCustomers = $longRev = $shortRev = 0;
    if(!empty($_REQUEST['shortCus'])) $shortCustomers = $_REQUEST['shortCus'];
    if(!empty($_REQUEST['longCus'])) $longCustomers = $_REQUEST['longCus'];
    if(!empty($_REQUEST['shortCost'])) $shortRev = $_REQUEST['shortCost'];
    if(!empty($_REQUEST['longCost'])) $longRev = $_REQUEST['longCost'];

    if(!empty($_REQUEST['x'])){
      if($_REQUEST['x'] == "long"){
        $time = $_REQUEST['long'];
        $cost = getLongTerm($time);
        $longRev += $cost;
        $longCustomers ++;
        $changed = TRUE;
      }else{
        $time = $_REQUEST['short'];
        $cost = getShortTerm($time);
        $shortRev += $cost;
        $shortCustomers ++;
        $changed = TRUE;
      }
    }
    function getShortTerm($minutes){
      $cost = 0;
      while ($minutes > 0) {
        $cost += 0.75;
        $minutes -= 15;
      }
      if($cost > 15) $cost = 15;
      return $cost;
    }
    function getLongTerm($days){
      $cost = 0;
      while ($days > 7) {
        $cost += 45;
        $days -= 7;
      }
      $dayCost = 0;
      while($days > 0){
        $dayCost += 8;
        $days -= 1;
      }
      if($dayCost > 45) $dayCost = 45;
      return $cost + $dayCost;
    }
  ?>
  <body>
    <h1>Airport Parking</h1>
    <form method="post">
      <span>New Customer</span><br>
      <span>Short Term:</span>
      <input type="text" name="short" placeholder="Minutes" autocomplete="off" autofocus><br>
      <span>Long Term:</span>
      <input type="text" name="long" placeholder="Days" autocomplete="off"><br>
      <input type="radio" name="x" value="short"><span>Short Term</span>
      <input type="radio" name="x" value="long"><span>Long Term </span>
      <input type="hidden" name="shortCus" value="<?php echo $shortCustomers; ?>">
      <input type="hidden" name="longCus" value="<?php echo $longCustomers; ?>">
      <input type="hidden" name="shortCost" value="<?php echo $shortRev; ?>">
      <input type="hidden" name="longCost" value="<?php echo $longRev; ?>"><br>
      <input type="submit" value="Submit">
    </form><br>
    <?php if($changed): ?>
      <span>Customer Cost: <?php echo $cost; ?></span><br><br>
    <?php endif; ?>
    <span>Long Term Customers: <?php echo $longCustomers; ?></span><br>
    <span> Long Term Revenue: <?php echo $longRev; ?></span><br>
    <span>Short Term Customers: <?php echo $shortCustomers; ?></span><br>
    <span> Short Term Revenue: <?php echo $shortRev; ?></span><br>
    <a href="">Restart Program</a><br>
    <a href="../">Back</a><br>
    <a href="./source.php?page=airport.php">Source</a><br>

  </body>
</html>
