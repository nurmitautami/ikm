(function ($) {
    "use strict"


    //todo list
    $(".tdl-new").on('keypress', function (e) {

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





    $(".tdl-content a").on("click", function () {

        var _li = $(this).parent().parent("li");

        _li.addClass("remove").stop().delay(100).slideUp("fast", function () {

            _li.remove();

        });

        return false;

    });



    // for dynamically created a tags

    $(".tdl-content").on('click', "a", function () {

        var _li = $(this).parent().parent("li");

        _li.addClass("remove").stop().delay(100).slideUp("fast", function () {

            _li.remove();

        });

        return false;

    });








})(jQuery);



(function ($) {
    "use strict"


    // LINE CHART
    // Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2016',
            a: 100,
            b: 90,
        }, {
            y: '2017',
            a: 75,
            b: 65,
        }, {
            y: '2018',
            a: 50,
            b: 40,
        }, {
            y: '2019',
            a: 75,
            b: 65,
        }, {
            y: '2020',
            a: 50,
            b: 40,
        }, {
            y: '2021',
            a: 75,
            b: 65,
        }, {
            y: '2022',
            a: 100,
            b: 90,
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['A', 'B'],
        barColors: ['rgba(132, 38, 255,1)', '#CEA8FF'],
        hideHover: 'auto',
        gridLineColor: 'transparent',
        resize: true
    });









})(jQuery);


(function ($) {
    "use strict"


    // $('#todo_list').slimscroll({
    //     position: "right",
    //     size: "5px",
    //     height: "290px",
    //     color: "transparent"
    // });

    // $('#activity').slimscroll({
    //     position: "right",
    //     size: "5px",
    //     height: "375px",
    //     color: "transparent"
    // });





})(jQuery);



(function ($) {
    "use strict"

    let ctx = document.getElementById("chart_widget_2");
    ctx.height = 280;
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
                data: [0, 15, 57, 12, 85, 10, 50],
                label: "iPhone X",
                backgroundColor: 'rgba(132, 38, 255,1)',
                borderColor: 'rgba(132, 38, 255,1)',
                borderWidth: 1,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'rgba(132, 38, 255,1)',
                pointBackgroundColor: 'rgba(132, 38, 255,1)',
            }, {
                label: "Pixel 2",
                data: [0, 30, 5, 53, 15, 55, 0],
                backgroundColor: 'rgba(132,38,255,0.4)',
                borderColor: 'rgba(132,38,255,0.4)',
                borderWidth: 1,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'rgba(132,38,255,0.4)',
                pointBackgroundColor: 'rgba(132,38,255,0.4)',
            }]
        },
        options: {
            responsive: !0,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                backgroundColor: '#000',
                titleFontFamily: 'Poppins',
                bodyFontFamily: 'Poppins',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Poppins',
                },


            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        max: 100,
                        min: 0,
                        stepSize: 25
                    }
                }]
            },
            title: {
                display: false,
            }
        }
    });





})(jQuery);

const actv = new PerfectScrollbar('#activity');