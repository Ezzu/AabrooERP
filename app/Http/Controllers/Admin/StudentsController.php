<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Students\StoreUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\StudentsModel;
use App\Models\Admin\BranchesModel;
use PDF;
use Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Students = StudentsModel::getActiveOnly();

        return view('admin.students.index', compact('Students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Campuses = BranchesModel::pluckActiveOnly();
        $Campuses->prepend('Select a Campus', '');

        return view('admin.students.create', compact('Campuses'));

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

        $data['image_temp'] = '';

        $image_name = time().'_'.str_replace(' ', '_', strtolower($data['image']->getClientOriginalName()));
        $data['image_temp'] = $data['image'];
        $data['image'] = 'images/students/'.$image_name;

        if($data['image_temp']->move('images/students/', $image_name)){
            StudentsModel::create($data);
        }

        return redirect()->route('admin.students.index');
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

        $Campuses = BranchesModel::pluckActiveOnly();
        $Campuses->prepend('Select a Campus', '');   
        $Student = StudentsModel::findOrFail($id);

        return view('admin.students.edit', compact('Student', 'Campuses'));

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
        $Student = StudentsModel::findOrFail($id);
        $this->validate($request, [
            'image' => 'max:100'
        ]);
        
        $data['image_temp'] = '';
        if($request->hasFile('image')){
            if(file_exists($Student->image)){
                unlink($Student->image);
            }
            $image_name = time().'_'.str_replace(' ', '_', strtolower($data['image']->getClientOriginalName()));
            $data['image_temp'] = $data['image'];
            $data['image'] = 'images/students/'.$image_name;
        }

        if($data['image_temp']){
            $data['image_temp']->move('images/students/', $image_name);
        }

        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $Student->update($data);
        return redirect()->route('admin.students.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Print the specific form using blade view.
     *
     * @param  int  $id
     * @return PDF
     */
    public function print($id){

        $StudentsModel = StudentsModel::find($id);
        return view('admin.students.form' , compact('StudentsModel'));
        // $pdf = PDF::loadView('admin.students.form', compact('StudentsModel'));
        // return $pdf->download(strtolower(str_replace(' ', '_', $StudentsModel->name.'_'.$StudentsModel->roll_no.'_'.$StudentsModel->class)).'.pdf'); 

    }


}
