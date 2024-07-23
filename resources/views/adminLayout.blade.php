<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/d4ec05b9cc.js" crossorigin="anonymous"></script>
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/templatemo-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    @notifyCss
</head>

<body id="reportsPage">
    <div class="" id="home">
        @include('HeaderAndFooter.adminHeader')
        @yield('content')
    </div>

    <script src="{{ env('APP_URL') }}/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{ env('APP_URL') }}/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{ env('APP_URL') }}/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{ env('APP_URL') }}/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{ env('APP_URL') }}/js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
    @notifyJs
</body>

</html>