var country_last; // Hold the function if country is chosen last

$( function() {
    // Hold the values of the sliders, updated whenever a slider changes value
    sliderVals = [0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0];
    // Hold the value of the current country code
    var radioVal = '';
    
    ///////////////////////////////////////////////////////////////////////////
    // Get the country code and pass it with the slider arguments
    ///////////////////////////////////////////////////////////////////////////
    country_last = function getSearchValues( couCode ) 
    {
        //alert('input[id='+couCode+'].checked');
        $('input[type="checkbox"]').not($('input[id="'+couCode+'"]')).prop('checked', false);
        if (!document.getElementById(couCode).checked)
            couCode = "";
        //alert(couCode);
        getSearchResults(couCode, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
    }
    
    // Convert date into a month
    function get_month( month )
    {
        if (month == 20200101) return "January";
        if (month == 20200201) return "February";
        if (month == 20200301) return "March";
        if (month == 20200401) return "April";
        if (month == 20200501) return "May";
        if (month == 20200601) return "June";
        if (month == 20200701) return "July";
        if (month == 20200801) return "August";
        if (month == 20200901) return "September";
        if (month == 20201001) return "October";
        if (month == 20201101) return "November";
        if (month == 20201201) return "December";
    }
    
    // Slider for month filter
    $("#date-range").slider({
        range : true,
        min : 20200101,
        max : 20201231,
        step : 100,
        values : [20200101, 20201231],
        slide: function( event, ui ) {
            $( "#dateamount" ).val( "" + get_month(ui.values[ 0 ]) + " - " + get_month(ui.values[ 1 ]) + "");
        },
        change: function(event, ui) {
            sliderVals[12] = ui.values[0];
            sliderVals[13] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#dateamount" ).val( "January" +
                          " - " + "December" );
    sliderVals[12] = $( "#date-range").slider("values", 0);
    sliderVals[13] = $( "#date-range").slider("values", 1);
    
    // Slider for stringency filter
    $("#stringency-range").slider({
        range : true,
        min : 0,
        max : 100,
        values : [0, 100],
        slide: function( event, ui ) {
            $( "#stramount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] + "%");
        },
        change: function(event, ui) {
            sliderVals[0] = ui.values[0];
            sliderVals[1] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#stramount" ).val( "" + $( "#stringency-range" ).slider( "values", 0 ) +
                          " - " + $( "#stringency-range" ).slider( "values", 1 ) + "%" );
    sliderVals[0] = $( "#stringency-range").slider("values", 0);
    sliderVals[1] = $( "#stringency-range").slider("values", 1);
    
    // Slider for closure filter
    $("#closure-range").slider({
        range : true,
        min : 0,
        max : 3,
        values : [0, 3],
        slide: function( event, ui ) {
            $( "#cloamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );

        },
        change: function(event, ui) { 
            sliderVals[2] = ui.values[0];
            sliderVals[3] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#cloamount" ).val( "" + $( "#closure-range" ).slider( "values", 0 ) +
                          " - " + $( "#closure-range" ).slider( "values", 1 ) );
    sliderVals[2] = $( "#closure-range").slider("values", 0);
    sliderVals[3] = $( "#closure-range").slider("values", 1);

    // Slider for Income Support filter
    $("#policies-range").slider({
        range : true,
        min : 0,
        max : 3,
        values : [0, 3],
        slide: function( event, ui ) {
            $( "#polamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        },
        change: function(event, ui) { 
            sliderVals[4] = ui.values[0];
            sliderVals[5] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#polamount" ).val( "" + $( "#policies-range" ).slider( "values", 0 ) +
                          " - " + $( "#policies-range" ).slider( "values", 1 ) );
    sliderVals[4] = $( "#policies-range").slider("values", 0);
    sliderVals[5] = $( "#policies-range").slider("values", 1);
    
    // Slider for testing filter
    $("#testing-range").slider({
        range : true,
        min : 0,
        max : 3,
        values : [0, 3],
        slide: function( event, ui ) {
            $( "#testamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        },
        change: function(event, ui) { 
            sliderVals[10] = ui.values[0];
            sliderVals[11] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#testamount" ).val( "" + $( "#testing-range" ).slider( "values", 0 ) +
                          " - " + $( "#testing-range" ).slider( "values", 1 ) );
    sliderVals[10] = $( "#testing-range").slider("values", 0);
    sliderVals[11] = $( "#testing-range").slider("values", 1);
    
    // Slider for confirmed cases filter
    $("#confirmed-range").slider({
        range : true,
        min : 0,
        max : 3000000,
        values : [0, 3000000],
        step: 30000,
        slide: function( event, ui ) {
            $( "#ccamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        },
        change: function(event, ui) { 
            sliderVals[6] = ui.values[0];
            sliderVals[7] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#ccamount" ).val( "" + $( "#confirmed-range" ).slider( "values", 0 ) +
                         " - " + $( "#confirmed-range" ).slider( "values", 1 ) );
    sliderVals[6] = $( "#confirmed-range").slider("values", 0);
    sliderVals[7] = $( "#confirmed-range").slider("values", 1);
    
    // Slider for death filter
    $("#deaths-range").slider({
        range : true,
        min : 0,
        max : 130000,
        values : [0, 130000],
        step: 1000,
        slide: function( event, ui ) {
            $( "#dethamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        },
        change: function(event, ui) {
            sliderVals[8] = ui.values[0];
            sliderVals[9] = ui.values[1];
            radioVal = $('input[name=country]:checked', '#countryFilter').val();
            if (!radioVal)
                radioVal = '';
    
            // Call GET evaluator
            getSearchResults(radioVal, sliderVals[0], sliderVals[1], sliderVals[2], 
                          sliderVals[3], sliderVals[4], sliderVals[5],
                          sliderVals[6], sliderVals[7], sliderVals[8],
                          sliderVals[9], sliderVals[10], sliderVals[11], 
                          sliderVals[12], sliderVals[13]);
        }
    });
    $( "#dethamount" ).val( "" + $( "#deaths-range" ).slider( "values", 0 ) +
                          " - " + $( "#deaths-range" ).slider( "values", 1 ) );
    sliderVals[8] = $( "#deaths-range").slider("values", 0);
    sliderVals[9] = $( "#deaths-range").slider("values", 1);
    
    $( document ).tooltip();
    
    ///////////////////////////////////////////////////////////////////////////
    // Take in filter data and construct a query using the 
    // parameters for definitions, Main Query Function
    ///////////////////////////////////////////////////////////////////////////
    function getSearchResults(couCode, stringMin, stringMax, closMin, closMax, polMin, polMax, conMin, conMax, finMin, finMax, testMin, testMax, dateMin, dateMax ) {
        $.ajax({
            url:'PHP/getRequest.php',
            type: 'GET',
            dataType: 'html',
            data: {var0: couCode, var1: stringMin, var2: stringMax, var3: closMin
                  , var4: closMax, var5: polMin, var6: polMax
                 , var7: conMin, var8:conMax, var9: finMin
                  , var10: finMax, var11: testMin, var12: testMax, var13: dateMin
                  , var14: dateMax},
            success:function(response) {
                $("#separator").html(response);
            }
        });
    }
    
        
    
    
});

///////////////////////////////////////////////////////////////////////////
// Get data specific to selected country
///////////////////////////////////////////////////////////////////////////
function getValues( couCode ) {
    if ($('input#'+couCode+'').is(':checked'))
    {
        $.ajax({
            url:'PHP/countrystats.php',
            type: 'GET',
            dataType: 'html',
            data: {var1: couCode},
            success:function(response) {
                $("#country-stats").html(response);
            }
        });
    }
    else {
        $( "#country-stats" ).empty();
    }
}