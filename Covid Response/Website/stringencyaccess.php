<?
$var1 = $_GET['var1'];
$var2 = $_GET['var2'];
$var3 = $_GET['var3'];
$var4 = $_GET['var4'];
$var5 = $_GET['var5'];
$var6 = $_GET['var6'];
$var7 = $_GET['var7'];
$var8 = $_GET['var8'];
$var9 = $_GET['var9'];
$var10 = $_GET['var10'];

$dbhost = $_GET['host'];
$dbuser = $_GET['user'];
$dbpw = $_GET['pw'];
$dbname = $_GET['name'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);

//$result = mysqli_query($conn, "SELECT c.couName, s.couCode, l.date, a.conCases, l.cloName, l.cloDegree, p.polName, p.polDegree, i.invName, i.invUSD, s.percent FROM country c INNER JOIN stringency s USING (couCode) INNER JOIN finances f USING (date) INNER JOIN investments i ON f.date = i.date INNER JOIN implements m USING (date) INNER JOIN policies p ON m.date = p.date INNER JOIN closes l USING (date) WHERE s.percent >= '$var1' AND s.percent <= '$var2' AND l.cloDegree >= '$var3' AND l.cloDegree <= '$var4' AND p.polDegree >= '$var5' AND p.polDegree <= '$var6' AND a.conCases >= '$var7' AND a.conCases <= '$var8' AND i.invUSD >= '$var9' AND i.invUSD <= '$var10' LIMIT 250");

$result = mysqli_query($conn, "SELECT DISTINCT c.couName, c.couCode, a.date, a.conCases, l.cloName, l.cloDegree, i.polName, i.polDegree, s.percent FROM country c INNER JOIN stringency s USING (couCode) INNER JOIN cases a USING (couCode) INNER JOIN closes l ON c.couCode = l.couCode AND l.date = a.date INNER JOIN implements m ON c.couCode = m.couCode AND m.date = l.date INNER JOIN policies p ON m.polName = p.polName WHERE s.percent >= '$var1' AND s.percent <= '$var2' AND a.conCases >= '$var7' AND a.conCases <= '$var8' AND l.cloDegree >= '$var3' AND l.cloDegree <= '$var4' AND m.polDegree >= '$var5' AND m.polDegree <= '$var6' LIMIT 250");

//HOLD SELECT: l.cloName, l.cloDegree, p.polName, p.polDegree, i.invName, i.invUSD
//HOLD FROM  : INNER JOIN finances f USING (date) INNER JOIN investments i ON f.date = i.date INNER JOIN implements m USING (date) INNER JOIN policies p ON m.date = p.date INNER JOIN closes l USING (date)
//HOLD WHERE : AND l.cloDegree >= '$var3' AND l.cloDegree <= '$var4' AND p.polDegree >= '$var5' AND p.polDegree <= '$var6' AND i.invUSD >= '$var9' AND i.invUSD <= '$var10'

echo "<table border = '1'>
<tr>
<td><b>Country Name</b></td>
<td><b>Country Code</b></td>
<td><b>Date</b></td>
<td><b>Confirmed Cases</b></td>
<td><b>Closure Name</b></td>
<td><b>Closure Degree</b></td>
<td><b>Policy Name</b></td>
<td><b>Policy Degree</b></td>
<td><b>Stringency</b></td>
</tr>";

while ($data = mysqli_fetch_row($result))
{
    echo "<tr>";
    for ($i = 0;$i < count($data); $i++)
    {
        echo "<td>$data[$i]</td>";
    }
    echo "</tr>";
}
echo "</table>";
mysql_close($conn);
//return json_encode($data);
?>