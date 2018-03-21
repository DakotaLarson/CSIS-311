<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Assign 14</title>
  </head>
  <?php
    $text = "";
    if(!empty($_REQUEST['btn'])){
      $email = $_REQUEST['email'];
      if($_REQUEST['btn'] == "Verify User"){
        connect();
        verifyAcct($email);
        closeConnection();
        $text = "$email is verified.";
      }else if($_REQUEST['btn'] == "Get User Name"){
        connect();
        $text = "fledsjfe";
        $name = getName($email);
        closeConnection();
        $text = "$name is the first name for $email";
      }else if($_REQUEST['btn'] == "Remove User"){
        connect();
        removeUser($email);
        closeConnection();
        $text = "$email is removed.";
      }else if($_REQUEST['btn'] == "Add User"){
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $pass = $_REQUEST['pass'];
        connect();
        insert($email, $fname, $lname, $pass, "0");
        closeConnection();
        $text = "$email added!";
      }
    }
    $conn = NULL;
    function connect(){
    	global $conn;
    	if(!$conn){
    		$conn = mysqli_connect("localhost", "larsondak", "1024", "larsondak_311");
    	}
    	return $conn;
    }
    function closeConnection(){
    	global $conn;
    	if($conn != NULL){
    		mysqli_close($conn);
    	}
    }
    function insert($email, $fname, $lname, $pass, $verify){
    	global $conn;
    	$stmt = mysqli_stmt_init($conn);
    	mysqli_stmt_prepare($stmt, "INSERT INTO users(fname, lname, email, password, verified) VALUES(?, ?, ?, ?, ?);");
    	$email = mysqli_real_escape_string($conn, $email);
    	$fname = mysqli_real_escape_string($conn, $fname);
      $lname = mysqli_real_escape_string($conn, $lname);
    	$pass = mysqli_real_escape_string($conn, $pass);
    	mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $pass, $verify);
    	mysqli_stmt_execute($stmt);
    	mysqli_stmt_close($stmt);
    }
    function removeUser($email){
      global $conn;
    	$stmt = mysqli_stmt_init($conn);
    	mysqli_stmt_prepare($stmt, "DELETE FROM users WHERE email=?;");
    	$email = mysqli_real_escape_string($conn, $email);
    	mysqli_stmt_bind_param($stmt, "s",$email);
    	mysqli_stmt_execute($stmt);
    	mysqli_stmt_close($stmt);
    }
    function verifyAcct($email){
      global $conn;
    	$stmt = mysqli_stmt_init($conn);
    	mysqli_stmt_prepare($stmt, "UPDATE users SET verified=1 WHERE email=?;");
    	$email = mysqli_real_escape_string($conn, $email);
    	mysqli_stmt_bind_param($stmt, "s",$email);
    	mysqli_stmt_execute($stmt);
    	mysqli_stmt_close($stmt);
    }
    function getName($email){
    	global $conn;
    	$stmt = mysqli_stmt_init($conn);
    	mysqli_stmt_prepare($stmt, "SELECT fname FROM users WHERE email='$email';");
    	mysqli_stmt_execute($stmt);
    	mysqli_stmt_bind_result($stmt, $result);
    	mysqli_stmt_fetch($stmt);
    	mysqli_stmt_close($stmt);
    	return $result;
    }
  ?>
  <body>
    <form method="post">
      <input type="text" name="email" placeholder="Email" autofocus><br>
      <input type="submit" name="btn" value="Verify User"><br>
      <input type="submit" name="btn" value="Get User Name"><br>
      <input type="submit" name="btn" value="Remove User"><br>
      <span>Fill email, first and last name, and password to add a user</span><br>
      <input type="text" name="fname" placeholder="First Name"><br>
      <input type="text" name="lname" placeholder="Last Name"><br>
      <input type="password" name="pass" placeholder="Password"><br>
      <input type="submit" name="btn" value="Add User">
    </form><br>
    <span id="text"><?php echo $text; ?></span>
  </body>
</html>
