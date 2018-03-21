<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assignment 10</title>
    <link rel="stylesheet" href="master.css">
  </head>
  <?php
    $name = "";
    $word = "";
    $letter = 0;
    $state = 0;
    if(!empty($_REQUEST['start'])){
      $name = $_REQUEST['name'];
      $word = genWord();
      $state = 1;
    }elseif(!empty($_REQUEST['btn'])){
      $name = $_REQUEST['name'];
      $word = $_REQUEST['word'];
      if($_REQUEST['btn'] == "Check Answer"){
        $answer = $_REQUEST['answer'];
        if($answer == $word) $text = "You correctly guessed $word";
        else $text = "You did not correctly guess $word";
        $state = 2;
      }else{
        $letter = $_REQUEST['letter'];
        $letter ++;
        $state = 1;
      }
    }
    function genWord(){
      $file = fopen("words.txt", "r");
      $arr = array();
      $loc = 0;
      while(!feof($file)){
        $str = fgets($file);
        $arr[$loc] = substr($str, 0, strlen($str) - 2);
        $loc ++;
      }
      return $arr[rand(0, sizeof($arr)-1)];
    }
    function getWord($word, $letter){
      $final = "";
      for ($i=0; $i < strlen($word); $i++) {
        if($i <= $letter) $final .= $word[$i];
        else $final .= ' _ ';
      }
      return $final;
    }
  ?>
  <body>
    <h1>Guess the Word</h1>
    <a href="source.php">View Source</a><br>
    <?php if($state == 0): ?>
    <form class="form" method="post">
      <input type="text" name="name" placeholder="Name" autofocus autocomplete="off"><br>
      <input type="submit" name="start" value="Start Game">
    </form>
    <?php elseif($state == 1): ?>
    <span id="topText"><?php echo $name; ?>, Guess the word, or get another letter.</span><br>
    <form class="form" method="post">
      <span id="word"><?php echo getWord($word, $letter); ?></span><br>
      <input type="text" name="answer" placeholder="Answer" autofocus autocomplete="off"><br>
      <input type="submit" name="btn" value="Check Answer">
      <input type="submit" name="btn" value="Get Another Letter">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="word" value="<?php echo $word; ?>">
      <input type="hidden" name="letter" value="<?php echo $letter; ?>">
    </form>
    <?php else: ?>
      <h2><?php echo $text; ?></h2>
      <form method="post">
        <input type="submit" name="start" value="New Game">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
      </form>
    <?php endif; ?>
  </body>
</html>
