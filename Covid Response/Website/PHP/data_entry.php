<!DOCTYPE html>
<html>
<head>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="stylesheet" type="text/css" href="stylesheets/styles.css">-->
    <link rel="stylesheet" type="text/css" href="stylesheets/events.css">
    <link href="jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" />

    <script src="jquery-3.5.1.min.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <!--<script src="scripts/get_results.js" type="text/javascript"></script>-->
    <!--<script src="scripts/access.js" type="text/javascript"></script>-->
    <!--<script src="scripts/stringency.js" type="text/javascript"></script>-->
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script>
    $( function() {
        $( document ).tooltip();
    });
    </script>
    
<title>
Data Entry  
</title>
</head>
<body>
    <h3>-- Data Entry -- </h3>
    <div id="primaryFields">
        <div id="insertField">
        <form method="post" action="PHP/postData.php">
            <div id="dataNames">
                <label for="couName">*Country name:</label>
                <br>
                <label for="couCode" title="Country Code: Three letter unique identifier for a country"><p>*Country Code:</p></label>
                <br>
                <label for="date" title="Should be in the format Year Month Day with no spaces, i.e 20200729"><p>*Date:</p></label>
                <br>
                <label for="conCases" title="Cumulative number of confirmed Covid-19 cases for a country"><p>Confirmed Cases:</p></label>
                <br>
                <label for="deaths" title="Cumulative number of deaths from Covid-19 for a country. Should always be less than confirmed cases"><p>Deaths:</p></label>
                <br>
                <label for="cloName" title="Specific closure type from: <br>gathering, inttravel, school, stayhome, transport, or workplace"><p>Closure Name:</p></label>
                <br>
                <label for="cloDegree" title="Closure Degree: Designates the level of restriction placed on closure [0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels]. Defaults to 0 if a closure name is specified"><p>Closure Degree:</p></label>
                <br>
                <label for="polName" title="Closure Name: Specific closure type from: <br>gathering, inttravel, school, stayhome, transport, or workplace"><p>Policy Name:</p></label>
                <br>
                <label for="polDegree" title="Closure Degree: Designates the level of restriction placed on closure 0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels. Defaults to 0 if a closure name is specified"><p>Policy Degree:</p></label><br>
                <label for="invName" title="Specific policy type from: incomesupport and testing"><p>Investment Name:</p></label>
                <br>
                <label for="invDegree" title="Designates the amount spent (USD) on either healthcare or vaccine research"><p>Investment Amount:</p></label>
                <br>
                <label for="percent" title="Stringency: Decimal denoting the overall strictness of a country on a specific day"><p>Stringency:</p></label>
            </div>
            <div id="dataFields">
                <input type="text" id="couName" name="couName" placeholder="Albuquerque"><br>
                <input type="text" id="couCode" name="couCode" placeholder="ALQ"><br>
                <input type="text" id="date" name="date" placeholder="2020729"><br>
                <input type="text" id="conCases" name="conCases" placeholder="0"><br>
                <input type="text" id="deaths" name="deaths" placeholder="0"><br>
                <input type="text" id="cloName" name="cloName" placeholder="school"><br>
                <input type="text" id="cloDegree" name="cloDegree" placeholder="0"><br>
                <input type="text" id="polName" name="polName" placeholder="testing"><br>
                <input type="text" id="polDegree" name="polDegree" placeholder="0"><br>
                <input type="text" id="invName" name="invName" placeholder="vaccines"><br>
                <input type="text" id="invDegree" name="invDegree" placeholder="0"><br>
                <input type="text" id="percent" name="percent" placeholder="0">
            </div>
            <br><br>
            <input type="submit" value="Submit">
        </form>
        </div>
        <!--
        <div id="legend">
            <h4>Legend:</h4>
            <p>Closure Name: Specific closure type from: <br>gathering, inttravel, school, stayhome, transport, or workplace</p>
            <p>Closure Degree: Designates the level of restriction placed on closure 0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels. Defaults to 0 if a closure name is specified</p>
            <p>Policy Name: Specific policy type from {incomesupport and testing}</p>
            <p>Policy Degree: Designates the level of emphasis placed on a policy. Defaults to 0 if a policy name is specified</p>
            <p>Investment Name: Specific investment type from {healthcare and vaccines}</p>
            <p>Investment Amount: Designates the amount spent (USD) on either healthcare or vaccine research</p>
            
        </div>
        -->
    </div>
    <br>
    <div id="requirements">
        <p>* Required Keys</p>
        <p>| Colored pairs require inputs in both or neither forms</p>
    </div>
</body>
</html>
