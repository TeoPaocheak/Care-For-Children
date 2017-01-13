<!-- row -->
<section ng-app="app" ng-controller="chartController">
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- end widget -->

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-1" data-widget-sortable="false"
                 data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart"></i> </span>
                    <h2><?php echo e(trans('inspection.inspection-table')); ?></h2>
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
                            <div class="col-md-8">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        <?php echo e(trans('inspection.select-option')); ?>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(Auth::user()->role->level == 1 || Auth::user()->role->level == 2): ?>
                                            <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" ng-checked="" value="national" id="rd_national" name="options" ng-model="national_option">&nbsp;<?php echo e(trans('information_content.geography.national')); ?>

                                                        </div>
                                                        <div class="col-md-8"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" id="rd_province" value="province" name="options" ng-model="checked">&nbsp;<?php echo e(trans('information_content.geography.province')); ?>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="province-select" style="display:inline" ng-show="checked">
                                                                <label class="select">
                                                                    <select ng-model="province" class="form-control" onchange="loadNew(this, 'district')" id="province-option">
                                                                        <option value=""><?php echo e(trans('information_content.geography.province_label')); ?></option>
                                                                        <?php foreach($provinces as $province): ?>
                                                                            <option value="<?php echo e($province->ProvinceCode); ?>"><?php echo e($province->ProvinceName); ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" value="district" id="rd_district" name="options" ng-model="district_option">&nbsp;<?php echo e(trans('information_content.geography.district')); ?>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="district-select" style="display:inline">
                                                                <label class="select">
                                                                    <select ng-model="district" id="district-filter" class="form-control">
                                                                        <option value=""><?php echo e(trans('information_content.geography.district_label')); ?></option>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php elseif(Auth::user()->role->level == 3): ?>
                                            <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" id="rd_province" value="province" name="options" ng-model="checked">&nbsp;<?php echo e(trans('information_content.geography.province')); ?>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="col-md-8">
                                                                <div id="province-select" style="display:inline" ng-show="checked">
                                                                    <input id="province-option" type="hidden" value="<?php echo e($provinces->first()->ProvinceCode); ?>"/>
                                                                    <h5 style="display:inline"><?php echo e($provinces->first()->ProvinceName); ?></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" value="district" id="rd_district" name="options" ng-model="district_option">&nbsp;<?php echo e(trans('information_content.geography.district')); ?>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="district-select" style="display:inline">
                                                                <label class="select">
                                                                    <select ng-model="district" id="district-filter" class="form-control">
                                                                        <option value=""><?php echo e(trans('information_content.geography.district_label')); ?></option>
                                                                        <?php foreach($districts as $district): ?>
                                                                            <option value="<?php echo e($district->DistrictCode); ?>"><?php echo e($district->DistrictName); ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php elseif(Auth::user()->role->level == 4): ?>
                                            <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <?php echo e(trans('information_content.geography.province')); ?>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5 style="display:inline"><?php echo e($provinces->first()->ProvinceName); ?></h5>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <?php echo e(trans('information_content.geography.district')); ?>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="select">
                                                                <input type="radio" id="rd_district" value="district" checked="checked" style="display:none">
                                                                <input id="district-filter" type="hidden" value="<?php echo e($districts->first()->DistrictCode); ?>"/>
                                                                <h5 style="display:inline"><?php echo e($districts->first()->DistrictName); ?></h5>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php endif; ?>

                                        <div class="col-md-12" style="text-align:right">
                                            <button id="search-button" class="btn btn-success"><?php echo e(trans('button.search')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 no-padding" id="chart-result"  style="padding: 10px 0 0 0">
                            <div class="col-md-8">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        Graph
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="inspect_graph" style="width: auto; height: 800px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding: 0 5px 0 0;">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        <?php echo e(trans('inspection.inspection-table')); ?>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="dataTable display table table-bordered" cellspacing="0" width="100%" >
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo e(trans('inspection.institution-name')); ?></th>
                                                            <th><?php echo e(trans('inspection.inspect-once')); ?></th>
                                                            <th><?php echo e(trans('inspection.inspect-twice')); ?></th>
                                                            <th><?php echo e(trans('inspection.total-inspection')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tBody"></tbody>
                                                </table>
                                            </div>
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
</section>
<!-- end widget grid -->

<div id="modal-loading" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent; box-shadow: none; border: none;">
            <div class="modal-body" style="background-color: transparent; text-align: center;">
                <img src="<?php echo e(asset('img/loading.gif')); ?>">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#chart-result').hide();
        $('#province-select').hide();
        $('#district-select').hide();

        $('#rd_national').click(function(){
            $('#province-select').hide();
            $('#district-select').hide();
        });

        $('#rd_province').click(function(){
            $('#province-select').show();
            $('#district-select').hide();
        });

        $('#rd_district').click(function(){
            $('#province-select').show();
            $('#district-select').show();
        });

        $('#search-button').click(function() {
            if (!$("#rd_province").is(":checked") && !$("#rd_district").is(":checked") && !$("#rd_national").is(":checked") ) {
                alert("Please choose an option");
            } else {
                var rd_name;
                var province_code;
                var district_code;

                if($("#rd_province").is(":checked")) {
                   rd_name = $('input[name=options]:checked').val();
                   province_code = $('#province-option').val();
                }
                else if($("#rd_district").is(":checked") || <?php echo e(Auth::user()->role->level); ?> == 4) {
                    rd_name = "district";
                    district_code = $('#district-filter').val();
                }
                else {
                    rd_name = $('input[name=options]:checked').val();
                }

                $('#modal-loading').modal('show');

                jQuery.ajax({
                    url: "inspect/get-table-result",
                    type: "GET",
                    data: {
                        "selected_name" : rd_name,
                        "province_code" : province_code,
                        "district_code" : district_code,
                        "_token": "<?php echo e(csrf_token()); ?>"
                    },
                    dataType: "json",
                    success: function(data){
                        // alert(data);
                        $('#modal-loading').modal('hide');

                        var arr =[['<?php echo trans('inspection.inspection') ?>', '<?php echo trans('inspection.inspect-once') ?>', '<?php echo trans('inspection.inspect-twice') ?>']];
                        var last_total = [];
                        var max_total_centers;
                        $.each(data, function(index, value){
                            // console.log(value);
                            var inner_arr =[];
                            $.each(value, function(key, val){
                                // console.log(val);
                                inner_arr.push(val);
                            });

                            var arr_1 = inner_arr.length-1;
                            // console.log(inner_arr[1]);

                            // Temporary array to keep converted numbers
                            var converted_arr = [];
                            converted_arr.push(inner_arr[0]);
                            converted_arr.push(parseInt(inner_arr[1]));
                            converted_arr.push(parseInt(inner_arr[2]));

                            // console.log(converted_arr);

                            last_total.push(inner_arr.pop(inner_arr.length-1));
                            arr.push(converted_arr);
                        });

                        // Getting max number of center to minValue of graph
                        max_total_centers = parseInt(Math.max.apply(Math, last_total));
                        // console.log(max_total_centers);

                        // Google Map
                        google.charts.load('current', {packages: ['corechart', 'bar']});
                        google.charts.setOnLoadCallback(drawStacked);

                        function drawStacked() {
                            var data = google.visualization.arrayToDataTable(arr);

                            var options = {
                                title: '<?php echo trans('inspection.inspection-graph') ?>',
                                chartArea: {width: '50%', height: '75%'},
                                isStacked: true,
                                hAxis: {
                                  title: '<?php echo trans('inspection.total-inspection') ?>',
                                  minValue: max_total_centers,
                                },
                                vAxis: {
                                  title: '<?php echo trans('inspection.inspection-location') ?>'
                                }
                            };
                            var chart = new google.visualization.BarChart(document.getElementById('inspect_graph'));
                            chart.draw(data, options);
                        }

                        // Table
                        $("#tBody").empty();
                        var trHTML = '';
                        for (i = 0; i < data.length; i++) {
                            var col_name = data[i].d_name;
                            var inspected_once = data[i].insp1;
                            var inspected_twice = data[i].insp2;
                            var total_centers = data[i].total_centers;

                            if (inspected_once == '0' && inspected_twice == '0' && total_centers == '0') {
                                trHTML += '<tr class="hidden"></tr>'
                            } else {
                                trHTML +=
                                    '<tr><td>'
                                    + data[i].d_name
                                    + '</td><td>'
                                    + inspected_once
                                    + '</td><td>'
                                    + inspected_twice
                                    + '</td><td>'
                                    + total_centers
                                    + '</td></tr>';
                            }
                        }
                        $('#tBody').append(trHTML);

                        $('#chart-result').show();
                        // alert(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        })
    });
</script>

<script type="text/javascript">
    pageSetUp();

    // Getting districts when province is selected
    var loadNew = function (obj, type) {
        var code;
        code = $(obj).val();
        var location = getLocation(type, code);

        if (type === 'district') {
            $("#district-filter").html("<option value=''><?php echo e(trans('information_content.geography.district_label')); ?></option>");
            for (i = 0; i < location.length; i++) {
                $("#district-filter").append("<option value='" + location[i].DistrictCode + "'>" + location[i].DistrictName + "</option>");
            }
        }
    };

    var getLocation = function (type, code) {
        var results = "";
        if (name === undefined) {
            name = "";
        }

        // Go to PDCVController
        $.ajax({
            url: "<?php echo e(url('PDCV')); ?>/" + type + "/" + code,
            type: "GET",
            async: false,
            success: function (result) {
                results = result;
            }
        });
        return results;
    };



</script>
