<!-- InformationController@compareEDF -->
<section id="widget-grid" class="">
    <button class="btn btn-primary" onclick="print()"><?php echo e(trans('button.print')); ?></button></p>

    <?php
        $i = 0;
        $edf = [];
    ?>

    <div id="mainEntityCompared" class="col-md-12" style="padding: 0;">
        <div class="col-sm-12" style="margin-bottom: 45px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php if(session()->get('locale')): ?>
                        <?php if(session()->get('locale') == 'en'): ?>
                            <?php echo e($table->TableNameEN); ?>

                        <?php elseif(session()->get('locale') == 'km'): ?>
                            <?php echo e($table->TableNameKH); ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo e($table->TableNameKH); ?>

                    <?php endif; ?>
                </div>
                <div class="panel-body" style="padding: 15px 15px 0 15px">
                    <div class="form-horizontal" role="form">
                        <table class="dataTable display table table-bordered" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th><?php echo e(trans('detail-fields.column_name')); ?></th>
                                <th><?php echo e(trans('detail-fields.result_num')); ?></th>
                                <th><?php echo e(trans('detail-fields.description')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($colHeaders as $header): ?>
                                    <?php foreach($header as $key => $value): ?>
                                        <?php /* Hide or display Dimension (If its value is 0 or not) */ ?>
                                        <?php if($key == 'RECMMNDTN_DMNSTON_1_FOOD_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_1_FOOD_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_1_FOOD_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_1_FOOD_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE4' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE5' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE6' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE7' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_2_HEALTH_RE_DATABASE7' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_3_ENTERTAINMENT_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_3_ENTERTAINMENT_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_3_ENTERTAINMENT_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_3_ENTERTAINMENT_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_3_ENTERTAINMENT_RE_DATABASE4' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE4' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE5' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE6' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_4_EDU_RE_DATABASE7' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_5_FREEDOM_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_5_FREEDOM_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_5_FREEDOM_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_5_FREEDOM_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_6_EQUIPMENT_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_6_EQUIPMENT_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_6_EQUIPMENT_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE4' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE5' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_7_FACILITY_RE_DATABASE6' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE_NO' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE1' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE2' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE3' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE4' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE5' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE6' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE7' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE8' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE9' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE10' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php elseif($key == 'RECMMNDTN_DMNSTON_8_MANAGEMENT_RE_DATABASE11' && $value == '0'): ?>
                                            <tr class="hidden"></tr>
                                        <?php else: ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(trans('detail-fields.'.$key)); ?>

                                                    <?php /* <?php echo e($key); ?> */ ?>
                                                </td>
                                                <td>
                                                    <?php if($value != null): ?>
                                                        <?php /* General Information */ ?>
                                                        <?php if($key == 'GENERAL_INFORMATION_DONOR' && $value == 'international'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.international')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_DONOR' && $value == 'local'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.local')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_DONOR' && $value == 'state'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.state')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FAITH' && $value == 'faith_based'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.faith_based')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FAITH' && $value == 'nonfaith_based'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.nonfaith_based')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_TYPE_FACILITY' && $value == 'residental_care'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.residental_care')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_TYPE_FACILITY' && $value == 'transit_home'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.transit_home')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_LICENSE_MOSVY' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_LICENSE_MOSVY' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_LICENSE_OTHERS' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_LICENSE_OTHERS' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_MOU_MOSVY' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_MOU_MOSVY' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_MOU_MINISTRIES' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_MOU_MINISTRIES' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_SERVICE_OUTSIDE_CENTER' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_SERVICE_OUTSIDE_CENTER' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FOSTER_CARE' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FOSTER_CARE' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_KINSHIP_CARE' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_KINSHIP_CARE' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_GROUPHOME_CARE' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_GROUPHOME_CARE' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_INDEPENDENT_CARE' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_INDEPENDENT_CARE' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_RELIGIOUS_CARE' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_RELIGIOUS_CARE' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_OUTSIDE_SERVICE' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_OUTSIDE_SERVICE' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_HAVE_BUDGET' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_HAVE_BUDGET' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FUTURE_PLAN' && $value == 'closure'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.closure')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FUTURE_PLAN' && $value == 'transition'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.transition')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FUTURE_PLAN' && $value == 'support_reintegration'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.support_reintegration')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FUTURE_PLAN' && $value == 'same'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.same')); ?></label>
                                                        <?php elseif($key == 'GENERAL_INFORMATION_FUTURE_PLAN' && $value == 'none'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.none')); ?></label>

                                                        <?php /* Section B */ ?>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_1' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_1_1_1')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_1_1_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_3' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_4' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_1_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_2' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_2_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_2_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_2' && $value == '0.0001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_2_00001')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_3' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_3_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_3_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_5_1' && $value == '2'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_5_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_5_2' && $value == '2'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_5_2_2')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_5_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_5_2_1')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_5_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_5_2_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_6' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_6_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_6' && $value == '2_allow'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_6_2_allow')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_6' && $value == '2_budget'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_6_2_budget')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_6' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_6_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_7' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_7_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_7' && $value == '2_studytour'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_6_2_allow')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_7' && $value == '2_visit'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_7_2_visit')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_7' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_7_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_12' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_12_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_12' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_12_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_14' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_14_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_14' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_14_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_15' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_15_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_15' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_15_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_1' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_1' && $value == '100'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_100')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_2' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_2' && $value == '100'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_100')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_3' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_3' && $value == '100'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_100')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_4' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_16_4' && $value == '100'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_16_100')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_19' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_19_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_I_1_19' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.1_19_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_TOURIST' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.tourist_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_TOURIST' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.tourist_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_AUTHORIZED_LETTER' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_AUTHORIZED_LETTER' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_ENROLLMENT_AGE' && $value == '-4.76'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entrollment_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_ENROLLMENT_AGE' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entrollment_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_HAVING_DROP' && $value == '-4.76'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.dropout_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_HAVING_DROP' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.dropout_0')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_STUDY_SKILLS' && $value == '-4.76'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.skills_4')); ?></label>
                                                        <?php elseif($key == 'SECTION_B_STUDY_SKILLS' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.skills_0')); ?></label>

                                                        <?php /* 5 Children */ ?>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_1' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_3' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_4' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_22_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_C1_SICKNESS_TREATMENT' && $value == '4_out'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_out')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_C1_SICKNESS_TREATMENT' && $value == '4_in'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_in')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_C1_SICKNESS_TREATMENT' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_26' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_26' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_28' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_28' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_31_1' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_31_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_31_1' && $value == '0.00001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_00001')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_31_2' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_yes')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_II_C1_2_31_2' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_no')); ?></label>

                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_1' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_3' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_4' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_22_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_C2_SICKNESS_TREATMENT' && $value == '4_out'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_out')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_C2_SICKNESS_TREATMENT' && $value == '4_in'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_in')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_1_C2_SICKNESS_TREATMENT' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_26' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_26' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_28' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_28' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_31_1' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_31_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_31_1' && $value == '0.00001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_00001')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_31_2' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_yes')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_2_II_C2_2_31_2' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_no')); ?></label>

                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_1' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_3' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_4' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_22_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_C3_SICKNESS_TREATMENT' && $value == '4_out'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_out')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_C3_SICKNESS_TREATMENT' && $value == '4_in'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_in')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_C3_SICKNESS_TREATMENT' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_26' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_26' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_28' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_28' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_31_1' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_31_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_31_1' && $value == '0.00001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_00001')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_31_2' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_yes')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_3_II_C3_2_31_2' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_no')); ?></label>

                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_1' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_3' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_4' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_22_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_C4_SICKNESS_TREATMENT' && $value == '4_out'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_out')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_C4_SICKNESS_TREATMENT' && $value == '4_in'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_in')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_C4_SICKNESS_TREATMENT' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_26' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_26' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_28' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_28' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_31_1' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_31_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_31_1' && $value == '0.00001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_00001')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_31_2' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_yes')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_4_II_C4_2_31_2' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_no')); ?></label>

                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_1' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_2' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_2' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_2_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_3' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_3' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_3_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_4' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_1')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_22_4' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_22_4_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_C5_SICKNESS_TREATMENT' && $value == '4_out'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_out')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_C5_SICKNESS_TREATMENT' && $value == '4_in'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_4_in')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_C5_SICKNESS_TREATMENT' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.sickness_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_26' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_26' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_26_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_28' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_28' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_28_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_31_1' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_4')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_31_1' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_0')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_31_1' && $value == '0.00001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_1_00001')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_31_2' && $value == 'yes'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_yes')); ?></label>
                                                        <?php elseif($key == 'CHILDREN_5_II_C5_2_31_2' && $value == 'no'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.2_31_2_no')); ?></label>

                                                        <?php /* Observations */ ?>
                                                        <?php elseif($key == 'OBSERVATION_WATER_SANITATION' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.water_sanitation_0')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_WATER_SANITATION' && $value == '2'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.water_sanitation_2')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_WATER_SANITATION' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.water_sanitation_4')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_33' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_33_4')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_33' && $value == '2'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_33_0')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_36' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_36_4')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_36' && $value == '1'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_36_0')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_37' && $value == '4_private'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_private')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_37' && $value == '4_center'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_center')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_37' && $value == '4_state'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_state')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_37' && $value == '1_renting'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_renting')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_38' && $value == '4_private'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_private')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_38' && $value == '4_center'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_center')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_38' && $value == '4_state'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_state')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_38' && $value == '1_renting'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_37_renting')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_42' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_42_4')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_42' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_42_0')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_44' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_44_4')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_44' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_44_0')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_III_3_46' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_46_4')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_46' && $value == '2'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_46_2')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_46' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_46_0')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_III_3_46' && $value == '0.00001'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.3_46_00001')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_COMPLAINT_BOX' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_COMPLAINT_BOX' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>

                                                        <?php elseif($key == 'OBSERVATION_ENTRANCE_EXIT' && $value == '4'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_yes')); ?></label>
                                                        <?php elseif($key == 'OBSERVATION_ENTRANCE_EXIT' && $value == '0'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.yes_no_no')); ?></label>

                                                        <?php /* Show Cal Dimension in number */ ?>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_1_CAL_FOOD'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_2_CAL_HEALTH'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_3_CAL_ENTERTAINMENT'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_4_CAL_EDUCATION'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_5_CAL_FREEDOM'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_6_CAL_EQUIPMENT'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_7_CAL_FACILITY'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'RESULT_DIMENSTION_8_CAL_MANAGEMENT'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>
                                                        <?php elseif($key == 'WHOLE_CENTER_CAL_WHOLE'): ?>
                                                            <label for="field" style="font-weight: bold;"><?php echo e(number_format((float)$value, 2)); ?></label>

                                                        <?php else: ?>
                                                            <?php echo e($value); ?>

                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php /* Showing Recommedations for each result */ ?>
                                                    <?php if($value == '1.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_result_1_1_1')); ?></label>
                                                    <?php elseif($value == '1.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_result_1_1_2')); ?></label>
                                                    <?php elseif($value == '1.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_result_1_1_3')); ?></label>
                                                    <?php elseif($value == '1.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_result_1_1_4')); ?></label>
                                                    <?php elseif($value == '1.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_result_1_1_5')); ?></label>
                                                    <?php elseif($value == '2.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_result_2_1_1')); ?></label>
                                                    <?php elseif($value == '2.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_result_2_1_2')); ?></label>
                                                    <?php elseif($value == '2.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_result_2_1_3')); ?></label>
                                                    <?php elseif($value == '2.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_result_2_1_4')); ?></label>
                                                    <?php elseif($value == '2.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_result_2_1_5')); ?></label>
                                                    <?php elseif($value == '3.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_result_3_1_1')); ?></label>
                                                    <?php elseif($value == '3.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_result_3_1_2')); ?></label>
                                                    <?php elseif($value == '3.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_result_3_1_3')); ?></label>
                                                    <?php elseif($value == '3.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_result_3_1_4')); ?></label>
                                                    <?php elseif($value == '3.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_result_3_1_5')); ?></label>
                                                    <?php elseif($value == '4.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_result_4_1_1')); ?></label>
                                                    <?php elseif($value == '4.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_result_4_1_2')); ?></label>
                                                    <?php elseif($value == '4.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_result_4_1_3')); ?></label>
                                                    <?php elseif($value == '4.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_result_4_1_4')); ?></label>
                                                    <?php elseif($value == '4.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_result_4_1_5')); ?></label>
                                                    <?php elseif($value == '5.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_result_5_1_1')); ?></label>
                                                    <?php elseif($value == '5.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_result_5_1_2')); ?></label>
                                                    <?php elseif($value == '5.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_result_5_1_3')); ?></label>
                                                    <?php elseif($value == '5.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_result_5_1_4')); ?></label>
                                                    <?php elseif($value == '5.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_result_5_1_5')); ?></label>
                                                    <?php elseif($value == '6.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_result_6_1_1')); ?></label>
                                                    <?php elseif($value == '6.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_result_6_1_2')); ?></label>
                                                    <?php elseif($value == '6.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_result_6_1_3')); ?></label>
                                                    <?php elseif($value == '6.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_result_6_1_4')); ?></label>
                                                    <?php elseif($value == '6.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_result_6_1_5')); ?></label>
                                                    <?php elseif($value == '7.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_result_7_1_1')); ?></label>
                                                    <?php elseif($value == '7.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_result_7_1_2')); ?></label>
                                                    <?php elseif($value == '7.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_result_7_1_3')); ?></label>
                                                    <?php elseif($value == '7.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_result_7_1_4')); ?></label>
                                                    <?php elseif($value == '7.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_result_7_1_5')); ?></label>
                                                    <?php elseif($value == '8.1.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_result_8_1_1')); ?></label>
                                                    <?php elseif($value == '8.1.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_result_8_1_2')); ?></label>
                                                    <?php elseif($value == '8.1.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_result_8_1_3')); ?></label>
                                                    <?php elseif($value == '8.1.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_result_8_1_4')); ?></label>
                                                    <?php elseif($value == '8.1.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_result_8_1_5')); ?></label>

                                                    <?php /* Showing Recommedations for Dimension and Gap Standard */ ?>

                                                    <?php elseif($value == '1.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_re_1_2_0')); ?></label>
                                                    <?php elseif($value == '1.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_re_1_2_1')); ?></label>
                                                    <?php elseif($value == '1.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_re_1_2_2')); ?></label>
                                                    <?php elseif($value == '1.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_re_1_2_3')); ?></label>
                                                    <?php elseif($value == '1.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_gap_1_3_1')); ?></label>
                                                    <?php elseif($value == '1.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_gap_1_3_2')); ?></label>
                                                    <?php elseif($value == '1.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_gap_1_3_3')); ?></label>
                                                    <?php elseif($value == '1.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_gap_1_3_4')); ?></label>
                                                    <?php elseif($value == '1.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.food_gap_1_3_5')); ?></label>

                                                    <?php elseif($value == '2.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_0')); ?></label>
                                                    <?php elseif($value == '2.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_1')); ?></label>
                                                    <?php elseif($value == '2.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_2')); ?></label>
                                                    <?php elseif($value == '2.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_3')); ?></label>
                                                    <?php elseif($value == '2.2.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_4')); ?></label>
                                                    <?php elseif($value == '2.2.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_5')); ?></label>
                                                    <?php elseif($value == '2.2.6'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_6')); ?></label>
                                                    <?php elseif($value == '2.2.7'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_re_2_2_7')); ?></label>
                                                    <?php elseif($value == '2.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_gap_2_3_1')); ?></label>
                                                    <?php elseif($value == '2.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_gap_2_3_2')); ?></label>
                                                    <?php elseif($value == '2.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_gap_2_3_3')); ?></label>
                                                    <?php elseif($value == '2.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_gap_2_3_4')); ?></label>
                                                    <?php elseif($value == '2.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.health_gap_2_3_5')); ?></label>

                                                    <?php elseif($value == '3.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_re_3_2_0')); ?></label>
                                                    <?php elseif($value == '3.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_re_3_2_1')); ?></label>
                                                    <?php elseif($value == '3.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_re_3_2_2')); ?></label>
                                                    <?php elseif($value == '3.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_re_3_2_3')); ?></label>
                                                    <?php elseif($value == '3.2.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_re_3_2_4')); ?></label>
                                                    <?php elseif($value == '3.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_gap_3_3_1')); ?></label>
                                                    <?php elseif($value == '3.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_gap_3_3_2')); ?></label>
                                                    <?php elseif($value == '3.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_gap_3_3_3')); ?></label>
                                                    <?php elseif($value == '3.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_gap_3_3_4')); ?></label>
                                                    <?php elseif($value == '3.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.entertainment_gap_3_3_5')); ?></label>

                                                    <?php elseif($value == '4.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_0')); ?></label>
                                                    <?php elseif($value == '4.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_1')); ?></label>
                                                    <?php elseif($value == '4.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_2')); ?></label>
                                                    <?php elseif($value == '4.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_3')); ?></label>
                                                    <?php elseif($value == '4.2.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_4')); ?></label>
                                                    <?php elseif($value == '4.2.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_5')); ?></label>
                                                    <?php elseif($value == '4.2.6'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_6')); ?></label>
                                                    <?php elseif($value == '4.2.7'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_re_4_2_7')); ?></label>
                                                    <?php elseif($value == '4.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_gap_4_3_1')); ?></label>
                                                    <?php elseif($value == '4.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_gap_4_3_2')); ?></label>
                                                    <?php elseif($value == '4.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_gap_4_3_3')); ?></label>
                                                    <?php elseif($value == '4.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_gap_4_3_4')); ?></label>
                                                    <?php elseif($value == '4.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.education_gap_4_3_5')); ?></label>

                                                    <?php elseif($value == '5.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_re_5_2_0')); ?></label>
                                                    <?php elseif($value == '5.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_re_5_2_1')); ?></label>
                                                    <?php elseif($value == '5.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_re_5_2_2')); ?></label>
                                                    <?php elseif($value == '5.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_re_5_2_3')); ?></label>
                                                    <?php elseif($value == '5.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_gap_5_3_1')); ?></label>
                                                    <?php elseif($value == '5.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_gap_5_3_2')); ?></label>
                                                    <?php elseif($value == '5.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_gap_5_3_3')); ?></label>
                                                    <?php elseif($value == '5.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_gap_5_3_4')); ?></label>
                                                    <?php elseif($value == '5.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.freedom_gap_5_3_5')); ?></label>

                                                    <?php elseif($value == '6.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_re_6_2_0')); ?></label>
                                                    <?php elseif($value == '6.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_re_6_2_1')); ?></label>
                                                    <?php elseif($value == '6.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_re_6_2_2')); ?></label>
                                                    <?php elseif($value == '6.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_gap_6_3_1')); ?></label>
                                                    <?php elseif($value == '6.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_gap_6_3_2')); ?></label>
                                                    <?php elseif($value == '6.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_gap_6_3_3')); ?></label>
                                                    <?php elseif($value == '6.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_gap_6_3_4')); ?></label>
                                                    <?php elseif($value == '6.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.equipment_gap_6_3_5')); ?></label>

                                                    <?php elseif($value == '7.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_0')); ?></label>
                                                    <?php elseif($value == '7.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_1')); ?></label>
                                                    <?php elseif($value == '7.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_2')); ?></label>
                                                    <?php elseif($value == '7.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_3')); ?></label>
                                                    <?php elseif($value == '7.2.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_4')); ?></label>
                                                    <?php elseif($value == '7.2.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_5')); ?></label>
                                                    <?php elseif($value == '7.2.6'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_re_7_2_6')); ?></label>
                                                    <?php elseif($value == '7.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_gap_7_3_1')); ?></label>
                                                    <?php elseif($value == '7.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_gap_7_3_2')); ?></label>
                                                    <?php elseif($value == '7.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_gap_7_3_3')); ?></label>
                                                    <?php elseif($value == '7.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_gap_7_3_4')); ?></label>
                                                    <?php elseif($value == '7.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.facility_gap_7_3_5')); ?></label>

                                                    <?php elseif($value == '8.2.0'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_0')); ?></label>
                                                    <?php elseif($value == '8.2.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_1')); ?></label>
                                                    <?php elseif($value == '8.2.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_2')); ?></label>
                                                    <?php elseif($value == '8.2.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_3')); ?></label>
                                                    <?php elseif($value == '8.2.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_4')); ?></label>
                                                    <?php elseif($value == '8.2.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_5')); ?></label>
                                                    <?php elseif($value == '8.2.6'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_6')); ?></label>
                                                    <?php elseif($value == '8.2.7'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_7')); ?></label>
                                                    <?php elseif($value == '8.2.8'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_8')); ?></label>
                                                    <?php elseif($value == '8.2.9'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_9')); ?></label>
                                                    <?php elseif($value == '8.2.10'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_10')); ?></label>
                                                    <?php elseif($value == '8.2.11'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_re_8_2_11')); ?></label>
                                                    <?php elseif($value == '8.3.1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_gap_8_3_1')); ?></label>
                                                    <?php elseif($value == '8.3.2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_gap_8_3_2')); ?></label>
                                                    <?php elseif($value == '8.3.3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_gap_8_3_3')); ?></label>
                                                    <?php elseif($value == '8.3.4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_gap_8_3_4')); ?></label>
                                                    <?php elseif($value == '8.3.5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.management_gap_8_3_5')); ?></label>

                                                    <?php /* Whole Center Percentage */ ?>
                                                    <?php elseif($key == 'WHOLE_CENTER_CAL_WHOLE_PERCENT' && (int)$value < 30): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.whole_percent_30')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CAL_WHOLE_PERCENT' && (int)$value >= 30 && (int)$value < 50): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.whole_percent_30_and_50')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CAL_WHOLE_PERCENT' && (int)$value >= 50 && (int)$value < 60): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.whole_percent_50_and_60')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CAL_WHOLE_PERCENT' && (int)$value >= 60 && (int)$value < 80): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.whole_percent_60_and_80')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CAL_WHOLE_PERCENT' && (int)$value >= 80): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.whole_percent_80')); ?></label>

                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_1')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_2')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_3')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_4')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '5'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_5')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '6'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_6')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_1' && $value == '7'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_7')); ?></label>

                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_TIME' && $value == '1'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_time_1')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_TIME' && $value == '2'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_time_2')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_TIME' && $value == '3'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_time_3')); ?></label>
                                                    <?php elseif($key == 'WHOLE_CENTER_CONCLUSION_TIME' && $value == '4'): ?>
                                                        <label for="field" style="font-weight: bold;"><?php echo e(trans('detail-fields.conclusion_time_4')); ?></label>








                                                    <?php else: ?>
                                                        <label for="field" style="font-weight: bold;">-</label>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function addCss(myForm, fileName) {
        var link = document.createElement('link');

        link.type = 'text/css';
        link.rel = 'stylesheet';
        link.href = fileName;

        myForm.document.head.appendChild(link);
    }

    function print() {
        var printForm = window.open('', '_blank');

        var css = '#header-label { font-size:13px !important;} #entityCompared { width:490px; } #pointer { padding-bottom:5px }',
        style = document.createElement('style');

        style.type = 'text/css';
        if (style.styleSheet){
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }

        printForm.document.head.appendChild(style);

        addCss(printForm, '<?php echo asset("css/font-awesome.min.css") ?>');

        addCss(printForm, '<?php echo asset("css/bootstrap.min.css") ?>');

        addCss(printForm, '<?php echo asset("css/custom_style.css") ?>');

        var schoolHTML = document.getElementById("mainEntityCompared").innerHTML;

        var $title = '<h3 style="text-align:center;font-size:25px;margin-bottom:25px"><?php echo e(trans('information_content.report-compare-title')); ?></h3>\n';
        $title += schoolHTML;
        printForm.document.body.innerHTML = $title;

        setTimeout(function () {
            // Automatic Open Print Diaglog
            printForm.print();

            // Close Windows after print completed
            // printForm.close();
        }, 600);


        // printForm.close();
    }
</script>
