(function($) {
    "use strict"

    
    
    

    Morris.Area({
        element: 'extra-area-chart',
        data: [{
            period: '2001',
            smartphone: 0,
            windows: 0,
            mac: 0
        }, {
            period: '2002',
            smartphone: 90,
            windows: 60,
            mac: 25
        }, {
            period: '2003',
            smartphone: 40,
            windows: 80,
            mac: 35
        }, {
            period: '2004',
            smartphone: 30,
            windows: 47,
            mac: 17
        }, {
            period: '2005',
            smartphone: 150,
            windows: 40,
            mac: 120
        }, {
            period: '2006',
            smartphone: 25,
            windows: 80,
            mac: 40
        }, {
            period: '2007',
            smartphone: 10,
            windows: 10,
            mac: 10
        }


        ],
        lineColors: ['#188BE6', '#8862E0', '#19D895'],
        xkey: 'period',
        ykeys: ['smartphone', 'windows', 'mac'],
        labels: ['Phone', 'Windows', 'Mac'],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: 'transparent',
        hideHover: 'auto'

    });


    Morris.Bar({
        element: 'morris-bar-chart__2',
        data: [{
            y: '2006',
            a: 100,
            b: 90,
            c: 60
        }, {
            y: '2007',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2008',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2009',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2010',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2011',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2012',
            a: 100,
            b: 90,
            c: 40
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['A', 'B', 'C'],
        barColors: ['#188BE6', '#8862E0', '#19D895'],
        hideHover: 'auto',
        gridLineColor: 'transparent',
        resize: true
    });

})(jQuery);


(function ($) {
    "use strict";

    const ctx = document.getElementById("monthly_view_chart").getContext('2d');
    const gradientStroke = ctx.createLinearGradient(50, 100, 50, 50);
    gradientStroke.addColorStop(0, "#19D895");
    gradientStroke.addColorStop(1, "#1587E2");
    
    // ctx.height = 100;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["First", "Second", "Third"],
            datasets: [
                {
                    label: "My First dataset",
                    data: [25, 39, 40],
                    borderColor: gradientStroke,
                    borderWidth: "0",
                    backgroundColor: gradientStroke, 
                    hoverBackgroundColor: gradientStroke
                },
                {
                    label: "My Second dataset",
                    data: [38, 48, 60],
                    borderColor: gradientStroke,
                    borderWidth: "0",
                    backgroundColor: gradientStroke, 
                    hoverBackgroundColor: gradientStroke
                },
                {
                    label: "My Third dataset",
                    data: [58, 58, 70],
                    borderColor: gradientStroke,
                    borderWidth: "0",
                    backgroundColor: gradientStroke, 
                    hoverBackgroundColor: gradientStroke
                }, 
                {
                    label: "My Fourth dataset",
                    data: [88, 68, 90],
                    borderColor: gradientStroke,
                    borderWidth: "0",
                    backgroundColor: gradientStroke, 
                    hoverBackgroundColor: gradientStroke
                }
            ]
        },
        options: {
            legend: {
                display: false
            }, 
            tooltips:{
                backgroundColor: '#32CCBC', 
                // callbacks: {
                //     labelColor: function() {
                //         return {
                //             backgroundColor: "#b465da"
                //         }
                //     }, 
                //     labelTextColor: function() {
                //         return {
                //             backgroundColor: "#b465da"
                //         }
                //     }
                // }
            }, 
            maintainAspectRatio: false, 
            responsive: true, 
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    }, 
                    ticks: {
                        beginAtZero: true, 
                        display: false, 
                        max: 100, 
                        min: 0
                    }, 
                    display: false
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false
                    }, 
                    barPercentage: .2, 
                    display: false, 
                    categoryPercentage: 1
                }]
            }
        }
    });

})(jQuery);

(function($) {
    "use strict"


    //todo list
    $(".tdl-new").on('keypress', function(e) {

        var code = (e.keyCode ? e.keyCode : e.which);

        if (code == 13) {

            var v = $(this).val();

            var s = v.replace(/ +?/g, '');

            if (s == "") {

                return false;

            } else {

                $(".tdl-content ul").append("<li><label><input type='checkbox'><i></i><span>" + v + "</span><a href='#' class='ti-trash'></a></label></li>");

                $(this).val("");

            }

        }

    });





    $(".tdl-content a").on("click", function() {

        var _li = $(this).parent().parent("li");

        _li.addClass("remove").stop().delay(100).slideUp("fast", function() {

            _li.remove();

        });

        return false;

    });



    // for dynamically created a tags

    $(".tdl-content").on('click', "a", function() {

        var _li = $(this).parent().parent("li");

        _li.addClass("remove").stop().delay(100).slideUp("fast", function() {

            _li.remove();

        });

        return false;

    });








})(jQuery);


const td = new PerfectScrollbar('#message_wrapper');
const act = new PerfectScrollbar('#timeline-activity');