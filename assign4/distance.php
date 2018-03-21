<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Distance Conversion</title>
    <link rel="stylesheet" href="./css/master.css">
    <script type="text/javascript" src="../cssrefresh.js"></script>
  </head>
  <?php
    function toMeters($yards){
      return number_format($yards*0.9144, 2);
    }
    function toYards($meters){
      return number_format($meters/0.9144, 2);
    }
    $answer = "";
    if(isset($_REQUEST['distance']) && is_numeric($_REQUEST['distance'])){
      if(isset($_REQUEST['submit'])){
        if($_REQUEST['submit'] == "yards"){
          $answer = "The converted distance is: ". toYards($_REQUEST['distance']). " yards.";
        }elseif($_REQUEST['submit'] == "meters"){
          $answer = "The converted distance is: ". toMeters($_REQUEST['distance']). " meters.";
        }else{
          $answer = "The distance type specified is not recognized.";
        }
      }else{
        $answer = "Form not submitted correctly.";
      }
    }else{
      $answer = "Distance is not specified correctly.";
    }
  ?>
  <body>
    <h1>Distance Conversion</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="distance.html">Go Back</a><br>
    <span class="info"><?php echo $answer; ?></span>
  </body>
</html>
<?php echo "<HR>";
   highlight_file("distance.php"); ?>
