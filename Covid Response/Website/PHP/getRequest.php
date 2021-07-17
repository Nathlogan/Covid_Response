<?
// All variables from country code and slider values
$couCode = $_GET['var0'];
$strMin = $_GET['var1'];
$strMax = $_GET['var2'];
$closMin = $_GET['var3'];
$cloMax = $_GET['var4'];
$polMin = $_GET['var5'];
$polMax = $_GET['var6'];
$conMin = $_GET['var7'];
$conMax = $_GET['var8'];
$dethMin = $_GET['var9'];
$dethMax = $_GET['var10'];
$testMin = $_GET['var11'];
$testMax = $_GET['var12'];
$dateMin = $_GET['var13'];
$dateMax = $_GET['var14'];

// Define variables as integers
settype($strMin, 'int');
settype($strMax, 'int');
settype($closMin, 'int');
settype($cloMax, 'int');
settype($polMin, 'int');
settype($polMax, 'int');
settype($conMin, 'int');
settype($conMax, 'int');
settype($dethMin, 'int');
settype($dethMax, 'int');
settype($testMin, 'int');
settype($testMax, 'int');
settype($dateMin, 'int');
settype($dateMax, 'int');

// Connect to database
$dbhost = $_GET['host'];
$dbuser = $_GET['user'];
$dbpw = $_GET['pw'];
$dbname = $_GET['name'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);

// Main query for Data retrieval, 8 compares, 6 tables joined, 12 columns displayed
$result = mysqli_query($conn, "SELECT DISTINCT c.couName, c.couCode, s.date, a.conCases, a.deaths, l.cloName, l.cloDegree, m.polName, m.polDegree, p.polName, p.polDegree, s.percent
FROM country c
NATURAL JOIN stringency s 
NATURAL JOIN cases a
NATURAL JOIN closes l
NATURAL JOIN implements m
INNER JOIN implements p ON (p.couCode = m.couCode AND p.date = m.date)
WHERE m.polName < p.polName AND
c.couCode LIKE '%$couCode'
AND s.percent BETWEEN $strMin AND $strMax
AND a.conCases BETWEEN $conMin AND $conMax
AND a.deaths BETWEEN $dethMin AND $dethMax
AND l.cloDegree BETWEEN $closMin AND $cloMax
AND m.polDegree BETWEEN $polMin AND $polMax 
AND p.polDegree BETWEEN $testMin AND $testMax 
AND s.date BETWEEN $dateMin AND $dateMax LIMIT 2000");

// Print out the table headers to the main <div>
echo "<table border = '1'>
<tr>
<td><b>Country Name</b></td>
<td><b>Country Code</b></td>
<td><b>Date</b></td>
<td><b>Confirmed Cases</b></td>
<td><b>Deaths</b></td>
<td><b>Closure Name</b></td>
<td><b>Closure Degree</b></td>
<td><b>Policy Name</b></td>
<td><b>Policy Degree</b></td>
<td><b>Policy Name</b></td>
<td><b>Policy Degree</b></td>
<td><b>Stringency</b></td>
</tr>";

// Iterate through each retrieved row and echo it as a table entry.
while ($data = mysqli_fetch_row($result))
{
    echo "<tr>";
    for ($i = 0;$i < count($data); $i++)
    {
        echo "<td>$data[$i]</td>";
    }
    echo "</tr>";
}
// Close table and DB connection
echo "</table>";
mysql_close($conn);
//return json_encode($data);
?>