<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 5</title>
    <link rel="stylesheet" href="./css/master.css">
    <style media="screen">
      body{
        background: slategray;
      }
    </style>
  </head>

  <body>
    <h1>Assignment Source</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="<?php echo $_REQUEST['page'].".php";?>">Go Back</a><br>
    <?php
      if(isset($_REQUEST['page'])){
        highlight_file($_REQUEST['page'].".php");
      }
    ?>
  </body>
</html>
