<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Volume Conversion</title>
    <link rel="stylesheet" href="./css/master.css">
    <script type="text/javascript" src="../cssrefresh.js"></script>
  </head>
  <?php
    function toLiters($gallons){
      return number_format($gallons*3.78541, 2);
    }
    function toGallons($liters){
      return number_format($liters/3.78541, 2);
    }
    $answer = "";
    if(isset($_REQUEST['volume']) && is_numeric($_REQUEST['volume'])){
      if(isset($_REQUEST['submit'])){
        if($_REQUEST['submit'] == "gallons"){
          $answer = "The converted distance is: ". toGallons($_REQUEST['volume']). " gallons.";
        }elseif($_REQUEST['submit'] == "liters"){
          $answer = "The converted distance is: ". toLiters($_REQUEST['volume']). " liters.";
        }else{
          $answer = "The volume type specified is not recognized.";
        }
      }else{
        $answer = "Form not submitted correctly.";
      }
    }else{
      $answer = "Volume is not specified correctly.";
    }
  ?>
  <body>
    <h1>Volume Conversion</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="volume.html">Go Back</a><br>
    <span class="info"><?php echo $answer; ?></span>
  </body>
</html>
<?php echo "<HR>";
   highlight_file("volume.php"); ?>
