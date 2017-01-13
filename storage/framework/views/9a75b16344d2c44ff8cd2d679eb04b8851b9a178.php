<!-- row -->
<div class="row" ng-app="app">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-controller="graphController">
        <!-- end widget -->

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-1" data-widget-sortable="false"
             data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Google Graph</h2>
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
                    <!--<h2>Nestable List #1</h2>-->

                        <div class="col-md-12" style="padding: 10px 0 0 0">
                            <div class="col-md-4">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        Options
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                    <li>
                                                        <input class="selections" type="checkbox" ng-checked="" value="national">&nbsp;<?php echo e(trans('information_content.geography.national')); ?>

                                                    </li>
                                                    <li>
                                                        <input class="selections" type="checkbox" ng-model="type" id="province" value="province">&nbsp;<?php echo e(trans('information_content.geography.province')); ?>

                                                        <div class="row" ng-show="type === 'province'">
                                                            <section class="col col-8">
                                                                <label class="select">
                                                                    <select ng-model="geography.district" id="district-filter" class="form-control" onchange="loadNew(this, 'commune')">
                                                                        <option value="">Hello</option>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </section>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <input class="selections" type="checkbox" ng-checked="" value="district">&nbsp;<?php echo e(trans('information_content.geography.district')); ?>

                                                    </li>
                                                    <li>
                                                        <input class="selections" type="checkbox" ng-checked="" value="center">&nbsp;<?php echo e(trans('information_content.geography.center')); ?>

                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        Options
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
<!-- end widget grid -->


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
