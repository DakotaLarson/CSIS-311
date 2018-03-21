<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 6</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php
    $text = "";
    $count = 0;
    $value = 0;
    $found = FALSE;
    if(isset($_REQUEST['button'])){
      if($_REQUEST['button'] == "restart"){
        $text = "";
        $count = 0;
        $value = rand(1, 1000);
      }elseif($_REQUEST['button'] == "guess"){
        $value = $_REQUEST['value'];
        $count = $_REQUEST['count'] + 1;
        $guess = $_REQUEST['guess'];
        $text = $_REQUEST['text'];
        if(is_numeric($guess) == FALSE){
          $text .= $guess . " is not an valid guess \n";
        }elseif($guess < $value){
          $text .= $guess . " is too low. \n";
        }elseif($guess > $value){
          $text .= $guess . " is too high. \n";
        }else{
          $text .= $guess . " is correct. \n";
          $found = TRUE;
          if($count == 1){
            $text .= "You made $count guess to find the number!";
          }else{
            $text .= "You made $count guesses to find the number!";
          }
        }
      }
    }else{
      $text = "";
      $count = 0;
      $value = rand(1, 1000);
    }
  ?>
  <body>
    <h1>Number Guessing</h1>
    <h2>Dakota Larson</h2>
    <a class="back" href="../">Go Back</a>
    <a class="restart" href="./source.php">View Source</a><br><br>
    <form class="form" method="post">
      <span class="formtext">Guess:</span>
      <input type="text" name="guess" autocomplete="off" autofocus="on"><br>
      <input type="hidden" name="value" value="<?php echo $value; ?>">
      <input type="hidden" name="count" value="<?php echo $count; ?>">
      <span class="formtext">Number of Guesses: <?php echo $count; ?></span><br>
      <button class="button submit" type="submit" name="button" value="guess" <?php if($found) echo "disabled"; ?>>Guess</button>
      <button class="button restart" type="submit" name="button" value="restart">Restart Game</button><br>
      <textarea class="textarea" name="text" readonly><?php echo $text; ?></textarea>
    </form>
  </body>
</html>
