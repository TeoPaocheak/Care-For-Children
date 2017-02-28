<?php

namespace MONITORING\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use League\Flysystem\Exception;
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

      $national_sql = <<<EOT
        SELECT
            SUM(t.INSP1) as total_inspect_once,
            SUM(t.INSP2) as total_inspect_twice,
            (
                select count(b.id)
                from baseline b
            ) as total_centers
        FROM
            (
                select
                    (
                        CASE WHEN COUNT(o.EDF_CODE) >= 2 THEN 1 ELSE 0 END
                    ) as INSP2,
                    (
                        CASE WHEN COUNT(o.EDF_CODE) = 1 THEN 1 ELSE 0 END
                    ) as INSP1

                from orphanage_lists o
                where YEAR(o.Inspected_date) = ?
                GROUP BY o.EDF_CODE
            ) as t;
EOT;
      try {
        $result = DB::select($national_sql, array($year));

        $total = $result[0]->total_centers;
        $insp1 = $result[0]->total_inspect_once;
        $insp2 = $result[0]->total_inspect_twice;

        $inspect1 = ($insp1 == 0 ? 0 : $insp1 * 100 / $total);
        $inspect2 = ($insp2 == 0 ? 0 : $insp2 * 100 / $total);

        $data = ['RCI_Inspect1' => number_format($inspect1, 1), 'RCI_Inspect2' => number_format($inspect2, 1)];

        return Response::json(array(
          'error' => false,
          'data' => $data,
          'status_code' => 200
        ));
      }catch (Exception $e){
        return Response::json(array(
          'error' => true,
          'data' => null,
          'status_code' => $e->getCode()
        ));
      }

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

      $national_sql = <<<EOT
        SELECT
        	t.INSP1 as total_inspect_once,
        	t.INSP2 as total_inspect_twice,
        	(
        		t.total_children - (t.INSP1 + t.INSP2)
        	) as total_not_inspected_children
        FROM
        	(
        		select
        			(
        				SELECT
        					IFNULL(SUM(INSP2.dd), 0)
        				FROM
        					(
        						SELECT
        							SUM(
        								o.GENERAL_INFORMATION_TOTAL_ZERO_SEVENTEEN + o.GENERAL_INFORMATION_TOTAL_EIGHTEEN_OVER
        							) dd
        						FROM
        							orphanage_lists o
        						WHERE
        							YEAR(o.Inspected_date) = ?
        						GROUP BY
        							o.PROVINCE_CODE, o.EDF_CODE
        						HAVING COUNT(o.EDF_CODE) >= 2) INSP2
        			) as INSP2 ,
        			(
        				SELECT
        					IFNULL(SUM(INSP1.dd), 0)
        				FROM
        					(
        						SELECT
        							SUM(
        								o.GENERAL_INFORMATION_TOTAL_ZERO_SEVENTEEN + o.GENERAL_INFORMATION_TOTAL_EIGHTEEN_OVER
        							) dd
        						FROM
        							orphanage_lists o
        						WHERE
        							YEAR(o.Inspected_date) = ?
        						GROUP BY
        							o.PROVINCE_CODE, o.EDF_CODE
        						HAVING COUNT(o.EDF_CODE) = 1) INSP1


        			) as INSP1,

        			(
        				select
        					sum(b.children_total)
        				from
        					baseline b
        			) as total_children

        	) as t;
EOT;

      try {
        $result = DB::select($national_sql, array($year, $year));

        $total = $result[0]->total_not_inspected_children;
        $insp1 = $result[0]->total_inspect_once;
        $insp2 = $result[0]->total_inspect_twice;

        $inspect1 = ($insp1 == 0 ? 0 : $insp1 * 100 / $total);
        $inspect2 = ($insp2 == 0 ? 0 : $insp2 * 100 / $total);

        $data = ['Children_Inspect1' => number_format($inspect1, 1), 'Children_Inspect2' => number_format($inspect2, 1)];

        return Response::json(array(
          'error' => false,
          'data' => $data,
          'status_code' => 200
        ));

      }catch (Exception $e){
        return Response::json(array(
          'error' => true,
          'data' => null,
          'status_code' => $e->getCode()
        ));
      }
    }

}
