<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonarPaymentsModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['sponsership_id', 'payment_status', 'payment_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "donar_payments";

    public function student_sponsership(){
        return $this->belongsTo('App\Models\Admin\StudentsDonarsModel', 'sponsership_id');
    }

    static function getActiveOnly(){
        return self::all();
    }

    static public function pluckActiveOnly(){
        return self::where(['deleted_at' => NULL])->pluck('name','id');
    }

    static public function getLastPaymentBySponsershipId($s_id){
        return self::where(['sponsership_id' => $s_id])->OrderBy('created_at', 'desc')->first();
    }

    static public function getLastPaymentByDonarId($donar_id){
        return self::selectRaw('students_donars.*, donar_payments.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->where('students_donars.donar_id', $donar_id)
                    ->OrderBy('donar_payments.created_at', 'desc')->first();
    }

    static public function getLastPaymentByDonarIdAndStudentId($donar_id, $student_id){
        return self::selectRaw('students_donars.*, donar_payments.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->where('students_donars.donar_id', $donar_id)
                    ->where('students_donars.student_id', $student_id)
                    ->OrderBy('donar_payments.created_at', 'desc')->first();
    }

    static public function getActiveOnlyByClassOnly($class){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('students.class', $class)
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }

    static public function getActiveOnlyBySponserTypeOnly($sponser_type){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('students_donars.sponser_type', $sponser_type)
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }

    static public function getActiveOnlyBySponserTypeAndClass($sponser_type, $class){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('students_donars.sponser_type', $sponser_type)
                    ->where('students.class', $class)
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }
    
    static public function getActiveOnlyByPaymentStatus($payment_status){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('donar_payments.payment_status', $payment_status)
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }
        
    static public function getActiveOnlyByPaymentStatusAndClass($payment_status, $class){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('donar_payments.payment_status', $payment_status)
                    ->where('students.class', $class)                    
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }
            
    static public function getActiveOnlyByPaymentStatusAndSponserType($payment_status, $sponser_type){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('donar_payments.payment_status', $payment_status)
                    ->where('students_donars.sponser_type', $sponser_type)
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }
                
    static public function getActiveOnlyByPaymentStatusSponserTypeAndClass($payment_status, $sponser_type, $class){
        return self::selectRaw('students_donars.*, donar_payments.*, students.*, donars.*')
                    ->join('students_donars', 'students_donars.id', '=', 'donar_payments.sponsership_id')
                    ->join('students', 'students.id', '=', 'students_donars.student_id')
                    ->join('donars', 'donars.id', '=', 'students_donars.donar_id')
                    ->where('donar_payments.payment_status', $payment_status)
                    ->where('students_donars.sponser_type', $sponser_type)
                    ->where('students.class', $class)
                    ->OrderBy('donar_payments.created_at', 'desc')->get();
    }
    
}
