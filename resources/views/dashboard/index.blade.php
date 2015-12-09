@extends('dashboard.layout.layout')
@section('content')
<!-- /section:basics/sidebar -->
    <div class="main-content">
        <div class="main-content-inner">
            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <!-- /section:settings.box -->
                <div class="page-header">
                    <h1>
                        Dashboard
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat widget-header-small">
                                <h5 class="widget-title">
                                    <i class="ace-icon fa fa-signal"></i>
                                    Live API Traffic
                                </h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div id="live-area-chart"></div>

                                    <!-- /section:plugins/charts.flotchart -->
                                    <div class="hr hr8 hr-double"></div>

                                    <div class="clearfix">
                                        <!-- #section:custom/extra.grid -->
                                        <div class="grid1">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-area-chart fa-2x blue"></i>
                                                    &nbsp; Live
                                                </span>
                                            <h4 class="bigger pull-right" id="live-data">0 / s</h4>
                                        </div>
                                    </div>

                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div>
                    <div class="col-sm-6">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat widget-header-small">
                                <h5 class="widget-title">
                                    <i class="ace-icon fa fa-signal"></i>
                                    API Traffic History
                                </h5>

                                <div class="widget-toolbar no-border">
                                    <div class="inline dropdown-hover">
                                        <button class="btn btn-minier btn-primary" id="show_time">
                                            <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                            <li>
                                                <a href="#" onclick="getHistory('this_week')">
                                                    This Week
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" onclick="getHistory('last_week')">
                                                    Last Week
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" onclick="getHistory('this_month')">
                                                    This Month
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" onclick="getHistory('last_month')">
                                                    Last Month
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" onclick="getHistory('all')">
                                                    All Time
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div id="morris-area-chart"></div>
                                    <!-- /section:plugins/charts.flotchart -->
                                    <div class="hr hr8 hr-double"></div>

                                    <div class="clearfix">
                                        <!-- #section:custom/extra.grid -->
                                        <div class="grid1">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-calculator fa-2x blue"></i>
                                                    &nbsp; Average
                                                </span>
                                            <h4 class="bigger pull-right" id="avgHistory">0 / Day</h4>
                                        </div>
                                    </div>
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div>
                </div><!-- /.row -->

                <!-- #section:custom/extra.hr -->
                <div class="hr hr32 hr-dotted"></div>
                <div class="hr hr32 hr-dotted"></div>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>

