<?php

namespace MONITORING\Http\Controllers;
use Illuminate\Http\Request;
use MONITORING\Http\Requests;
use MONITORING\Http\Controllers\Controller;
use MONITORING\Province;
use MONITORING\Condition;
use MONITORING\EntityDefinedFieldSearchValue;
use MONITORING\EntityDefinedFieldCondition;
use DB;

class AggregateController extends Controller
{
    public function index(Request $request) {
        // show the entity information related to condition
        //$data = $request->input('key');
        $table = DB::table('table')->where('TableName', $request->input('table_name'))->first();
        $gp_type = $request->input('gp_type');
        $conditions = json_decode($request->input('data'));
        $selections = json_decode($request->input('selections'));
        $db = DB::table($request->input('table_name'));
        $db->select(DB::raw("EDF_CODE,".implode(",", $selections)));
        switch ($gp_type) {
            case 'province':
                $db->where("PROVINCE_CODE", $request->input('gp_province'));
                break;
            case 'district':
                $db->where("DISTRICT_CODE", $request->input('gp_district'));
                break;
            case 'commune':
                $db->where("COMMUNE_CODE", $request->input('gp_commune'));
                break;
            case 'village':
                $db->where("VILLAGE_CODE", $request->input('gp_village'));
                break;
            default :break;
        }
        if (count($conditions) > 0) {
            $conditions[0]->conjunction = "AND";
        }
        for ($i = 0; $i < count($conditions); $i++) {
            if (strlen($conditions[$i]->keyValue) !== 0 && strlen($conditions[$i]->condition) !== 0 && strlen($conditions[$i]->value) !== 0) {
                if (strcmp($conditions[$i]->conjunction, "AND") === 0) {
                    $db->where($conditions[$i]->keyValue, $conditions[$i]->condition, $conditions[$i]->value);
                } else {
                    $db->orWhere($conditions[$i]->keyValue, $conditions[$i]->condition, $conditions[$i]->value);
                }
            }
        }
        //$db->groupBy('EDF_CODE');
        //echo $db->toSql();
        //select column header 

        $col_header = DB::table('entitydefinedfieldwithlistfull')
                ->select('EntityDefinedFieldListName')
                ->whereIn('EntityDefinedFieldNameInTable', $selections)
                ->where('LanguageID', 1)
                ->orderBy('EntityDefinedCategoryCode', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        return response()
                        ->view('content.monitor.information-result', ['col_headers' => $col_header, 'rows' => $db->get(), 'table' => $table]);
    }

    
    public function show($tableID) { // show category
        // get province code
        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->get();
        $conditions = Condition::where('LanguageID', 1)->get();
        // get category
        $table = DB::table('table')
                        ->where('id', $tableID)->first();
        $categories = DB::table('entitydefinedfieldwithlistfull')
                ->where([['LanguageID', 1], ['TableID', $tableID]])
                ->groupBy('EntityDefinedCategoryName')
                ->orderBy('EntityDefinedCategoryCode', 'asc')
                ->get();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]->fields = DB::table('entitydefinedfieldwithlistfull')
                    ->where([['LanguageID', 1], ['TableID', $tableID], ['EntityDefinedCategoryName', $categories[$i]->EntityDefinedCategoryName]])
                    ->get();
        }
//        get list of field related to each 
        $fields = DB::table('entitydefinedfieldwithlistfull')
                ->where([['LanguageID', 1], ['TableID', $tableID]])
                ->orderBy('EntityDefinedFieldListCode', 'asc')
                ->get();
        return response()
                        ->view('content.monitor.aggregate', ['table' => $table->TableName, 'provinces' => $provinces, 'conditions' => $conditions, 'categories' => $categories, 'fields' => $fields]);
    }
}
