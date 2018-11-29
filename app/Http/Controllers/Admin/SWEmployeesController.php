<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\SWEmployees\StoreUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\SWEmployeesModel;
use App\Models\Admin\EmployeesModel;
use App\Models\Admin\AreasModel;
use App\Models\Admin\WorkingDaysModel;
use App\Models\Admin\JobTitlesModel;
use App\Models\Admin\BanksModel;
use App\Models\Admin\QualificationsModel;
use PDF;
use Auth;

class SWEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SWEmployees = SWEmployeesModel::getActiveOnly();
        return view('admin.swemployees.index', compact('SWEmployees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Employees = EmployeesModel::pluckActiveOnly();
        $Employees->prepend('Select an Employee', '');
        $Areas = AreasModel::pluckActiveOnly();
        $Areas->prepend('Select an Area', '');
        $Days = WorkingDaysModel::pluckActiveOnly();
        $Days->prepend('Select a Day', '');
        return view('admin.swemployees.create', compact('Employees', 'Areas', 'Days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRequest $request)
    {
        $data = $request->all();
        
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = \Carbon\Carbon::now();

        SWEmployeesModel::create($data);

        return redirect()->route('admin.swemployees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $SWEmployee = SWEmployeesModel::findOrFail($id);
        $Employees = EmployeesModel::pluckActiveOnly();
        $Employees->prepend('Select an Employee', '');
        $Areas = AreasModel::pluckActiveOnly();
        $Areas->prepend('Select an Area', '');
        $Days = WorkingDaysModel::pluckActiveOnly();
        $Days->prepend('Select a Day', '');
        return view('admin.swemployees.edit', compact('Employees', 'Areas', 'Days', 'SWEmployee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        $SWEmployee = SWEmployeesModel::findOrFail($id);

        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();

        $SWEmployee->update($data);

        return redirect()->route('admin.swemployees.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $EmployeeModel = SWEmployeesModel::findOrFail($id);
        $EmployeeModel->update(['deleted_by' => Auth::user()->id]);
        $EmployeeModel->delete();        
        return redirect()->route('admin.swemployees.index');

    }

}
