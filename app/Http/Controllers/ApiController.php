<?php

namespace MONITORING\Http\Controllers;

use MONITORING\Http\Requests\Request;
use MONITORING\Http\Controllers\Controller;
use Carbon\Carbon;
use MONITORING\Province;
use Response;

class ApiController extends Controller
{
    //

    /**
    *  @year allow null which use current year
    *  return percent of RCI Inspected Once/Twice
    **/
    public function RCIInspected($year=null){

        $data = '';
     
        if (empty($year)){
            $year = Carbon::now()->year;
        }
        $data = Province::all();
         return Response::json(array(
            'error' => false,
            'data' => $data,
            'status_code' => 200
        ));

    }


    /**
    *  @year allow null which use current year
    *  return percent of Children RCI Inspected Once/Twice
    **/
    public function ChildrenInspected($year=null){
        $data = '';
        
        if (empty($year)){
           $year = Carbon::now()->year;
        }
        $data = Province::all();
        return Response::json(array(
            'error' => false,
            'data' => $data,
            'status_code' => 200
        ));
    }




}
