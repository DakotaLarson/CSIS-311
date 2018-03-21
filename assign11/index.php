<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 11</title>
    <link rel="stylesheet" href="master.css">
  </head>
  <?php
    $state = 0;
    $name = $question = $answer = $expected = $status = "";
    $correct = 0;
    $questions = array();
    $questions['3+3'] = 6;
    $questions['4+6'] = 10;
    $questions['7+2'] = 9;
    $questions['5+3'] = 8;
    $questions['3+4'] = 7;
    $questions['1+2'] = 3;
    $questions['2+2'] = 4;
    $questions['2+3'] = 5;
    $questions['1+1'] = 2;
    $answered = 0;
    if(!empty($_REQUEST['start'])){
      $name = $_REQUEST['name'];
      clearFile("test");
      $question = array_keys($questions)[$answered];
      $state = 1;
    }elseif(!empty($_REQUEST['btn']) && $_REQUEST['btn'] == "Next Question"){
      $name = $_REQUEST['name'];
      $correct = $_REQUEST['correct'];
      $answered = $_REQUEST['answered'];
      $question = array_keys($questions)[$answered];
      $state = 1;
    }elseif(isset($_REQUEST['answer'])){
      $name = $_REQUEST['name'];
      $answered = $_REQUEST['answered'];
      $question = array_keys($questions)[$answered];
      $expected = $questions[$question];
      $correct = $_REQUEST['correct'];
      $answer = $_REQUEST['answer'];
      if($answer == $expected){
        $status = "You were correct!";
        $correct ++;
      }else{
        $status = "You were incorrect.";
      }
      appendAnswer($question, $answer, $correct, $status);
      $answered ++;
      if($answered >= count($questions)){
        appendTestScore($name, $answered, $correct);
        $state = 3;
      }else{
        $state = 2;
      }
    }elseif(!empty($_REQUEST['btn'])){
      $name = $_REQUEST['name'];
      $answered = $_REQUEST['answered'];
      $correct = $_REQUEST['correct'];
      appendTestScore($name, $answered, $correct);
      $state = 3;
    }elseif(!empty($_REQUEST['displayall'])){
      $file = fopen("allScores", 'r');
      $text = "";
      while(!feof($file)) {
        $text .= fgets($file) . "<br>";
      }
      fclose($file);
      $state = 5;
    }elseif(!empty($_REQUEST['clear'])){
      clearFile("allScores");
    }elseif(!empty($_REQUEST['button'])){
      if($_REQUEST['button'] == "Review Quiz"){
        $file = fopen("test", 'r');
        $text = "";
        while(!feof($file)) {
          $text .= fgets($file) . "<br>";
        }
        fclose($file);
        $state = 4;
      }
    }
    function appendTestScore($name, $total, $correct){
      $file = fopen('allScores', "a");
      fwrite($file, "$name got $correct out of $total correct.\n");
      fclose($file);
    }
    function appendAnswer($question, $answer, $correct, $status){
      $file = fopen('test', "a");
      fwrite($file, "Question: $question; Your Answer: $answer; Correct Answer: $correct; Status: $status\n");
      fclose($file);
    }
    function clearFile($file){
      $fi = fopen($file, "w");
      fclose($fi);
    }
  ?>
  <body>
    <h1>Addition Quiz</h1>
    <a href="../">Return</a>
    <a href="source.php">Source</a><br>
  <?php if($state == 0): ?>
    <form method="post">
      <span>Name:</span>
      <input type="text" name="name" placeholder="Name" autofocus autocomplete="off"><br>
      <input type="submit" name="start" value="Begin"><br>
      <input type="submit" name="displayall" value="Display All Results">
    </form>
  <?php elseif($state == 1): ?>
    <span>Question: <?php echo $question; ?></span><br>
    <form method="post">
      <span>Answer: </span>
      <input type="text" name="answer" placeholder="Answer" autofocus autocomplete="off"><br>
      <input type="submit" value="Submit">
      <input type="hidden" name="answered" value="<?php echo $answered; ?>">
      <input type="hidden" name="correct" value="<?php echo $correct; ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
    </form>
  <?php elseif($state == 2): ?>
    <span>Question: <?php echo $question; ?></span><br>
    <span>Your Answer: <?php echo $answer; ?></span><br>
    <span>Correct Answer: <?php echo $expected; ?></span><br>
    <span><?php echo $status; ?></span><br>
    <form method="post">
      <input type="hidden" name="answered" value="<?php echo $answered; ?>">
      <input type="hidden" name="correct" value="<?php echo $correct; ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="submit" name="btn" value="Next Question"><br>
      <input type="submit" name="btn" value="Stop Test">
    </form>
  <?php elseif($state == 3): ?>
    <span><?php echo $name; ?>, you got <?php echo $correct; ?> out of <?php echo $answered; ?> correct.</span><br>
    <form method="post">
      <input type="submit" name="button" value="Review Quiz"><br>
      <input type="submit" name="button" value="New Quiz">
    </form>
  <?php elseif($state == 4): ?>
    <span>Quiz Review</span><br>
    <span><?php echo $text; ?></span>
    <form  method="post">
      <input type="submit" value="New Quiz">
    </form>
  <?php elseif($state == 5): ?>
    <span>General Quiz Results</span><br>
    <span><?php echo $text; ?></span>
    <form  method="post">
      <input type="submit" value="New Quiz">
      <input type="submit" name="clear" value="Clear File">
    </form>
  <?php endif; ?>
  </body>
</html>
