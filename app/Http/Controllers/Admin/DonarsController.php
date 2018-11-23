<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Donars\StoreUpdateRequest;
use App\Models\Admin\DonarsModel;
use App\Models\Admin\AreasModel;
use App\Models\Admin\PaymentTypesModel;
use Auth;

class DonarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Donars = DonarsModel::getActiveOnly();
        return view('admin.donars.index', compact('Donars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Areas = AreasModel::pluckActiveOnly();
        $Areas->prepend('Select an Area');

        $PaymentTypes = PaymentTypesModel::pluckActiveOnly();
        $PaymentTypes->prepend('Select a Payment Method');
        
        return view('admin.donars.create', compact('Areas', 'PaymentTypes'));
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

        DonarsModel::create($data);

        return redirect()->route('admin.donars.index');
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
        
        $Donar = DonarsModel::findOrFail($id);

        $Areas = AreasModel::pluckActiveOnly();
        $Areas->prepend('Select an Area');

        $PaymentTypes = PaymentTypesModel::pluckActiveOnly();
        $PaymentTypes->prepend('Select a Payment Method');

        return view('admin.donars.edit', compact('Donar', 'Areas', 'PaymentTypes'));

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
        $Donar = DonarsModel::findOrFail($id);
        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $Donar->update($data);
        return redirect()->route('admin.donars.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DonarsModel::findOrFail($id)->delete();        
        return redirect()->route('admin.donars.index');

    }
}