<script>
    var morris = null;
    function getHistory(time) {
        var postData = { from: '', to: ''};
        var from = new Date();
        var to = new Date();

        switch (time) {
            case 'this_week':
                $('#show_time').text('This Week');
                var dateOffset1 = (24*60*60*1000) * 1; // 1 day
                var dateOffset2 = (24*60*60*1000) * 7; // 7 days
                from.setTime(from.getTime() - dateOffset2);
                to.setTime(to.getTime() + dateOffset1);
                break;
            case 'last_week':
                $('#show_time').text('Last Week');
                var dateOffset1 = (24*60*60*1000) * 6; // 7 days
                var dateOffset2 = (24*60*60*1000) * 14; // 14 days
                from.setTime(from.getTime() - dateOffset2);
                to.setTime(to.getTime() - dateOffset1);
                break;
            case 'this_month':
                $('#show_time').text('This Month');
                var dateOffset2 = (24*60*60*1000) * 31; // 62 days
                from.setTime(from.getTime() - dateOffset2);
                to.setTime(to.getTime());
                break;
            case 'last_month':
                $('#show_time').text('Last Month');
                var dateOffset1 = (24*60*60*1000) * 30; // 31 days
                var dateOffset2 = (24*60*60*1000) * 62; // 62 days
                from.setTime(from.getTime() - dateOffset2);
                to.setTime(to.getTime() - dateOffset1);
                break;
            case 'all':
                $('#show_time').text('All Time');
                $.ajax({
                    url: 'http://localhost:8081/index.php/statistics/all',
                    type: 'get',
                    success: function(history) {
                        if(history.length == 1) {
                            var custDate = new Date(history[0].Date);

                            var custDD = custDate.getDate() + 1;
                            var custMM = custDate.getMonth() + 1;
                            var custYY = custDate.getFullYear();

                            var strDate = custYY + '-' + custMM + '-' + custDD;

                            history.push({Counter: history[0].Counter, Date: strDate});

                            morris.options['ymax'] = 'auto[' + (history[0].Counter + 300).toString() + ']';
                        }
                        else {
                            morris.options['ymax'] = 'auto';
                        }

                        var total = 0;
                        for(var i = 0; i < history.length; i++)
                            total += history[i].Counter;

                        $('#avgHistory').text(Math.round(total / history.length) + ' / Day');
                        morris.setData(history);
                    }
                });
                return;
                break;
        }

        var fromDD = from.getDate();
        var fromMM = from.getMonth() + 1;
        var fromYY = from.getFullYear();

        var toDD = to.getDate();
        var toMM = to.getMonth() + 1;
        var toYY = to.getFullYear();

        postData.from = fromYY + '-' + fromMM + '-' + fromDD;
        postData.to = toYY + '-' + toMM + '-' + toDD;

        $.ajax({
            url: 'http://localhost:8081/index.php/statistics/history?from=' + JSON.stringify(from) + '&to=' + JSON.stringify(to) + "&applicationId=<?= $applicationId ?>",
            type: 'get',
            success: function(history) {
                if(history.length == 1) {
                    var custDate = new Date(history[0].Date);

                    var custDD = custDate.getDate() + 1;
                    var custMM = custDate.getMonth() + 1;
                    var custYY = custDate.getFullYear();

                    var strDate = custYY + '-' + custMM + '-' + custDD;

                    history.push({Counter: history[0].Counter, Date: strDate});

                    morris.options['ymax'] = 'auto[' + (history[0].Counter + 300).toString() + ']';
                }
                else {
                    morris.options['ymax'] = 'auto';
                }

                var total = 0;
                for(var i = 0; i < history.length; i++)
                    total += history[i].Counter;

                $('#avgHistory').text(Math.round(total / history.length) + ' / Day');
                morris.setData(history);
            }
        });
    }

    $(function() {
        morris = Morris.Area({
            element: 'morris-area-chart',
            xkey: 'Date',
            xLabels: "day",
            ykeys: ['Counter'],
            pointSize: 0,
            hideHover: 'always',
            resize: true
        });
        getHistory('this_week');
        var container = $("#live-area-chart");
        $("#live-area-chart").height(347);

        // Determine how many data points to keep based on the placeholder's initial size;
        // this gives us a nice high-res plot while avoiding more than one point per pixel.

        var maximum = 100;
        var highest = 10;

        //

        var data = [];
        var values = [0];

        function getLiveData(y) {
            if (data.length) {
                data = data.slice(1);
            }

            if(!(values.length < maximum))
                values = values.slice(1);

            if(values.length)
                values.push(y);


            while (data.length < maximum) {
                data.push(y < 0 ? 0 : y > 100 ? 100 : y);
            }

            // zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        //

        series = [{
            data: getLiveData(0),
            lines: {
                fill: true
            }
        }];

        //

        var plot = getPlot(highest, container, series);

        setInterval(function updateLive() {
            $.ajax({
                url: 'http://localhost:8081/index.php/statistics/live',
                type: 'get',
                success: function(live) {
                    $("#live-data").text(live + ' / s');
                    series[0].data = getLiveData(live);

                    plot = getPlot((Math.max.apply(Math, values) + 10), container, series);

                    plot.setData(series);
                    plot.draw();
                }
            });
        }, 2000);
    });

    function getPlot(highest, container, series) {
        return $.plot(container, series, {
            grid: {
                borderWidth: 0,
                minBorderMargin: 20,
                labelMargin: 10,
                backgroundColor: "#ffffff",
                margin: {
                    top: 8,
                    bottom: 20,
                    left: 20
                }
            },
            xaxis: {
                tickFormatter: function() {
                    return "";
                }
            },
            yaxis: {
                min: 0,
                max: highest
            },
            legend: {
                show: true
            }
        });
    }
</script>
@endsection