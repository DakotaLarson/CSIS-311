<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 7</title>
    <link rel="stylesheet" href="./css/master.css">
    <script src="../cssrefresh.js" charset="utf-8"></script>
  </head>
  <?php
    $problems = 0;
    $correct = 0;
    $answer = "";
    $name = "";
    $state = 0;
    if(!empty($_REQUEST['start'])){
      $name = $_REQUEST['name'];
      $num1 = rand(1,9);
      $num2 = rand(1,9);
      $state = 1;
    }elseif(!empty($_REQUEST['check'])){
      $answer = $_REQUEST['answer'];
      $name = $_REQUEST['name'];
      $num1 = $_REQUEST['num1'];
      $num2 = $_REQUEST['num2'];
      $problems = $_REQUEST['problems'];
      $correct = $_REQUEST['correct'];
      if($answer == $num1 * $num2){
        $correct ++;
        $isCorrect = TRUE;
      }else{
        $isCorrect = FALSE;
      }
      $problems ++;
      $state = 2;
    }elseif(!empty($_REQUEST['next'])){
      $name = $_REQUEST['name'];
      $num1 = rand(1,9);
      $num2 = rand(1,9);
      $problems = $_REQUEST['problems'];
      $correct = $_REQUEST['correct'];
      $state = 1;
    }elseif(!empty($_REQUEST['again'])){
      $name = $_REQUEST['name'];
      $num1 = $_REQUEST['num1'];
      $num2 = $_REQUEST['num2'];
      $problems = $_REQUEST['problems'];
      $correct = $_REQUEST['correct'];
      $state = 1;
    }
  ?>
  <body>
    <h1>Multiplication Quiz</h1>
    <a class="back" href="../">Go Back</a>
    <a class="source" href="./source.php">View Source</a><br><br>
    <?php if($state === 0): ?>
    <form method="post">
      <span>Enter your name to begin the test</span><br>
      <input type="text" name="name" placeholder="Name" autocomplete="off" autofocus><br>
      <input type="submit" name="start" value="Start Quiz">
    </form>
  <?php elseif($state == 1): ?>
    <form method="post">
      <h3><?php echo $name; ?>'s Multiplication Quiz</h3>
      <span><?php echo "$num1 * $num2 ="; ?></span>
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="num1" value="<?php echo $num1; ?>">
      <input type="hidden" name="num2" value="<?php echo $num2; ?>">
      <input type="hidden" name="problems" value="<?php echo $problems; ?>">
      <input type="hidden" name="correct" value="<?php echo $correct; ?>">
      <input type="text" name="answer" placeholder="Answer" autocomplete="off" autofocus><br>
      <input type="submit" name="check" value="Check Answer"><br>
      <span>Problems: <?php echo $problems; ?></span><br>
      <span>Correct: <?php echo $correct; ?></span>
    </form>
  <?php else: ?>
    <form method="post">
      <h3>Dakota's Multiplication Quiz</h3>
      <span><?php echo "$num1 * $num2 = $answer"; ?> is <?php if($isCorrect) echo "correct"; else echo "incorrect"; ?></span><br>
      <input type="submit" name="next" value="Next problem">
      <?php if(!$isCorrect):?>
      <input type="submit" name="again" value="Try again">
      <?php endif; ?>
      <input type="hidden" name="problems" value="<?php echo $problems; ?>">
      <input type="hidden" name="correct" value="<?php echo $correct; ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="num1" value="<?php echo $num1; ?>">
      <input type="hidden" name="num2" value="<?php echo $num2; ?>">
      <a href="./">Start over</a><br>
      <span>Problems: <?php echo $problems; ?></span>
      <span>Correct: <?php echo $correct; ?></span>
    </form>
  <?php endif; ?>
  </body>
</html>
