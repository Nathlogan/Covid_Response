$( function() {
            $("#stringency-range").slider({
                range : true,
                min : 0,
                max : 100,
                values : [0, 100],
                slide: function( event, ui ) {
                    $( "#stramount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] + "%");
                }
            });
            $( "#stramount" ).val( "" + $( "#stringency-range" ).slider( "values", 0 ) +
      " - " + $( "#stringency-range" ).slider( "values", 1 ) + "%" );
        });
        $( function() {
            $("#closure-range").slider({
                range : true,
                min : 1,
                max : 12,
                values : [1, 100],
                slide: function( event, ui ) {
                    $( "#cloamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#cloamount" ).val( "" + $( "#closure-range" ).slider( "values", 0 ) +
      " - " + $( "#closure-range" ).slider( "values", 1 ) );
        });
        $( function() {
            $("#finance-range").slider({
                range : true,
                min : 0,
                max : 1000000,
                values : [1, 1000000],
                step: 1000,
                slide: function( event, ui ) {
                    $( "#finamount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#finamount" ).val( "$" + $( "#finance-range" ).slider( "values", 0 ) +
      " - $" + $( "#finance-range" ).slider( "values", 1 ) );
        });
        $( function() {
            $("#policies-range").slider({
                range : true,
                min : 1,
                max : 12,
                values : [1, 12],
                slide: function( event, ui ) {
                    $( "#polamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#polamount" ).val( "" + $( "#policies-range" ).slider( "values", 0 ) +
      " - " + $( "#policies-range" ).slider( "values", 1 ) );
        });
        $( function() {
            $("#confirmed-range").slider({
                range : true,
                min : 0,
                max : 100000000,
                values : [0, 100000000],
                step: 1000,
                slide: function( event, ui ) {
                    $( "#ccamount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#ccamount" ).val( "" + $( "#confirmed-range" ).slider( "values", 0 ) +
      " - " + $( "#confirmed-range" ).slider( "values", 1 ) );
        });