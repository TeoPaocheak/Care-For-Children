<?php

namespace MONITORING\Http\Controllers;

use Illuminate\Http\Request;
use MONITORING\Http\Requests;
use Auth;
use View;
use User;
use MONITORING\Province;
use MONITORING\District;
use DB;

class InspectController extends Controller
{
    private $language_id;
    private $user_role_level;

    public function __construct() {
        if (session()->has('locale')) {
            if (session()->get('locale') == 'km') {
                $this->language_id = 2;
            } elseif (session()->get('locale') == 'en') {
                $this->language_id = 1;
            }
        } else {
            $this->language_id = 2;
        }

        if (Auth::check()) {
            $this->user_role_level = Auth::user()->role->level;
        }
    }

    public function index() {
        switch ($this->user_role_level){
            case 1:
            case 2:
                // get province code
                if ($this->language_id == 1) {
                    $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->get();
                    $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->get();
                } elseif ($this->language_id == 2) {
                    $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->get();
                    $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->get();
                }
                break;
            case 3:
                // get province code
                if (Auth::check()) {
                    if ($this->language_id == 1) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->where('PROCODE','=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->where('PCode','=', $provinces->first()->ProvinceCode)->get();
                    } elseif ($this->language_id == 2) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->where('PROCODE','=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->where('PCode','=', $provinces->first()->ProvinceCode)->get();
                    }
                }
                break;
            case 4:
                // get province code
                if (Auth::check()) {
                    if ($this->language_id == 1) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->where('PROCODE', '=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->where('DCode', '=', Auth::user()->district_code)->get();
                    } elseif ($this->language_id == 2) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->where('PROCODE', '=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->where('DCode', '=', Auth::user()->district_code)->get();
                    }
                }
                break;
            default: break;
        }

        return response()->view('content.inspection.inspection-charts', ['provinces' => $provinces, 'districts' => $districts]);
    }

    public function getChartResult(Request $request) {
        if ($request->input('selected_name') === 'district') {
            $param = 'd.DCode';
        } elseif ($request->input('selected_name') === 'province') {
            $param = 'd.PCode';
        } elseif ($request->input('selected_name') === 'national'){
            $param = 'national';
        }

        $sql = <<<EOT
        SELECT
            SUM(t.INSP1) as total_inspect_once ,
        	SUM(t.INSP2) as total_inspect_twice ,
        	(
        		select count(b.id)
        		from baseline b
        		INNER JOIN district d ON d.DCode = b.district_code
        		where $param = ?
        		GROUP BY $param
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

                from district d
                LEFT join orphanage_lists o
                on o.DISTRICT_CODE = d.DCode

                where $param = ? AND YEAR(o.Inspected_date) = ?
                group by d.DCode, o.EDF_CODE
            ) as t;
EOT;

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

        if ($request->input('selected_name') === 'district') {
            $results = DB::select($sql, array($request->input('district_code'), $request->input('district_code'), $request->input('inspected_date')));
        } elseif ($request->input('selected_name') === 'province') {
            $results = DB::select($sql, array($request->input('province_code'), $request->input('province_code'), $request->input('inspected_date')));
        } elseif ($request->input('selected_name') === 'national'){
            $results = DB::select($national_sql, array($request->input('inspected_date')));
        }

        return response($results, 200);
    }

    public function inspectTable() {
        switch ($this->user_role_level){
            case 1:
            case 2:
                // get province code
                if ($this->language_id == 1) {
                    $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->get();
                    $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->get();
                } elseif ($this->language_id == 2) {
                    $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->get();
                    $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->get();
                }
                break;
            case 3:
                // get province code
                if (Auth::check()) {
                    if ($this->language_id == 1) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->where('PROCODE','=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->where('PCode','=', $provinces->first()->ProvinceCode)->get();
                    } elseif ($this->language_id == 2) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->where('PROCODE','=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->where('PCode','=', $provinces->first()->ProvinceCode)->get();
                    }
                }
                break;
            case 4:
                // get province code
                if (Auth::check()) {
                    if ($this->language_id == 1) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->where('PROCODE', '=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->where('DCode', '=', Auth::user()->district_code)->get();
                    } elseif ($this->language_id == 2) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->where('PROCODE', '=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->where('DCode', '=', Auth::user()->district_code)->get();
                    }
                }
                break;
            default: break;
        }

        return response()->view('content.inspection.inspection-table', ['provinces' => $provinces, 'districts' => $districts]);
    }

