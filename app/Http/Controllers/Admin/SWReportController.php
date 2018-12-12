<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SWEmployeesModel;
use App\Http\Requests\Admin\SWReports\StoreUpdateRequest;
use App\Models\Helpers\TimeAndDaysModel;

class SWReportController extends Controller
{
     /**
     * Display a listing of Reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // if (! Gate::allows('attendance_report_manage')) {
        //     return abort(401);
        // }

        $Employees = SWEmployeesModel::pluckActiveOnly();

        if($Employees){
            foreach(array_keys($Employees->all()) as $key){
                $Employees[$key] = SWEmployeesModel::findOrFail($key)->employee->name;
            }
        }

        return view('admin.swreports.index', compact('Employees'));

    }

    public function fetchFilterRecord(StoreUpdateRequest $request){

        // if (! Gate::allows('attendance_report_manage')) {
        //     return abort(401);
        // }

        $data = $request->all();
        if(strlen($data['month']) == 1){
            $data['month'] = '0'.$data['month'];
        }

        $Employees = SWEmployeesModel::pluckActiveOnly();
        if($Employees){
            foreach(array_keys($Employees->all()) as $key){
                $Employees[$key] = SWEmployeesModel::findOrFail($key)->employee->name;
            }
        }

        $data['year'] = '20'.$data['year'];
        $swemployee = SWEmployeesModel::getSWEmployeeByEmployeeId($data['employee_id']);
        $Reports = [];

        if($swemployee){
            $dates_and_days = TimeAndDaysModel::getDatesAndDaysByMonthYearAndDay($data['month'], $data['year'], $swemployee->working_day->id);
            $Reports['dates'] = $dates_and_days;
            $Reports['day'] = $swemployee->working_day->name;
            $Reports['month'] = intval($data['month']);
            $Reports['year'] = $data['year'];
            foreach($swemployee->areas as $area){
                // $Reports['areas'][$area->id] = $area->name;
                $Reports['donars'][$area->name] = $area->swdonars->all();
            }
        }
        $Reports['employee'] = $swemployee->employee;

        return view('admin.swreports.index', compact('Employees', 'Reports'));
    }
}
