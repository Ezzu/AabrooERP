<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\DonarPaymentsModel;
use App\Models\Admin\StudentsDonarsModel;

class DonarPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DonarPayments = DonarPaymentsModel::getActiveOnly();

        return view('admin.donarpayments.index', compact('DonarPayments'));
    }
    /**
     * Display a listing of the resource with filter.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetchFilterRecords(Request $request){

        $data = $request->all();

        if(!$data['payment_status'] && !$data['sponser_type'] && !$data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnly();
        }
        elseif(!$data['payment_status'] && !$data['sponser_type'] && $data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnlyByClassOnly($data['class']);
        }
        elseif(!$data['payment_status'] && $data['sponser_type'] && !$data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnlyBySponserTypeOnly($data['sponser_type']);
        }
        elseif(!$data['payment_status'] && $data['sponser_type'] && $data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnlyBySponserTypeAndClass($data['sponser_type'], $data['class']);
        }
        elseif($data['payment_status'] && !$data['sponser_type'] && !$data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnlyByPaymentStatus($data['payment_status']);
        }
        elseif($data['payment_status'] && !$data['sponser_type'] && $data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnlyByPaymentStatusAndClass($data['payment_status'], $data['class']);
        }
        elseif($data['payment_status'] && $data['sponser_type'] && !$data['class']){
            $DonarPayments = DonarPaymentsModel::activeOnlyByPaymentStatusAndSponserType($data['payment_status'], $data['sponser_type']); 
        }
        else{
            $DonarPayments = DonarPaymentsModel::activeOnlyByPaymentStatusSponserTypeAndClass($data['payment_status'], $data['sponser_type'], $data['class']); 
        }

        if($data['year']){
            $DonarPayments->whereYear('donar_payments.created_at', '=', '20'.$data['year']);
        }

        if($data['month']){
            $DonarPayments->whereMonth('donar_payments.created_at', '=', $data['month']);
        }

        $DonarPayments = $DonarPayments->get();

        return view('admin.donarpayments.index', compact('DonarPayments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = StudentsDonarsModel::getGroupBySponserships();
        if($groups){
            foreach($groups as $group){
                foreach($group as $record){
                    $last_payment = DonarPaymentsModel::getLastPaymentByDonarIdAndStudentId($record['donar_id'], $record['student_id']);
                    $difference = $last_payment->created_at->diffInMonths(\Carbon\Carbon::now());
                    if( $difference >= \Config::get('admin.sponser_type_values_array.'.$record['sponser_type']) ){
                        DonarPaymentsModel::create([
                            'sponsership_id' => $record['id'],
                            'payment_status' => 0
                        ]);
                    }
                }
            }
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
    
    /**
     * Check and Create New Records in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function refresh(){


    }
    
    /**
     * Change Payment Status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function active($id){

        $DonarPaymentsModel = DonarPaymentsModel::find($id);
        $DonarPaymentsModel->update(['payment_status' => !$DonarPaymentsModel->payment_status, 'payment_date' => \Carbon\Carbon::now()]);
        return redirect()->back();

    }

    /**
     * Change Payment Status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function inactive($id){

        $DonarPaymentsModel = DonarPaymentsModel::find($id);
        $DonarPaymentsModel->update(['payment_status' => !$DonarPaymentsModel->payment_status, 'payment_date' => NULL]);
        return redirect()->back();

    }
}
