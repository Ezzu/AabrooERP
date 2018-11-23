<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\PaymentTypes\StoreUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentTypesModel;
use Auth;

class PaymentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PaymentTypes = PaymentTypesModel::getActiveOnly();
        return view('admin.paymenttypes.index', compact('PaymentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paymenttypes.create');
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

        PaymentTypesModel::create($data);

        return redirect()->route('admin.payment_types.index');
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

        $PaymentType = PaymentTypesModel::findOrFail($id);
        return view('admin.paymenttypes.edit', compact('PaymentType'));

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
        $Area = PaymentTypesModel::findOrFail($id);
        $data['updated_by'] = Auth::user()->id;
        $data['updated_at'] = \Carbon\Carbon::now();
        $Area->update($data);
        return redirect()->route('admin.payment_types.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        PaymentTypesModel::findOrFail($id)->delete();        
        return redirect()->route('admin.payment_types.index');
        
    }
}
