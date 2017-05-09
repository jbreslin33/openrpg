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
session_start();
include(getenv("DOCUMENT_ROOT") . "/src/database/db_connect.php");
$conn = dbConnect();

echo "<br>";

//check for submit
if (isset($_POST["race_id"]) && isset($_POST["class_id"]) && isset($_POST["name"]) )
{
$insert = "insert into characters (name,user_id,race_id,class_id,full_hitpoints,current_hitpoints) values ('";
$insert .= $_POST["name"];  
$insert .= "',";  
$insert .= $_SESSION["USER_ID"];  
$insert .= ",";  
$insert .= $_POST["race_id"];  
$insert .= ",";  
$insert .= $_POST["class_id"];  
$insert .= ",10,10);";  

error_log($insert);

$result = pg_query($conn,$insert);
}


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

<?php

$query = "select characters.id, characters.name as name, race.name as race, class.name as class, full_hitpoints, current_hitpoints, level, experience, party_id  from characters JOIN race on race.id=characters.race_id JOIN class on class.id=characters.class_id where user_id = 1 order by name asc;";

$result = pg_query($conn,$query);
$numrows = pg_numrows($result);

echo '<table border=\"1\">';
        echo '<tr>';
        echo '<td> NAME';
        echo '</td>';
        echo '<td> RACE';
        echo '</td>';
        echo '<td> CLASS';
        echo '</td>';
        echo '<td> FULL HIT POINTS';
        echo '</td>';
        echo '<td> CURRENT HIT POINTS';
        echo '</td>';
        echo '<td> LEVEL';
        echo '</td>';
        echo '<td> EXPERIENCE';
        echo '</td>';
        echo '<td> PARTY';
        echo '</td>';
        echo '</tr>';

        for($i = 0; $i < $numrows; $i++)
        {
                $row = pg_fetch_array($result, $i);

                echo '<tr>';
                echo '<td>';
                echo $row[0];
                echo '</td>';
                echo '<td>';
                echo $row[1];
                echo '</td>';
                echo '<td>';
                echo $row[2];
                echo '</td>';

                echo '<td>';
                echo $row[3];
                echo '</td>';
                echo '<td>';
                echo $row[4];
                echo '</td>';
                echo '<td>';
                echo $row[5];
                echo '</td>';
                echo '<td>';
                echo $row[6];
                echo '</td>';
                echo '<td>';
                echo $row[7];
                echo '</td>';
                echo '</tr>';
        }

        pg_free_result($result);
        echo '</table>';

?>
	

</body>
</html>
