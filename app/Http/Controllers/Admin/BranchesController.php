<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\BranchesModel;
use App\Http\Requests\Admin\Branches\StoreUpdateRequest;
use Auth;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Branches = BranchesModel::getActiveOnly();
        return view('admin.branches.index', compact('Branches'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.branches.create');

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

        BranchesModel::create($data);

        return redirect()->route('admin.branches.index');
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
        
        $Branch = BranchesModel::findOrFail($id);
        return view('admin.branches.edit', compact('Branch'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, $id)
    {
        
        $data = $request->all();
        $Branch = BranchesModel::findOrFail($id);
        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $Branch->update($data);
        return redirect()->route('admin.branches.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Branch = BranchesModel::findOrFail($id);
        $Branch->update(['deleted_by' => Auth::user()->id]);
        $Branch->delete();        
        return redirect()->route('admin.branches.index');

    }
}
