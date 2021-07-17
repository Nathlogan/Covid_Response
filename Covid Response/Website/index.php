<!DOCTYPE html>
<html>
<head>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- General page styling -->
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <!-- Style page for filter elements -->
    <link rel="stylesheet" type="text/css" href="stylesheets/filters.css">
    <!-- style for persistent elements -->
    <link rel="stylesheet" type="text/css" href="stylesheets/persistent.css">
    <link href="jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" />

    <script src="jquery-3.5.1.min.js"></script>
    <script src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <!-- get_results handles all javascript functions, -->
    <!-- including slider function and AJAX calls-->
    <script src="scripts/get_results.js" type="text/javascript"></script>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    
<title>
Covid_Response    
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
    <div id="headless">
    <div id="float-filters">
        <div id="separator">
             <!-- Contains the retrieved data -->   
        </div>
        <div id="filter-container">
        <!-- Country Filter Selectors -->
        <ul id = "countryFilter" class = "filterFields">
            <!-- Print out all countries in the database, requires page refresh to reload -->
            <li class = "filterBy">Filter by Country</li>
            <?php include 'PHP/genCountry.php';?>
        </ul>
            
            <!-- Attribute Filter Selectors -->
            <ul class = "filterFields">
                <li class="filterBy">Filter By Attribute : <a href="data_entry.php" style="float:right">+ Enter Data</a></li>
                <!-- slider for month -->
                <li id = "bar-date" class="filters">
                    <label for="dateamount">Month:</label>
                    <input type="text" id="dateamount" readonly>
                    <div class="range-sliders" id="date-range"></div>
                </li>
                <!-- slider for stringency -->
                <li id = "stringency" class="filters">
                    <label for="stramount">
                        <span title="Stringency: Percentage denoting the overall strictness of a country on a specific day">Stringency</span>:
                    </label>
                    <input type="text" id="stramount" readonly>
                    <div class="range-sliders" id="stringency-range"></div>
                </li>
                <!-- slider for closure -->
                <li id = "closures" class="filters">
                    <label for="cloamount">Closure by 
                    <span title = "Level of Strictness :[0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels]">Degree</span> :
                    </label>
                    <input type="text" id="cloamount" readonly >
                    <div class="range-sliders" id="closure-range"></div>
                </li>
                <!-- slider for income support -->
                <li id = "policies" class="filters">
                    <label for="cloamount">
                        <span title = "Level of requirement :[0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels]">Degree</span> of income support :
                    </label>
                    <input type="text" id="polamount" readonly>
                    <div class="range-sliders" id="policies-range"></div>
                </li>
                <!-- slider for testing -->
                <li id = "testing" class="filters">
                    <label for="testamount"> 
                        <span title = "Level of requirement :[0 - No Measures, 1 - Recommended, 2 - Required at some levels, 3 - Required on all levels]">Degree</span> of testing :
                    </label>
                    <input type="text" id="testamount" readonly>
                    <div class="range-sliders" id="testing-range"></div>
                </li>
                <!-- slider for confirmed cases -->
                <li id = "conf-cases" class="filters">
                    <label for="ccamount">Confirmed Cases:</label>
                    <input type="text" id="ccamount" readonly>
                    <div class="range-sliders" id="confirmed-range"></div>
                </li>
                <!-- slider for deaths -->
                <li id = "deaths" class="filters">
                    <label for="dethamount">Confirmed Deaths:</label>
                    <input type="text" id="dethamount" readonly>
                    <div class="range-sliders" id="deaths-range"></div>
                </li>
            </ul>

            </div>
        <!-- End Attribute Filter Selectors -->
        </div>
        <div id="persistent-fields">
            <div >
                <div id = "country-stats">
                    <!-- Country specific data printed to this Div -->
                </div>
            </div>
            <!-- Print out the global cases, deaths, and average stringency -->
            <?php include 'PHP/persistentData.php';?>
        </div>
        </div>
</body>
</html>
