<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Birthday Information</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <?php

    $answer = "";
    $time = "Not selected.";
	if(correct('month') && correct('day') && correct('year')){
		$month = $_REQUEST['month'];
		$day = $_REQUEST['day'];
		$year = $_REQUEST['year'];
    $time = mktime(0, 0, 0, $month, $day, $year);
	}else{
		$answer = "All fields were not filled in correctly.";
	}
    function correct($text){
  		return isset($_REQUEST[$text]) && is_numeric($_REQUEST[$text]);
  	}
  	function getSeason($day, $month){
      if($month < 3 || ($month == 3  && $day < 21)){
          return "The season is winter.";
      }elseif($month < 6 || ($month == 6 && $day < 21)){
        return "The season is spring.";
      }elseif($month < 9 || ($month == 9 && $day < 23)){
        return "The season is summer.";
      }elseif($month < 12 || ($month == 12 && $day < 21)){
        return "The season is fall.";
      }else{
        return "The season is winter.";
      }
  	}
  	function getZodiac($day, $month){
      if($month == 3 && $day > 20 || $month == 4 && $day < 20){
        return "Your zodiac sign is Aries.";
      }elseif($month == 4 && $day > 19 || $month == 5 && $day < 21){
        return "Your zodiac sign is Taurus.";
      }elseif($month == 5 && $day > 20 || $month == 6 && $day < 21){
        return "Your zodiac sign is Gemeni.";
      }elseif($month == 6 && $day > 20 || $month == 7 && $day < 23){
        return "Your zodiac sign is Cancer.";
      }elseif($month == 7 && $day > 22 || $month == 8 && $day < 23){
        return "Your zodiac sign is Leo.";
      }elseif($month == 8 && $day > 22 || $month == 9 && $day < 23){
        return "Your zodiac sign is Virgo.";
      }elseif($month == 9 && $day > 22 || $month == 10 && $day < 23){
        return "Your zodiac sign is Libra.";
      }elseif($month == 10 && $day > 23 || $month == 11 && $day < 22){
        return "Your zodiac sign is Scorpio.";
      }elseif($month == 11 && $day > 21 || $month == 12 && $day < 22){
        return "Your zodiac sign is Sagittarius.";
      }elseif($month == 12 && $day > 21 || $month == 1 && $day < 20){
        return "Your zodiac sign is Capricorn.";
      }elseif($month == 1 && $day > 19 || $month == 2 && $day < 19){
        return "Your zodiac sign is Aquarius.";
      }elseif($month == 2 && $day > 18 || $month == 3 && $day < 21){
        return "Your zodiac sign is Pisces.";
      }
  	}
  	function getAnimal($year){
      if($year % 12 == 0){
        return "Your Chinese Zodiac animal is the Monkey.";
      }elseif($year % 12 == 1){
        return "Your Chinese Zodiac animal is the Rooster.";
      }elseif($year % 12 == 2){
        return "Your Chinese Zodiac animal is the Dog.";
      }elseif($year % 12 == 3){
        return "Your Chinese Zodiac animal is the Pig.";
      }elseif($year % 12 == 4){
        return "Your Chinese Zodiac animal is the Rat.";
      }elseif($year % 12 == 5){
        return "Your Chinese Zodiac animal is the Ox.";
      }elseif($year % 12 == 6){
        return "Your Chinese Zodiac animal is the Tiger.";
      }elseif($year % 12 == 7){
        return "Your Chinese Zodiac animal is the Rabbit.";
      }elseif($year % 12 == 8){
        return "Your Chinese Zodiac animal is the Dragon.";
      }elseif($year % 12 == 9){
        return "Your Chinese Zodiac animal is the Snake.";
      }elseif($year % 12 == 10){
        return "Your Chinese Zodiac animal is the Horse.";
      }elseif($year % 12 == 11){
        return "Your Chinese Zodiac animal is the Goat.";
      }
  	}
  	function getAge($time){
      $diff = time()- $time;
      return "Your current age is ".floor($diff/(365*24*60*60));
  	}
  	function getBirthdayWeekday($time){
      return "Your birthday was on a ". date("l", $time);
  	}
  	function getNextWeekday($day, $month){
      $currentYear = date("Y");
      if(strtotime("". $day. ' '.$month.' '.$currentYear) < strtotime('now')){
        $currentYear += 1;
      }
      return "Your next birthday will be on a " .
      date("l", mktime(0, 0, 0, $day, $month, $currentYear));
  	}
  	function getDaysUntil($day, $month){
      $currentYear = date("Y");
      if(strtotime("". $day. '-'.$month.'-'.$currentYear) < strtotime('now')){
        $currentYear += 1;
      }
      $bday = strtotime("". $day. '-'.$month.'-'.$currentYear);
      $today = strtotime('now');
      $days = floor(($bday-$today)/86400)+1;
      return "There are ".$days." days until your next birthday.";
  	}
    function isOn($text){
      return isset($_REQUEST[$text]) && $_REQUEST[$text] == "on";
    }
  ?>
  <body>
    <h1>Birthday Information</h1><br>
    <h2>Dakota Larson</h2><br>
    <a class="back" href="birthday.html">Go Back</a><br>
	<span class="info"><?php if(is_numeric($time)) echo "Date Selected: ".date("F jS, Y", $time);?></span>
    <span class="info"><?php echo $answer; ?></span><br>
    <span class="info"><?php if(isOn('born')) echo getBirthdayWeekday($time);?></span><br>
    <span class="info"><?php if(isOn('week')) echo getNextWeekday($day, $month);?></span><br>
    <span class="info"><?php if(isOn('days')) echo getDaysUntil($day, $month);?></span><br>
    <span class="info"><?php if(isOn('age')) echo getAge($time);?></span><br>
    <span class="info"><?php if(isOn('season')) echo getSeason($day, $month);?></span><br>
    <span class="info"><?php if(isOn('zodiac')) echo getZodiac($day, $month);?></span><br>
    <span class="info"><?php if(isOn('animal')) echo getAnimal($year);?></span><br>

  </body>
</html>
<?php echo "<HR>";
   highlight_file("birthday.php"); ?>
