<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 5</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $text = "";
    if(isset($_REQUEST["dist"])){
      if(is_numeric($_REQUEST["dist"]) == FALSE){
        $text = "Please enter a numeric distance.";
      }else{
        if(isset($_REQUEST["miles"])){
          $text = "".$_REQUEST["dist"]." kilometers is ".toMiles($_REQUEST["dist"])." miles.";
        }elseif(isset($_REQUEST['kilos'])){
          $text = "".$_REQUEST["dist"]." miles is ".toKilometers($_REQUEST["dist"])." kilometers.";
        }else{
          $text = "Coversion incorrectly submitted.";
        }
      }
    }
    function toMiles($kilos){
      return number_format($kilos/1.60934, 2);
    }
    function toKilometers($miles){
      return number_format($miles*1.60934, 2);
    }
  ?>
  <body>
    <h1>Distance Conversion</h1><br>
    <h2>Dakota Larson</h2><br>
    <?php if($text == ""): ?>
      <a class="back" href="./">Go Back</a><a class="source" href="source.php?page=distance">View Source</a><br>
      <form class="form" method="get">
        <input type="text" name="dist" placeholder="Distance" autocomplete="off" autofocus="on"><br>
        <h2 id=forminfo>Convert to:</h2>
        <input type="submit" name="kilos" value="Kilometers">
        <input type="submit" name="miles" value="Miles">
      </form>
    <?php else: ?>
      <a class="back" href="distance.php">Go Back</a><br>
      <span id="class"><?php echo $text;?></span>
    <?php endif; ?>
  </body>
</html>
