<?php
session_start();
$errorMsg = "";
//$validUser = $_SESSION["login"] == true;
$validUser = false;
$id = 0; 
if(isset($_POST["sub"])) {

//check db
$connectionString = "host=localhost dbname=openrpg user=postgres password=mibesfat";
$mConnection = pg_connect($connectionString);

$u = $_POST["username"]; 
$p = $_POST["password"]; 

$query = "select id from users where username = '";
$query .= $u;
$query .= "' and password = '";
$query .= $p;
$query .= "';";

//get db result
$result = pg_query($mConnection,$query) or die('Could not connect: ' . pg_last_error());

//get numer of rows
$num = pg_num_rows($result);

// if there is a row then the username and password pair exists
        if ($num > 0)
        {
		$validUser = true;
                //get the id from user table
                $id = pg_Result($result, 0, 'id');
        }
        else
        {
		$validUser = false;
        }

  if(!$validUser) $errorMsg = "Invalid username or password.";
  else $_SESSION["login"] = true;
}
if($validUser) {
   header("Location: /game.html"); die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>Login</title>
</head>
<body>
  <form name="input" action="" method="post">
    <label for="username">Username:</label><input type="text" value="<?= $_POST["username"] ?>" id="username" name="username" />
    <label for="password">Password:</label><input type="password" value="" id="password" name="password" />
    <div class="error"><?= $errorMsg ?></div>
    <input type="submit" value="Home" name="sub" />
  </form>
</body>
</html>
