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

<p><b> Create Character </p></b>
	
<form method="post" action="/navigation/create_character.php">

<select name="race_id">
<?php
$query = "select id, name from race order by name asc;";
$result = pg_query($conn,$query);
$numrows = pg_numrows($result);

for($i = 0; $i < $numrows; $i++) 
{
      	$row = pg_fetch_array($result, $i);
      	echo "<option value=\"$row[0]\">$row[1]</option>";
}
?>
</select>

<select name="class_id">
<?php
$query = "select id, name from class order by name asc;";
$result = pg_query($conn,$query);
$numrows = pg_numrows($result);

for($i = 0; $i < $numrows; $i++)
{
        $row = pg_fetch_array($result, $i);
        echo "<option value=\"$row[0]\">$row[1]</option>";
}
?>
</select>


<p><b> Character name: </p></b>
<input type="text" name="name">


<p><input type="submit" value="CREATE CHARACTER" /></p>
</form>
	

</body>
</html>
