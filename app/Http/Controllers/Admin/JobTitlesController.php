<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\JobTitlesModel;
use App\Http\Requests\Admin\JobTitles\StoreUpdateRequest;
use Auth;

class JobTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $JobTitles = JobTitlesModel::getActiveOnly();
        return view('admin.jobtitles.index', compact('JobTitles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.jobtitles.create');

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

        JobTitlesModel::create($data);

        return redirect()->route('admin.job_titles.index');
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
        
        $JobTitle = JobTitlesModel::findOrFail($id);
        return view('admin.jobtitles.edit', compact('JobTitle'));
        
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
        $JobTitle = JobTitlesModel::findOrFail($id);
        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $JobTitle->update($data);
        return redirect()->route('admin.job_titles.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $JobTitle = JobTitlesModel::findOrFail($id);
        $JobTitle->update(['deleted_by' => Auth::user()->id]);
        $JobTitle->delete();        
        return redirect()->route('admin.job_titles.index');

    }
}