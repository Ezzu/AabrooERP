<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\StudentsDonarsModel;
use App\Models\Admin\StudentsModel;
use App\Models\Admin\DonarsModel;
use App\Http\Requests\Admin\StudentsDonars\StoreUpdateRequest;
use Auth;

class StudentsDonarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $StudentsDonars = StudentsDonarsModel::all();
        return view('admin.studentsdonars.index', compact('StudentsDonars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $Donars = DonarsModel::pluckActiveOnly();
        $Donars->prepend('Select a Donar');
        $Students = StudentsModel::pluckActiveOnlyWithRoll();
        return view('admin.studentsdonars.create', compact('Donars', 'Students'));

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

        $students = $data['student_id'];
        foreach($students as $student){
            $data['student_id'] = $student;
            StudentsDonarsModel::create($data);
        }

        $count = DonarsModel::getSponserCountById($data['donar_id']);
        $count += count($students);
        DonarsModel::findOrFail($data['donar_id'])->update(['sponser_count' => $count]);

        return redirect()->route('admin.students_donars.index');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $StudentDonar = StudentsDonarsModel::findOrFail($id)->delete(); 
        $StudentDonar->update(['deleted_by' => Auth::user()->id, 'deleted_at' => \Carbon\Carbon::now()]);
        return redirect()->route('admin.students_donars.index');

    }


    /**
     * Show the data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request){

        $Target = StudentsDonarsModel::getActiveOnly();

        return DataTable()->Of($Target)
            ->addColumn('id', function(){

            })->addColumn('donar_name', function($Target){

                return $Target->donar_id;

            })->addColumn('donar_contact', function($Target){

                return $Target->donar_id;

            })->addColumn('student_name', function($Target){

                return $Target->student_id;

            })->addColumn('student_roll_no', function($Target){

                return $Target->student_id;

            })->addColumn('student_class', function($Target){

                return $Target->student_id;

            })->addColumn('sponsership_date', function($Target){

                return $Target->created_at;

            })->addColumn('action', function($Target){

                return 'Action';

            })->rawColumns(['action'])->toJson();

    }

}
