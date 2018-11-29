<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Employees\StoreUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\EmployeesModel;
use App\Models\Admin\BranchesModel;
use App\Models\Admin\DepartmentsModel;
use App\Models\Admin\JobTitlesModel;
use App\Models\Admin\BanksModel;
use App\Models\Admin\QualificationsModel;
use PDF;
use Auth;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employees = EmployeesModel::getActiveOnly();
        return view('admin.employees.index', compact('Employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Branches = BranchesModel::pluckActiveOnly();
        $Branches->prepend('Select a Branch');
        $Departments = DepartmentsModel::pluckActiveOnly();
        $Departments->prepend('Select a Department');
        $JobTitles = JobTitlesModel::pluckActiveOnly();
        $JobTitles->prepend('Select a Designation');
        $Banks = BanksModel::pluckActiveOnly();
        $Banks->prepend('Select a Bank');
        $Qualifications = [];
        return view('admin.employees.create', compact('Branches', 'Departments', 'JobTitles', 'Banks', 'Qualifications'));
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

        $image_name = time().'_'.str_replace(' ', '_', str_replace(' ', '-', strtolower($data['image']->getClientOriginalName()) ) );
        $data['image_temp'] = $data['image'];
        $data['image'] = '\images\employees\\'.$image_name;

        $Employee = EmployeesModel::create($data);

        QualificationsModel::addBulkRecords($data['line_items'], $Employee->id);

        $data['image_temp']->move('\images\employees', $image_name);

        return redirect()->route('admin.employees.index');
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
        
        $Branches = BranchesModel::pluckActiveOnly();
        $Branches->prepend('Select a Branch');
        $Departments = DepartmentsModel::pluckActiveOnly();
        $Departments->prepend('Select a Department');
        $JobTitles = JobTitlesModel::pluckActiveOnly();
        $JobTitles->prepend('Select a Designation');
        $Banks = BanksModel::pluckActiveOnly();
        $Banks->prepend('Select a Bank');
        $Employee = EmployeesModel::findOrFail($id);
        $Qualifications = $Employee->qualifications;
        return view('admin.employees.edit', compact('Branches', 'Departments', 'JobTitles', 'Banks', 'Employee', 'Qualifications'));

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
        $Employee = EmployeesModel::findOrFail($id);
        $this->validate($request, [
            'image' => 'max:100'
        ]);
        
        $data['image_temp'] = '';
        if($request->hasFile('image')){
            if(file_exists($Employee->image)){
                unlink($Employee->image);
            }
            $image_name = time().'_'.str_replace(' ', '', str_replace('-', '', strtolower($data['image']->getClientOriginalName() ) ) );
            $data['image_temp'] = $data['image'];
            $data['image'] = 'images/employees/'.$image_name;
        }

        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $Employee->update($data);

        if($data['image_temp']){
            $data['image_temp']->move('images/employees/', $image_name);
        }

        QualificationsModel::addBulkRecords($data['line_items'], $Employee->id);

        return redirect()->route('admin.employees.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $EmployeeModel = EmployeesModel::findOrFail($id);
        $EmployeeModel->update(['deleted_by' => Auth::user()->id]);
        $EmployeeModel->delete();        
        return redirect()->route('admin.employees.index');

    }

    /**
     * Print the specific form using blade view.
     *
     * @param  int  $id
     * @return PDF
     */
    public function print($id){

        $EmployeesModel = EmployeesModel::find($id);
        return view('admin.employees.form' , compact('EmployeesModel'));
        $pdf = PDF::loadView('admin.employees.form', compact('EmployeesModel'));
        // return $pdf->stream(strtolower(str_replace(' ', '_', $StudentsModel->name.'_'.$StudentsModel->roll_no.'_'.$StudentsModel->class)).'.pdf'); 

    }

    public function delete_qualification(Request $request){
        
        $data = $request->all();
        QualificationsModel::findOrFail($data['id'])->forceDelete();
        return;

    }


}
