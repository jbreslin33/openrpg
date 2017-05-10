<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>

<head>
	<title>CREATE CHARACTER</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
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

if ($_POST["party_name"] != '')
{
$insert = "insert into parties (name,user_id) values ('";
$insert .= $_POST["party_name"];
$insert .= "',";
$insert .= $_SESSION["USER_ID"];
$insert .= ")";
$result = pg_query($conn,$insert);
}

if (isset($_POST["party_name_id"])) 
{
$query = "delete from parties where id = ";
$query .= $_POST["party_name_id"];
$query .= ";";
$result = pg_query($conn,$query);
}

?>

<table style="width:100%">
<tr align="left">
</tr>

<tr>

<td>
<b>CREATE PARTY</b>
<form method="post" action="/navigation/create_character.php">
<p><b> Pary Name: </p></b>
<input type="text" name="party_name">
<p><input type="submit" value="CREATE PARTY" /></p>
</form>
</td>

<td>
<b>DELETE PARTY</b>
<form method="post" action="/navigation/create_character.php">
<select name="party_name_id">
<?php
$query = "select id, name from parties where user_id = ";
$query .= $_SESSION["USER_ID"]; 
$query .= ";";
$result = pg_query($conn,$query);
$numrows = pg_numrows($result);
for($i = 0; $i < $numrows; $i++)
{
        $row = pg_fetch_array($result, $i);
        echo "<option value=\"$row[0]\">$row[1]</option>";
}
?>
</select>
<p><input type="submit" value="DELETE PARTY" /></p>
</form>
</td>

</tr>

</table>


<?php

$query = "select characters.id, characters.name as name, race.name as race, class.name as class, full_hitpoints, current_hitpoints, level, experience, party_id  from characters JOIN race on race.id=characters.race_id JOIN class on class.id=characters.class_id where user_id = ";
$query .= $_SESSION["USER_ID"];
$query .= " order by name asc;";

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
