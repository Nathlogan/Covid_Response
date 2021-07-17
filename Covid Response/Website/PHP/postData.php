<html>
<body>

<?
// Input from text fields
$couName = $_POST['couName'];
$couCode = $_POST['couCode'];
$dates = $_POST['date'];
$conCases = $_POST['conCases'];
$deaths = $_POST['deaths'];
$cloName = $_POST['cloName'];
$cloDegree = $_POST['cloDegree'];
$polName = $_POST['polName'];
$polDegree = $_POST['polDegree'];
$invName = $_POST['invName'];
$invDegree = $_POST['invDegree'];
$percent = $_POST['percent'];

// Flags to determine whether or not to insert/delete
$vio = 0;
$caseFlag = 0;
$cloFlag = 0;
$polFlag = 0;
$invFlag = 0;
$strFlag = 0;
    
///////////////////////////////////////////////////////////////////////////
// Case Handling
///////////////////////////////////////////////////////////////////////////
if (strcasecmp($cloName, 'gathering') == 0 || strcasecmp($cloName, 'inttravel') == 0 ||
   strcasecmp($cloName, 'school') == 0 || strcasecmp($cloName, 'stayhome') == 0 ||
   strcasecmp($cloName, 'transport') == 0 || strcasecmp($cloName, 'workplace') == 0)
{
    settype($cloDegree, 'int');
    if ($cloDegree >= 0 && $cloDegree <= 3){
        $cloFlag = 1;
        echo "Closure Found";
        echo "<br>";
    }
}
if (strcasecmp($polName, 'incomesupport') == 0 || strcasecmp($polName, 'testing') == 0)
{
    settype($polDegree, 'int');
    if ($polDegree >= 0 && $polDegree <= 3){
        $polFlag = 1;
        echo "Policy Found";
        echo "<br>";
    }
}
if (strcasecmp($invName, 'healthcare') == 0 || strcasecmp($invName, 'vaccines') == 0)
{
    
    settype($invDegree, 'int');
    if ($invDegree >=0){
        $invFlag = 1;
        echo "Investment Found";
        echo "<br>";
    }
}
if (is_numeric($percent))
{
    settype($percent, 'double');
    if ($percent >= 0.0 && $percent <= 100.0)
    {
        $strFlag = 1;
        echo "Stringency Found";
        echo "<br>";
    }
}
if (is_numeric($conCases) || is_numeric($deaths))
{
    $caseFlag = 1;
    echo "Cases Found";
    echo "<br>";
}

// Set types to int
settype($cloDegree, 'int');
settype($conCases, 'int');
settype($deaths, 'int');
settype($polDegree, 'int');
settype($invDegree, 'int');
settype($dates, 'int');
    
    
    

   
// Invalid country name, country code, or date
if (empty($couName) || empty($couCode) || $dates == 0 || $dates < 20200710 || $dates > 20201231)
{
    $vio = 1;
} 

// Connect to DB
$dbhost = $_GET['host'];
$dbuser = $_GET['user'];
$dbpw = $_GET['pw'];
$dbname = $_GET['name'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
    
if ($conn->connect_error)
{
    die("Connection Failure: " . $conn->connect_error);
}

// Check that a new country code and country name is used or an existing combo is used
$country_NCheck = mysqli_query($conn, "SELECT * FROM `country` WHERE `couName` = '$couName'");
$country_CCheck = mysqli_query($conn, "SELECT * FROM `country` WHERE `couCode` = '$couCode'");

$row_count = mysqli_num_rows($country_NCheck) + mysqli_num_rows($country_CCheck);

// No entries if input is invalid
if ($row_count == 1 || $vio == 1)
{
    echo "Invalid/Insufficient Inputs";
}
else
{
    // Insert/use country
    $sqlcountry = "INSERT INTO country VALUES ('".$couName."', '".$couCode."')";
    if ($conn->query($sqlcountry)) {
        echo $couName . " Added.";
        echo "<br>";
    } else {
        echo $couName . " Exists.";
        echo "<br>";
    }
    
    // Insert/update Case info
    if ($caseFlag == 1) {
        $sqlcases = "REPLACE INTO cases (conCases, deaths, `date`, couCode) VALUES ('".$conCases."', '".$deaths."', '".$dates."', '".$couCode."')";
        if ($conn->query($sqlcases)) {
            echo "Cases for " . $couName . " on " . $dates . " Added/Updated.";
            echo "<br>";
        } else {
            echo "Error for " . $sqlcases . "------" . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Cases ignored.";
        echo "<br>";
    }
    
    // Insert/update Closure info
    if ($cloFlag == 1)
    {
        $sqlcloses = "REPLACE INTO closes (cloName, cloDegree, `date`, couCode) VALUES ('".$cloName."', '".$cloDegree."', '".$dates."', '".$couCode."')";
        if ($conn->query($sqlcloses)) {
            echo "Closures for " . $couName . " on " . $dates . " in " . $cloName . " Added/Updated.";
            echo "<br>";
        } else {
            echo "Error for " . $sqlcloses . "------" . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Closures ignored.";
        echo "<br>";
    }
    
    // Insert/update Investment info
    if ($invFlag == 1)
    {
        $sqlinvest = "REPLACE INTO finances (invName, invUSD, `date`, couCode) VALUES ('".$invName."', '".$invDegree."', '".$dates."', '".$couCode."')";
        if ($conn->query($sqlinvest)) {
            echo "Investments for " . $couName . " in " . $invName . " Added/Updated.";
            echo "<br>";
        } else {
            echo "Error for " . $sqlinvest . "------" . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Investments ignored.";
        echo "<br>";
    }
    
    // Insert/update Policy info
    if ($polFlag == 1)
    {
        $sqlpolicy = "REPLACE INTO implements (polName, polDegree, `date`, couCode) VALUES ('".$polName."', '".$polDegree."', '".$dates."', '".$couCode."')";
        if ($conn->query($sqlpolicy)) {
            echo "Policies for " . $couName . " on " . $dates . " in " . $polName . " Added/Updated.";
            echo "<br>";
        } else {
            echo "Error for " . $sqlpolicy . "------" . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Policies ignored.";
        echo "<br>";
    }
    
    // Insert/update Stringency info
    if ($strFlag == 1)
    {
        $sqlstringency = "REPLACE INTO stringency (percent, `date`, couCode) VALUES ('".$percent."', '".$dates."', '".$couCode."')";
        if ($conn->query($sqlstringency)) {
            echo "Stringency for " . $couName . " on " . $dates . " Added/Updated.";
            echo "<br>";
        } else {
            echo "Error for " . $sqlstringnency . "------" . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Stringency ignored.";
        echo "<br>";
    }
}

$conn->close();
?>
    
</body>
</html>

