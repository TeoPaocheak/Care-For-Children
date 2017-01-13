<!-- row -->
<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-1" data-widget-sortable="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">

            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2><?php echo e(trans('information_content.result.information-result')); ?></h2>
            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    <div class="col-md-12" style="padding: 10px 10px">
                        <div class="panel panel-primary" style="border-color: #5cb85c">
                            <div class="panel-heading" style="background-color: #5cb85c;">
                                Options
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="piechart_3d" style="width: 600px; height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    <!-- WIDGET END -->
</div>

<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  8]
        ]);

        var options = {
          title: '<?php echo trans('home.system.language') ?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
