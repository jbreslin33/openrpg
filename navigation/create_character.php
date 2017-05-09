<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>

<head>
	<title>CREATE CHARACTER</title>
</head>

<body>
<ul>

<li><a href="/navigation/main_menu.php">Main Menu</a></li>
<li><a href="/logout.php">Logout</a></li>
</ul>

<?php
include(getenv("DOCUMENT_ROOT") . "/src/database/db_connect.php");
$conn = dbConnect();

echo "<br>";
?>
	<p><b> Select Student: </p></b>
	
	<form method="post" action="/navigation/create_character.php">

<select name="user_id">

<?php
/*
$query = "select id, username, first_name, last_name, score from users where school_id = ";
$query .= $_SESSION["school_id"];
$query .= " order by last_name;";

$result = pg_query($conn,$query);
$numrows = pg_numrows($result);


for($i = 0; $i < $numrows; $i++) 
{
      	$row = pg_fetch_array($result, $i);
	$string = $row[0];
	$string .= " ";
	$string .= $row[1];
	$string .= " ";
	$string .= $row[2];
	$string .= " ";
	$string .= $row[3];
	$string .= " ";
	$string .= $row[4];
      	echo "<option value=\"$row[0]\">$string</option>";
}
*/
?>
</select>

<p><b> FIRST NAME: </p></b>


<input type="text" name="first_name">

</select>

	<p><input type="submit" value="UPDATE" /></p>

	</form>
	

</body>
</html>