    public function getTableResult(Request $request) {
        if ($this->language_id == 1) {
            $district_name = 'd.DName_en';
            $p_name = 'p.PROVINCE';
        } elseif ($this->language_id == 2) {
            $district_name = 'd.DName_kh';
            $p_name = 'p.PROVINCE_KH';
        }

        if ($request->input('selected_name') === 'district') {
            $param = 'd.DCode';
        } elseif ($request->input('selected_name') === 'province') {
            $param = 'd.PCode';
        } elseif ($request->input('selected_name') === 'national'){
            $param = 'national';
        }

        $sql = <<<EOT

        SELECT $district_name AS d_name , (CASE WHEN ISNULL(tmp.insp1) THEN 0 ELSE tmp.insp1 END) AS insp1, (CASE WHEN ISNULL(tmp.insp2) THEN 0 ELSE tmp.insp2 END) AS insp2, COUNT(DISTINCT b.id) as total_centers
        FROM district d
        LEFT JOIN baseline b ON b.district_code = d.DCode
        LEFT JOIN (SELECT o.DISTRICT_CODE, o.Inspected_date, CASE WHEN COUNT(o.EDF_CODE) = 1 THEN 1 ELSE 0 END AS insp1 ,
        CASE WHEN COUNT(o.EDF_CODE) >= 2 THEN 1 ELSE 0 END AS insp2 FROM orphanage_lists o GROUP BY o.DISTRICT_CODE, o.EDF_CODE ) tmp ON tmp.DISTRICT_CODE = d.DCode AND YEAR(tmp.Inspected_date) = ?

        WHERE $param = ? GROUP BY d.DCode

EOT;

        $national_sql = <<<EOT

        SELECT $p_name AS d_name, IFNULL(tmp.total_insp1,0) AS insp1, IFNULL(tmp.total_insp2,0) AS insp2, COUNT(DISTINCT b.id) as total_centers

        FROM province p
        LEFT JOIN baseline b ON b.province_code = p.PROCODE

        LEFT JOIN (
        		SELECT tt.PROVINCE_CODE, SUM(tt.insp1) as total_insp1, SUM(tt.insp2) as total_insp2, tt.Inspected_date as insp_date
        		FROM (
        			SELECT
        			o.PROVINCE_CODE,
        			o.Inspected_date,
        			(
        				CASE
        				WHEN COUNT(o.EDF_CODE) = 1 THEN
        					1
        				ELSE
        					0
        				END
        			) AS insp1 ,
        			(
        				CASE
        				WHEN COUNT(o.EDF_CODE) >= 2 THEN
        					1
        				ELSE
        					0
        				END
        			) AS insp2
        			FROM
        				orphanage_lists o
                    WHERE
                        YEAR(o.Inspected_date) = ?
        			GROUP BY
        				o.PROVINCE_CODE, o.EDF_CODE) as tt
        		GROUP BY tt.PROVINCE_CODE
        	) tmp ON tmp.PROVINCE_CODE = p.PROCODE


        GROUP BY p.PROCODE
EOT;

        if ($request->input('selected_name') === 'district') {
            $results = DB::select($sql, array($request->input('inspected_date'), $request->input('district_code')));
        } elseif ($request->input('selected_name') === 'province') {
            $results = DB::select($sql, array($request->input('inspected_date'), $request->input('province_code')));
        } elseif ($request->input('selected_name') === 'national'){
            $results = DB::select($national_sql, array($request->input('inspected_date')));
        }

        return response($results, 200);
    }

