<?php

namespace MONITORING;

use Illuminate\Database\Eloquent\Model;

class OrphanageList extends Model
{
    protected $table = 'orphanage_lists';

    protected $hidden = array('_URI', '_CREATOR_URI_USER', '_CREATION_DATE', '_LAST_UPDATE_URI_USER', '_LAST_UPDATE_DATE', '_MODEL_VERSION', '_UI_VERSION', '_IS_COMPLETE', '_SUBMISSION_DATE', '_MARKED_AS_COMPLETE_DATE', 'PROVINCE_CODE', 'DISTRICT_CODE', 'COMMUNE_CODE', 'VILLAGE_CODE', 'EDF_CODE', 'Inspected_date');
}
