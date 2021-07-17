<?php
$dbhost = $_GET['host'];
$dbuser = $_GET['user'];
$dbpw = $_GET['pw'];
$dbname = $_GET['name'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
$i = 0;
$query1 = "select sum(f.deaths) from (select couCode as code, max(deaths) as deaths from cases group by code) as f";
$query2 = "select sum(f.cases) from (select couCode as code, max(conCases) as cases from cases group by code) as f";
$query3 = "select avg(percent) from stringency where date = 20200628";


$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);

$data1 = mysqli_fetch_row($result1);
$data2 = mysqli_fetch_row($result2);
$data3 = mysqli_fetch_row($result3);

$dataround = round($data3[$i], 3);

echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Global Confirmed Cases:</p><p class='global-numbers'>$data2[$i]</p></div>";
echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Global Deaths:</p><p class='global-numbers'>$data1[$i]</p></div>";
echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Global Average Stringency:</p><p class='global-numbers'>$dataround</p></div>";

mysql_close($conn);
?>
