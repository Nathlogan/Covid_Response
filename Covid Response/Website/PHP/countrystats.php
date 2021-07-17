<?

$var1 = $_GET['var1'];
$dbhost = $_GET['host'];
$dbuser = $_GET['user'];
$dbpw = $_GET['pw'];
$dbname = $_GET['name'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
$i = 0;
$m = 1000000;

$result1 = mysqli_query($conn, "select f.max from (select max(deaths) as max, couCode from cases where couCode = '$var1') as f");
$result2 = mysqli_query($conn, "select f.max from (select max(conCases) as max, couCode from cases where couCode = '$var1') as f");
$result3 = mysqli_query($conn, "select f.avg from (select avg(percent) as avg, couCode from stringency where couCode = '$var1') as f");
$result4 = mysqli_query($conn, "select f.healthsum from (select sum(invUSD) as healthsum, couCode from finances where invName = 'healthcare' and  couCode = '$var1') as f");
$result5 = mysqli_query($conn, "select f.vaccsum from (select sum(invUSD) as vaccsum, couCode from finances where invName = 'vaccines' and  couCode = '$var1') as f");
$result6 = mysqli_query($conn, "select couName from country where couCode = '$var1'");

$data1 = mysqli_fetch_row($result1);
$data2 = mysqli_fetch_row($result2);
$data3 = mysqli_fetch_row($result3);
$data4 = mysqli_fetch_row($result4);
$data5 = mysqli_fetch_row($result5);
$data6 = mysqli_fetch_row($result6);

$data3round = round($data3[$i], 3);
$data4inm = ($data4[$i])/$m;
$data5inm = ($data5[$i])/$m;

echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Selected Country:</p><p class='persistent-numbers'>$data6[$i]</p></div>";
echo "<div class=persistent-data>";
    echo "<p class='filterBy'>Confirmed Cases:</p><p class='persistent-numbers'>$data2[$i]</p></div>";
echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Deaths:</p><p class='persistent-numbers'>$data1[$i]</p></div>";
echo "<div class=persistent-data>";
    echo "<p class='filterBy'>Average Stringency:</p><p class='persistent-numbers'>$data3round</p></div>";
echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Total Emergency healthcare investment (in millions USD):</p><p class='persistent-numbers'>$data4inm M</p></div>";
echo "<div class='persistent-data'>";
    echo "<p class='filterBy'>Total vaccine development investment (in millions USD):</p><p class='persistent-numbers'>$data5inm M</p></div>";

mysql_close($conn);
?>
