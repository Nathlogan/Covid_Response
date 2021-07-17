<html>
<body>

<?
// Input from text fields
$couName = $_POST['couName'];
$couCode = $_POST['couCode'];
$dates = $_POST['date'];
$conCases = $_POST['conCases'];

$cloName = $_POST['cloName'];

$polName = $_POST['polName'];

$invName = $_POST['invName'];

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
    $cloFlag = 1;
    echo "Closure Found";
    echo "<br>";
}
if (strcasecmp($polName, 'incomesupport') == 0 || strcasecmp($polName, 'testing') == 0)
{
    
    $polFlag = 1;
    echo "Policy Found";
    echo "<br>";
}
if (strcasecmp($invName, 'healthcare') == 0 || strcasecmp($invName, 'vaccines') == 0)
{
    $invFlag = 1;
    echo "Investment Found";
    echo "<br>";
}
if (is_numeric($percent))
{
    settype($percent, 'float');
    if ($percent >= 0 && $percent <= 100)
    {
        $strFlag = 1;
        echo "Stringency Found";
        echo "<br>";
    }
}
settype($conCases, 'int');
if ($conCases == 1)
{
        $caseFlag = 1;
        echo "Cases Found";
        echo "<br>";
}
// Set types to int
settype($dates, 'int');

// Invalid country name, country code, or date
if (empty($couName) || empty($couCode) || $dates == 0 || $dates < 20200710 || $dates > 20201231)
{
    $vio = 1;
}  
    
//var_dump($couName, $couCode, $dates, $conCases, $deaths, $cloName,
//         $cloDegree, $polName, $polDegree, $invName, $invDegree, $percent);

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

// No deletes if input is invalid
if ($row_count == 1 || $vio == 1)
{
    echo "Invalid/Insufficient Inputs";
}
else
{
    // Delete Case info
    if ($caseFlag == 1)
    {  
        $sqlcase = "DELETE FROM cases WHERE couCode = '$couCode' AND date = '$dates'";
        if ($conn->query($sqlcase))
        {
            echo "Record of " . $couCode . " Deleted for day " . $dates . ".";
            echo "<br>";
        } else {
            echo "Error deleting record: " . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Cases ignored.";
        echo "<br>";
    }
    
    // Delete closure info
    if ($cloFlag == 1)
    {  
        $sqlclose = "DELETE FROM closes WHERE couCode = '$couCode' AND date = '$dates' AND cloName = '$cloName'";
        if ($conn->query($sqlclose))
        {
            echo "Record of " . $couCode . " Deleted for day " . $dates . " and closure " . $cloName;
            echo "<br>";
        } else {
            echo "Error deleting record: " . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Closures ignored.";
        echo "<br>";
    }
    
    // Delete Policy info
    if ($polFlag == 1)
    {  
        $sqlpol = "DELETE FROM implements WHERE couCode = '$couCode' AND date = '$dates' AND polName = '$polName'";
        if ($conn->query($sqlpol))
        {
            echo "Record of " . $couCode . " Deleted for day " . $dates . " and policy " . $polName;
            echo "<br>";
        } else {
            echo "Error deleting record: " . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Policies ignored.";
        echo "<br>";
    }
    
    // Delete Investment info
    if ($invFlag == 1)
    {  
        $sqlinv = "DELETE FROM finances WHERE couCode = '$couCode' AND date = '$dates' AND invName = '$invName'";
        if ($conn->query($sqlinv))
        {
            echo "Record of " . $couCode . " Deleted for day " . $dates . " and investment " . $invName;
            echo "<br>";
        } else {
            echo "Error deleting record: " . $conn->error;
            echo "<br>";
        }
    }
    else {
        echo "Investments ignored.";
        echo "<br>";
    }
    
    // Delete Stringency info
    if ($strFlag == 1)
    {  
        $sqlstri = "DELETE FROM stringency WHERE couCode = '$couCode' AND date = '$dates'";
        if ($conn->query($sqlstri))
        {
            echo "Record of " . $couCode . " Deleted for day " . $dates;
            echo "<br>";
        } else {
            echo "Error deleting record: " . $conn->error;
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

