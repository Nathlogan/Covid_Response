<?
$dbhost = $_GET['host'];
$dbuser = $_GET['user'];
$dbpw = $_GET['pw'];
$dbname = $_GET['name'];
$db_connection = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
$query = "SELECT couName, couCode FROM country";
if ($result = $db_connection->query($query))
{
    while($row = $result->fetch_assoc())
    {
        $name = $row["couName"];
        $code = $row["couCode"];
        echo '<li>';
        echo '<input type = "checkbox" id ="'.$code.'" name ="country" value="'.$code.'" onclick = "country_last(this.value);getValues(this.value);">'.$name;
        echo '</li>';
    }
    $result->free();
    mysql_close($db_connection);;
}
?>