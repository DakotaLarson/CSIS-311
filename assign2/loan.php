<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Loan Information</title>
    <link rel="stylesheet" href="./styles/main.css">
  </head>
  <?php
    if(isset($_POST['amount']) == FALSE || isset($_POST['interest']) == FALSE
  || isset($_POST['term']) == FALSE){
      $answer = "You did not supply all fields.";
    }else{
      $amount = $_POST['amount'];
      $interest = $_POST['interest'];
      $term = $_POST['term'];
      if(is_numeric($amount) == FALSE || is_numeric($interest) == FALSE
    || is_numeric($term) == FALSE){
        $answer = "Your input is not numeric.";
      }elseif($amount < 0 || $interest < 0 || $term < 0){
        $answer = "All values must be greater than 0.";
      }else{
        $interest /= 100;
        $payment = ($interest*$amount)/(1-pow(1+$interest, -$term));
        $totalPaid = $payment * $term;
        $interestPaid = $totalPaid-$amount;
      }
    }
  ?>
  <body>
    <h1>Assignment 2</h1><br>
    <h2>Loan Information</h2>
    <a href="./loan.html" id="back">Go Back</a><br>
    <?php if(isset($answer)):?>
      <span class="answer"><?php echo $answer?></span><br>
    <?php else:?>
      <span class="answer">Monthly Payment: <?php echo number_format($payment, 2); ?></span><br>
      <span class="answer">Total Amount Paid: <?php echo number_format($totalPaid, 2); ?></span><br>
      <span class="answer">Total Interest Paid: <?php echo number_format($interestPaid, 2); ?></span><br>
      <span class="answer">Information taken from <a href="http://www.financeformulas.net/Loan_Payment_Formula.html">Here</a></span>
    <?php endif; ?>
  </body>
  </html>
<?php echo "<HR>"; highlight_file("loan.php"); ?>
