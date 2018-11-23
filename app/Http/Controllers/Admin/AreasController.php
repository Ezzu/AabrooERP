<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Areas\StoreUpdateRequest;
use App\Models\Admin\AreasModel;
use Auth;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Areas = AreasModel::getAll();
        return view('admin.areas.index', compact('Areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create');
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

        AreasModel::create($data);

        return redirect()->route('admin.areas.index');

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

        $Area = AreasModel::find($id);
        return view('admin.areas.edit', compact('Area'));
        
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
        $Area = AreasModel::findOrFail($id);
        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $Area->update($data);
        return redirect()->route('admin.areas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        AreasModel::findOrFail($id)->delete();        
        return redirect()->route('admin.areas.index');

    }

    public function datatables(Request $request){


    }

    public function active($id){

        $AreasModel = AreasModel::find($id);
        $AreasModel->update(['status' => !$AreasModel->status]);
        return redirect()->back();

    }

    public function inactive($id){

        $AreasModel = AreasModel::find($id);
        $AreasModel->update(['status' => !$AreasModel->status]);
        return redirect()->back();

    }

}
