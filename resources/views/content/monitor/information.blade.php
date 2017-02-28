<section ng-app="app" id="widget-grid" class="">
    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12" ng-controller="entityInfoController">
            <input type="text" ng-init="tableName='{{$table}}'" ng-model="tableName" hidden="">
            <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-sortable="false"
                 data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                    <label style="margin-left: 10px; margin-top:-1px; font-size: 17px">{{ trans('information_content.form-information-list') }}</label>
                    <span id="loading" style="display: none;"><i class="fa fa-gear fa-2x fa-spin"></i></span>
                </header>
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->

                    <div class="widget-body no-padding">
                        <div class="smart-form">
                            <fieldset>
                                <header>
                                    <b>{{ trans('information_content.geography.selecting-geographical-area') }}</b>
                                </header>
                                <div class="col-sm-5">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="label">
                                                    {{ trans('information_content.geography.geographical-area') }}
                                                </label>
                                            </section>
                                            <section class="col col-8">
                                                <input id="auth_level" type="hidden" value="{{ Auth::user()->role->level }}"/>
                                                <div ng-model="user_type" style="display: none;"></div>
                                                {{--<p ng-bind="province_code"></p>--}}

                                                {{--<p ng-bind="geography.type"></p>--}}

                                                <label class="select">
                                                    <select ng-model="geography.type" class="form-control" id="geography">
                                                        {{--<option value="" style="display: none; visibility: hidden">Hello</option>--}}
                                                        @foreach($geographical_areas as $geographical_area)
                                                            <option value="{{$geographical_area['name']}}" selected="{{$geographical_area['selected']}}">{{$geographical_area['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            {{--<p ng-bind="geography.province"></p>--}}
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6" style="border-left: 1px solid black">
                                    {{--                        @if(Auth::user()->role->level == 1 || Auth::user()->role->level == 2)--}}
                                    <fieldset>
                                        <!-- When Geographical Area dropdown equals 'province', province dropdown will show -->
                                        <div class="row" ng-hide="geography.type === 'country'">
                                            <section class="col col-3">
                                                <label class="label">
                                                    {{ trans('information_content.geography.province') }}
                                                </label>
                                            </section>
                                            <section class="col col-1">
                                                <label class="label">
                                                    :
                                                </label>
                                            </section>
                                            <section class="col col-8">
                                                @if($provinces->count() < 2)
                                                    <input id="province_code" type="hidden" value="{{ $provinces->first()->ProvinceCode }}"/>
                                                    <h5>{{ $provinces->first()->ProvinceName }}</h5>
                                                @else
                                                    <label class="select">
                                                        <!-- loadNew function here is used to change district according to the selected province -->
                                                        <select ng-model="geography.province" id="province-filter" class="form-control" onchange="loadNew(this, 'district')">
                                                            <!-- Only Province is passed from controller. Others will be loaded by Javascript below -->
                                                            <option value="">{{ trans('information_content.geography.province_label') }}</option>
                                                            @foreach($provinces as $province)
                                                                <option value="{{$province->ProvinceCode}}">{{$province->ProvinceName}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                @endif
                                            </section>
                                            {{--<p ng-bind="geography.province"></p>--}}
                                        </div>

                                        <!-- If u want to understand this, deleted one the conditions in ng-show below. -->
                                        <div class="row"
                                             ng-show="geography.type === 'commune' || geography.type === 'district'">
                                            {{--<div class="row" ng-show="geography.type === 'district'">--}}
                                            <section class="col col-3">
                                                <label class="label">
                                                    {{ trans('information_content.geography.district') }}
                                                </label>
                                            </section>
                                            <section class="col col-1">
                                                <label class="label">
                                                    :
                                                </label>
                                            </section>
                                            <section class="col col-8">
                                                @if($districts->count() < 2)
                                                    <input id="district_code" type="hidden" value="{{ $districts->first()->DistrictCode }}"/>
                                                    <h5>{{ $districts->first()->DistrictName }}</h5>
                                                @else
                                                    <label class="select">
                                                        <select ng-model="geography.district" id="district-filter" class="form-control" onchange="loadNew(this, 'commune')">
                                                            <option value="">{{ trans('information_content.geography.district_label') }}</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                @endif
                                            </section>
                                        </div>

                                        <div class="row" ng-show="geography.type === 'commune'">
                                            <section class="col col-3">
                                                <label class="label">
                                                    {{ trans('information_content.geography.commune') }}
                                                </label>
                                            </section>
                                            <section class="col col-1">
                                                <label class="label">
                                                    :
                                                </label>
                                            </section>
                                            <section class="col col-8">
                                                <label class="select">
                                                    <select ng-model="geography.commune" id="commune-filter" class="form-control" onchange="loadNew(this, 'village')">
                                                        <option value="">{{ trans('information_content.geography.commune_label') }}</option>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                        </div>
                                    </fieldset>
                                    {{--@endif--}}
                                </div>
                            </fieldset>

                            {{--Condition Block--}}
                            <fieldset>
                                <header>
                                    <b>{{ trans('information_content.characteristic.selecting-characteristic') }}</b>
                                </header>
                                <div class="col-sm-12">
                                    <fieldset>
                                        <div class="row" ng-repeat="option in options">
                                            <section class="col col-1">
                                                <label class="select">
                                                    <!-- When index is more than one, this select will appear -->
                                                    <select ng-model="option.conjunction" ng-hide="$index === 0" class="form-control">
                                                        <option value="AND">{{ trans('information_content.characteristic.and') }}</option>
                                                        <option value="OR">{{ trans('information_content.characteristic.or') }}</option>
                                                    </select>
                                                </label>
                                            </section>
                                            <section class="col col-3">
                                                <label class="select">
                                                    <select ng-model="option.key.keyValue" ng-change="loadValue($index)" class="form-control">
                                                        <option value="">{{ trans('information_content.characteristic.select') }}</option>
                                                        @foreach($fields as $field)
                                                            @if($field->DisplayField!==1)
                                                                <option ng-show="{{$field->EDFSearchType}} !== 0" value="{{$field->EntityDefinedFieldNameInTable}}">
                                                                    {{$field->EntityDefinedFieldListName}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </section>

                                            <section class="col col-3">
                                                <label class="select">
                                                    <select ng-model="option.condition" class="form-control">
                                                        <option value="">{{ trans('information_content.characteristic.select') }}</option>
                                                        <option ng-repeat="condition in option.conditions" value="<%condition.ConditionSymbol%>">
                                                            <%condition.ConditionName%>
                                                        </option>
                                                    </select>
                                                </label>
                                            </section>

                                            <!-- This will display a dropdown or textbox -->
                                            <section class="col col-3">
                                                <!-- option.key.edfSearchType === 1 displays dropdown -->
                                                <label class="select" ng-show="option.key.edfSearchType === 1">
                                                    @if (session()->get('locale'))
                                                        @if (session()->get('locale') == 'en')
                                                            <select ng-model="option.value" class="form-control">
                                                                <option value="">{{ trans('information_content.characteristic.select') }}</option>
                                                                <option ng-repeat="listValue in option.listValues" value="<%listValue.Value%>">
                                                                    <%listValue.Description%>
                                                                </option>
                                                            </select>
                                                            <i></i>
                                                        @elseif (session()->get('locale') == 'km')
                                                            <select ng-model="option.value" class="form-control">
                                                                <option value="">{{ trans('information_content.characteristic.select') }}</option>
                                                                <option ng-repeat="listValue in option.listValues" value="<%listValue.Value%>">
                                                                    <%listValue.Description_KH%>
                                                                </option>
                                                            </select>
                                                            <i></i>
                                                        @endif
                                                    @else
                                                        <select ng-model="option.value" class="form-control">
                                                            <option value="">{{ trans('information_content.characteristic.select') }}</option>
                                                            <option ng-repeat="listValue in option.listValues" value="<%listValue.Value%>">
                                                                <%listValue.Description_KH%>
                                                            </option>
                                                        </select>
                                                        <i></i>
                                                    @endif
                                                </label>
                                                <label class="input" ng-show="option.key.edfSearchType === 2">
                                                    <input ng-model="option.value" class="form-control">
                                                </label>
                                            </section>

                                            <section class="col col-1">
                                                <button class="btn btn-sm btn-danger" ng-click="removeOption($index)">
                                                    <i class="fa fa-trash-o"></i>{{ trans('button.remove') }}
                                                </button>
                                            </section>
                                        </div>
                                    </fieldset>
                                </div>
                                <button class="btn btn-sm btn-primary" ng-click="addOption('AND')">{{ trans('button.new-option') }}</button>
                            </fieldset>

                            {{--Tree Blcok--}}
                            <fieldset>
                                <header>
                                    <b>{{ trans('information_content.selecting-field') }}</b>
                                </header>
                                <?php $i = 0; ?>
                                <div class="row">
                                    <div class="tree">
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li class="parent_li" role="treeitem" ng-init="addCategory();">
                                                    <label><input type="checkbox" ng-init="categories[{{$i}}].selectedField=false" ng-model="categories[{{$i}}].selectedField"></label>
                                                    <span title="Collapse this branch">{{$category->EntityDefinedCategoryName}}</span>
                                                    <ul>
                                                        @foreach($category->fields as $field)
                                                            <!-- $field->DisplayField (DisplayField == 1 display only) -->
                                                            @if($field->DisplayField)
                                                                <li>
                                                                    <span title="Collapse this branch"><input class="selections" type="checkbox" ng-checked="categories[{{ $i }}].selectedField || {{ $field->DefaultSelected }} === 1" value="{{$field->EntityDefinedFieldNameInTable}}">&nbsp;{{$field->EntityDefinedFieldListName}}</span>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <?php $i++; ?>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </fieldset>

                            <footer>
                                <button class="btn btn-primary btn-search" ng-click="view()"><i class="fa fa-fw fa-search"></i>{{ trans('button.search') }}</button>
                                <button class="btn btn-danger" type="button" ng-click="reset()"><i class="fa fa-fw fa-refresh"></i>{{ trans('button.reset') }}</button>
                            </footer>
                        </div>
                    </div>
                </div>
            </div><!-- end panel-->
        </article><!-- end controller-->
    </div><!-- end row-->

    <div id="form-result"></div>

</section> <!-- end section-->

<div id="modal-loading" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent; box-shadow: none; border: none;">
            <div class="modal-body" style="background-color: transparent; text-align: center;">
                <img src="{{asset('img/loading.gif')}}">
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    pageSetUp();
    $(document).ready(function () {
        angular.bootstrap($('#widget-grid'), ["app"]);

//        if($('select[ng-model = "geography.type"]').find('option')[0] != 'country') {
//            $('select[ng-model = "geography.type"]').find('option')[0].remove();
//        }

        $('#geography').change(function () {
            if (({{ $user_role_level }}) == 3) {
                var p_code = $('#province_code').val();

                var type = 'district';

                jQuery.ajax({
                    url: "{{url('PDCV')}}/" + type + "/" + p_code,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
//                            alert(data);
                        $("#district-filter").html("<option value=''>{{ trans('information_content.geography.district_label') }}</option>");
                        $.each(data, function (i, value) {
//                                alert(value.DistrictCode);
                            $('#district-filter').append('<option value="' + value.DistrictCode + '">' + value.DistrictName + '</option>');
                        });
                    }
                });
            } else if (({{ $user_role_level }}) > 3) {
                var d_code = $('#district_code').val();

                var type = 'commune';

                jQuery.ajax({
                    url: "{{url('PDCV')}}/" + type + "/" + d_code,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
//                            alert(data);
                        $("#commune-filter").html("<option value=''>{{ trans('information_content.geography.commune_label') }}</option>");
                        $.each(data, function (i, value) {
//                                alert(value.DistrictCode);
                            $('#commune-filter').append('<option value="' + value.CommuneCode + '">' + value.CommuneName + '</option>');
                        });
                    }
                });
            }
        });

    });

    loadScript("js/plugin/bootstraptree/bootstrap-tree.min.js", function () {});
</script>

<script>
    var conditions = <?php echo $conditions; ?>;
    // console.log(conditions);
    var loadNew = function (obj, type) {
        var code;
        code = $(obj).val();
        var location = getLocation(type, code);

        if (type === 'district') {
            $("#district-filter").html("<option value=''>{{ trans('information_content.geography.district_label') }}</option>");
            for (i = 0; i < location.length; i++) {
                $("#district-filter").append("<option value='" + location[i].DistrictCode + "'>" + location[i].DistrictName + "</option>");
            }
            $("#commune-filter").html("<option value=''>{{ trans('information_content.geography.commune_label') }}</option>");
            $("#village-filter").html("<option value=''>{{ trans('information_content.geography.village_label') }}</option>");
        } else if (type === 'commune') {
            $("#commune-filter").html("<option value=''>{{ trans('information_content.geography.commune_label') }}</option>");
            for (i = 0; i < location.length; i++) {
                $("#commune-filter").append("<option value='" + location[i].CommuneCode + "'>" + location[i].CommuneName + "</option>");
            }
            $("#village-filter").html("<option value=''>{{ trans('information_content.geography.village_label') }}</option>");
        } else if (type === 'village') {
            $("#village-filter").html("<option value=''>{{ trans('information_content.geography.village_label') }}</option>");
            for (i = 0; i < location.length; i++) {
                $("#village-filter").append("<option value='" + location[i].VillageCode + "'>" + location[i].VillageName + "</option>");
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
            url: "{{url('PDCV')}}/" + type + "/" + code,
            type: "GET",
            async: false,
            success: function (result) {
                results = result;
            }
        });
        return results;
    };

    // Show search bar, copy/pdf/..
    var pagefunction = function () {

        /* BASIC ;*/
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        /* END BASIC */
    };

    var reloadScript = function () {
        $('#datatable_fixed_column').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                // {
                //     extend: 'pdf',
                //     orientation: 'landscape',
                //     // charSet: "utf16le"
                // },
                {
                    extend: "print",
                    text: 'Preview',
                    autoPrint: false
                },
                {
                    extend: "print",
                }
            ]
        });
    }

    var compareObject = function (obj) {
        window.open($(obj).data("href"), '_blank');
    };
</script>
