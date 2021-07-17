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
    <header>
         <div>
            <a href="index.php">Government Response Tracker</a>   
            <p style = "border-left: 1px solid white;">Joseph Polk</p>
            <p style = "border-left: 1px solid white;">Nikhilesh Venkatasubramanian</p>
            <p style = "border-left: 1px solid white;">Nathan Logan</p>
        </div>
    </header>
    <h3>-- Data Entry -- </h3>
    <div id="primaryFields">
        <div class="insertField">
        <form method="post" action="PHP/postData.php" autocomplete="off" target="_blank">
            
            <!-- Handle insert functions -->
            <h4>Insert:</h4>
            <div class="dataNames">
                <label for="couName">*Country name:</label>
                <br>
                <label for="couCode" title="Country Code: Three letter unique identifier for a country"><p>*Country Code:</p></label>
                <br>
                <label for="date" title="Should be in the format Year Month Day with no spaces, i.e 20200729. Only accepts dates between July 10 2020 and December 31 2020 (inclusive)"><p>*Date:</p></label>
                <br>
                <label for="conCases" title="Cumulative number of confirmed Covid-19 cases for a country"><p>Confirmed Cases:</p></label>
                <br>
                <label for="deaths" title="Cumulative number of deaths from Covid-19 for a country. Should always be less than confirmed cases"><p>Deaths:</p></label>
                <br>
                <label for="cloName" title="Specific closure type from: gathering, inttravel, school, stayhome, transport, or workplace"><p>Closure Name:</p></label>
                <br>
                <label for="cloDegree" title="Closure Degree: Designates the level of restriction placed on closure [0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels]. Defaults to 0 if a closure name is specified"><p>Closure Degree:</p></label>
                <br>
                <label for="polName" title="Policy Name: Specific policy type from: incomesupport and testing"><p>Policy Name:</p></label>
                <br>
                <label for="polDegree" title="Policy Degree: Designates the level of restriction placed on policy 0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels. Defaults to 0 if a policy name is specified"><p>Policy Degree:</p></label><br>
                <label for="invName" title="Specific investment type from: healthcare and vaccines"><p>Investment Name:</p></label>
                <br>
                <label for="invDegree" title="Designates the amount spent (USD) on either healthcare or vaccine research"><p>Investment Amount:</p></label>
                <br>
                <label for="percent" title="Stringency: Percentage denoting the overall strictness of a country on a specific day"><p>Stringency:</p></label>
            </div>
            <!-- Textboxes -->
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
        <!-- Handle Delete Functions -->
        <div id="deleteFields" class="insertField">
            <form method="post" action="PHP/deleteData.php" autocomplete="off" target="_blank">
                <h4>Delete:</h4>
                <div class="dataNames">
                    <label for="couNameD">*Country name:</label>
                    <br>
                    <label for="couCodeD" title="Country Code: Three letter unique identifier for a country"><p>*Country Code:</p></label>
                    <br>
                    <label for="dateD" title="Should be in the format Year Month Day with no spaces, i.e 20200729. Only accepts dates between July 10 2020 and December 31 2020 (inclusive)"><p>*Date:</p></label>
                    <br>
                    <label for="conCasesD" title="Cumulative number of confirmed Covid-19 cases for a country"><p>~Cases:</p></label>
                    <br>
                    <label for="cloNameD" title="Specific closure type from: gathering, inttravel, school, stayhome, transport, or workplace"><p>Closure Name:</p></label>
                    <br>
                    <label for="polNameD" title="Policy Name: Specific policy type from: incomesupport and testing"><p>Policy Name:</p></label>
                    <br>
                    <label for="invNameD" title="Specific investment type from: healthcare and vaccines"><p>Investment Name:</p></label>
                    <br>
                    <label for="percentD" title="Stringency: Percentage denoting the overall strictness of a country on a specific day"><p>~Stringency:</p></label>
                </div>
                <!-- Textboxes -->
                <div id="dataFields">
                    <input type="text" id="couNameD" name="couName" placeholder="Albuquerque"><br>
                    <input type="text" id="couCodeD" name="couCode" placeholder="ALQ"><br>
                    <input type="text" id="dateD" name="date" placeholder="2020729"><br>
                    <input type="text" id="conCasesD" name="conCases" placeholder="0"><br>
                    <input type="text" id="cloNameD" name="cloName" placeholder="school"><br>
                    <input type="text" id="polNameD" name="polName" placeholder="testing"><br>
                    <input type="text" id="invNameD" name="invName" placeholder="vaccines"><br>
                    <input type="text" id="percentD" name="percent" placeholder="0">
                </div>
                <br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="requirements">
            <p>* Required Keys</p>
            <p>| Colored pairs require inputs in both or neither forms</p>
            <p>~ Binary Option: [0 = Keep Tuple]----[1 = Delete Tuple]</p>
            <p><span style=color:red;>IMPORTANT</span>: For a tuple to display in the mainpage, a country must have data in all tables for a specific day to display the information, this includes a value for income support and testing, but you only need one closure active, investments are the only optional field.</p>
        </div>
    </div>
    <br>
    
</body>
</html>
