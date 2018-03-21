<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 3</title>
    <link rel="stylesheet" href="./css/pizza.css">
  </head>
  <?php
    $error = "";
    if(isset($_GET['size']) == FALSE){
      $error .="Size not specified.<br>";
    }elseif($_GET['size'] !="small" && $_GET['size'] != "medium" && $_GET['size'] != "large"){
      $error .= "Size not recognized.<br>";
    }
    if(isset($_GET['trans']) == FALSE){
      $error .= "Transportation of pizza not specified.<br>";
    }elseif($_GET['trans'] != "pickup" && $_GET['trans'] != "delivery"){
      $error .= "Transportation of pizza not recognized.";
    }
    if($_GET['name'] == NULL){
      $error .= "Name not specified.<br>";
    }
    $address = $_GET['address'];
    if($_GET['address'] == NULL){
      $error .= "Address not specified.<br>";
    }
    $phone = $_GET['phone'];
    if($_GET['phone'] == NULL){
      $error .= "Phone number not specified.<br>";
    }
    if(isset($_GET['topping1']) == FALSE && isset($_GET['topping2']) == FALSE &&
     isset($_GET['topping3']) == FALSE && isset($_GET['topping4']) == FALSE &&
     isset($_GET['topping5']) == FALSE && isset($_GET['topping6']) == FALSE){
       $error .= "No toppings were specified.<br>";
     }
     $memo = "";
     if(isset($_GET['instructions']) || empty($_GET['instructions'])){
       $memo = "No instructions input";
     }else{
       $memo = $_GET['instructions'];
     }
     $message = "";
     if($error == ""){
       $message = "Pizza order successfully submitted.<br>Size: ".$_GET['size'].
       "<br>Transportation:".$_GET['trans']."<br>Name: ".$_GET['name']."<br>Address: ".$_GET['address'].
       "<br>Phone Number: ".$phone."<br>instructions: ".$memo;
     }

  ?>
  <body>
    <h1>Pizza Order</h1><br>
    <a href="./pizza.html">Go Back</a><br><br>
    <span class="finaltext"><?php echo $error; ?></span><br>
    <span class="finaltext"><?php echo $message; ?></span>
<?php echo "<HR>"; highlight_file("pizza.php"); ?>
  </body>
</html>