    public function inspectChildren() {
        switch ($this->user_role_level){
            case 1:
            case 2:
                // get province code
                if ($this->language_id == 1) {
                    $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->get();
                    $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->get();
                } elseif ($this->language_id == 2) {
                    $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->get();
                    $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->get();
                }
                break;
            case 3:
                // get province code
                if (Auth::check()) {
                    if ($this->language_id == 1) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->where('PROCODE','=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->where('PCode','=', $provinces->first()->ProvinceCode)->get();
                    } elseif ($this->language_id == 2) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->where('PROCODE','=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->where('PCode','=', $provinces->first()->ProvinceCode)->get();
                    }
                }
                break;
            case 4:
                // get province code
                if (Auth::check()) {
                    if ($this->language_id == 1) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE AS ProvinceName"))->where('PROCODE', '=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_en AS DistrictName"))->where('DCode', '=', Auth::user()->district_code)->get();
                    } elseif ($this->language_id == 2) {
                        $provinces = Province::select(DB::raw("PROCODE AS ProvinceCode, PROVINCE_KH AS ProvinceName"))->where('PROCODE', '=', Auth::user()->province_code)->get();
                        $districts = District::select(DB::raw("DCode AS DistrictCode, DName_kh AS DistrictName"))->where('DCode', '=', Auth::user()->district_code)->get();
                    }
                }
                break;
            default: break;
        }

        return response()->view('content.inspection.inspection-children', ['provinces' => $provinces, 'districts' => $districts]);
    }

    public function getChildrenResult(Request $request) {
        if ($request->input('selected_name') === 'district') {
            $param_1 = 'o.DISTRICT_CODE';
            $param_2 = 'b.district_code';
            $param_3 = 'd.DCode';
        } elseif ($request->input('selected_name') === 'province') {
            $param_1 = 'o.PROVINCE_CODE';
            $param_2 = 'b.province_code';
            $param_3 = 'd.PCode';
        } elseif ($request->input('selected_name') === 'national'){
            $param_1 = 'national';
            $param_2 = 'national';
            $param_3 = 'national';
        }

        $sql = <<<EOT

        SELECT
        	t.INSP1 as total_inspect_once ,
        	t.INSP2 as total_inspect_twice ,
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
        							$param_1 = ? AND YEAR(o.Inspected_date) = ?
        						GROUP BY
        							$param_1, o.EDF_CODE
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
        							$param_1 = ? AND YEAR(o.Inspected_date) = ?
        						GROUP BY
        							$param_1, o.EDF_CODE
        						HAVING COUNT(o.EDF_CODE) = 1) INSP1
        			) as INSP1,

        			(
        				select
        					sum(b.children_total)
        				from
        					baseline b
        				where
        					$param_2 = ?
        				GROUP BY
        					$param_2
        			) as total_children

        		from district d

        		where $param_3 = ?
        		group by $param_3) as t;

EOT;

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

        if ($request->input('selected_name') === 'district') {
            $results = DB::select($sql, array($request->input('district_code'), $request->input('inspected_date'),$request->input('district_code'), $request->input('inspected_date'), $request->input('district_code'), $request->input('district_code')));
        } elseif ($request->input('selected_name') === 'province') {
            $results = DB::select($sql, array($request->input('province_code'), $request->input('inspected_date'),$request->input('province_code'), $request->input('inspected_date'), $request->input('province_code'), $request->input('province_code')));
        } elseif ($request->input('selected_name') === 'national'){
            $results = DB::select($national_sql, array($request->input('inspected_date'), $request->input('inspected_date')));
        }

        return response($results, 200);
    }

    public function changeInspectionName(Request $request){

        $val = $request->input("val");

        if($val==="national")
          return response(trans('inspection.institution-province'),200);
        elseif ($val==="province")
          return response(trans('inspection.institution-district'),200);

        return response(trans('inspection.institution-province'),200);
    }

}
