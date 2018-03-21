<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 9</title>
    <link rel="stylesheet" href="master.css">
    <script src="../cssrefresh.js" charset="utf-8"></script>
  </head>
  <?php
    $name = "";
    $text = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name = $_POST['name'];
      $count = $_POST['count'];
      $largest = $_POST['large'];
      $smallest = $_POST['small'];
      $btn = $_POST['btn'];
      if($btn == "Start" || $btn == "New Numbers"){
      $arr = genArray($smallest, $largest, $count);
      }elseif($btn == "Restart"){
        $name = "";
      }else{
        $arr = unserialize($_POST['arr']);
        if($btn == "Largest"){
          $text = "Largest Value: " . largest($arr);
        }elseif($btn == "Smallest"){
          $text = "Smallest Value: " . smallest($arr);
        }elseif($btn == "Sum"){
          $text = "Sum of Values: " . getSum($arr);
        }elseif($btn == "Average"){
          $text = "Average Value: " . getAvg($arr);
        }elseif($btn == "Median"){
          $text = "Median Value: " . getMedian($arr);
        }elseif($btn == "Range"){
          $text = "Range of Values: " . getRange($arr);
        }elseif($btn == "> Average"){
          $text = "# of Values > Average: " . countAboveAvg($arr);
        }elseif($btn == "< Average"){
          $text = "# of Values < Average: " . countBelowAvg($arr);
        }elseif($btn == "Sort Ascending"){
          sort($arr);
        }elseif($btn == "Sort Descending"){
          rsort($arr);
        }
      }
    }
    function genArray($small, $large, $count){
      $arr = array();
      for ($i=0; $i < $count; $i++) {
        $arr[$i] = rand($small, $large);
      }
      return $arr;
    }
    function largest($arr){
      if(empty($arr)) return "";
      $max = $arr[0];
      foreach ($arr as $x) {
        if($x > $max) $max = $x;
      }
      return $max;
    }
    function smallest($arr){
      if(empty($arr)) return "";
      $min = $arr[0];
      foreach ($arr as $x) {
        if($x < $min) $min = $x;
      }
      return $min;
    }
    function getSum($arr){
      $total = 0;
      foreach($arr as $x){
        $total += $x;
      }
      return $total;
    }
    function getAvg($arr){
      return getSum($arr)/count($arr);
    }
    function getRange($arr){
      return largest($arr) - smallest($arr);
    }
    function getMedian($arr){
      sort($arr);
      $count = count($arr);
      if($count % 2 == 0){
        return $arr[$count/2];
      }else{
        $val = floor($count/2);
        return ($arr[$val] + $arr[$val + 1])/2;
      }
      $val = (int) count($arr)/2;
      return $arr[$val];
    }
    function countAboveAvg($arr){
      $avg = getAvg($arr);
      $count = 0;
      foreach($arr as $x){
        if($x > $avg) $count ++;
      }
      return $count;
    }
    function countBelowAvg($arr){
      $avg = getAvg($arr);
      $count = 0;
      foreach($arr as $x){
        if($x < $avg) $count ++;
      }
      return $count;
    }
  ?>
  <body>
    <h1>Array Fun</h1>
    <a href="../">Back</a>
    <a href="source.php">Source</a>
    <?php if(empty($name)): ?>
    <form method="post">
      <span>Name:</span>
      <input type="text" name="name" autofocus autocomplete="off"><br>
      <span>Array Length:</span>
      <input type="text" name="count" value="" autocomplete="off"><br>
      <span>Smallest Value:</span>
      <input type="text" name="small" autocomplete="off"><br>
      <span>Largest Value:</span>
      <input type="text" name="large" autocomplete="off"><br>
      <input type="submit" name="btn" value="Start">
    </form>
  <?php else: ?>
    <h2><?php echo $name; ?>'s Array</h2>
    <h3><?php echo "$count numbers in the range from $smallest to $largest" ?></h3>
    <table>
      <tbody>
        <tr>
          <th>Index</th>
          <?php
            for ($i=0; $i < $count; $i++) {
              echo "<td class=\"index\">$i</td>";
            }
          ?>
        </tr>
        <tr>
          <th>Value</th>
          <?php
            for ($i=0; $i < $count; $i++) {
              echo "<td>$arr[$i]</td>";
            }
          ?>
        </tr>
      </tbody>
    </table>
    <form method="post">
      <input type="submit" name="btn" value="New Numbers">
      <input type="submit" name="btn" value="Largest">
      <input type="submit" name="btn" value="Smallest">
      <input type="submit" name="btn" value="Sum">
      <input type="submit" name="btn" value="Average">
      <input type="submit" name="btn" value="Median">
      <input type="submit" name="btn" value="Range"><br>
      <input type="submit" name="btn" value="> Average">
      <input type="submit" name="btn" value="< Average">
      <input type="submit" name="btn" value="Sort Ascending">
      <input type="submit" name="btn" value="Sort Descending">
      <input type="submit" name="btn" value="Restart">
      <input type="hidden" name="arr" value="<?php echo serialize($arr); ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="small" value="<?php echo $smallest; ?>">
      <input type="hidden" name="large" value="<?php echo $largest; ?>">
      <input type="hidden" name="count" value="<?php echo $count; ?>">
    </form>
    <h2><?php echo $text; ?></h2>
    <?php endif; ?>
  </body>
</html>
