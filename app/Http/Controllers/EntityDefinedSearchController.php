<?php

namespace MONITORING\Http\Controllers;

use Illuminate\Http\Request;
use MONITORING\Http\Requests;
use MONITORING\Http\Controllers\Controller;
use DB;
use MONITORING\Table;

class EntityDefinedSearchController extends Controller {

    public function index() {
        $tables = Table::all(['id', 'TableName', 'TableCorespondingName']);
        for ($i = 0; $i < count($tables); $i++) {
            $tables[$i]->asset = DB::table('entitydefinedfield')
                    ->leftJoin('entitydefinedfieldlist', 'entitydefinedfield.EntityDefinedFieldListCode', '=', 'entitydefinedfieldlist.EntityDefinedFieldListCode')
                    ->select('entitydefinedfieldlist.EntityDefinedFiledListName', 'entitydefinedfield.EntityDefinedFieldNameInTable', 'entitydefinedfieldlist.EntityDefinedFieldListCategory', 'entitydefinedfieldlist.LanguageID')
                    ->orderBy('entitydefinedfieldlist.EntityDefinedFieldListCategory')
                    ->where('entitydefinedfield.TableID', '=', $tables[$i]->id)
                    ->where('entitydefinedfieldlist.LanguageID','=',2)
                    ->get();
        }
        return response()
                        ->view('content.system.entity_defined_field_search', ['tabledetails' => $tables]);
    }

}
