<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class DonarsModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['sponsership_date', 'donar_name', 'address', 'cnic', 'area_id', 'phone_no', 'cell_no', 'email', 'sponser_count', 'fee_per_child', 'payment_type_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "donars";

    public function students_donars(){
        return $this->hasMany('App\Models\Admin\StudentsDonarsModel', 'donar_id');
    }

    public function students(){
        return $this->belongsToMany('App\Models\Admin\StudentsModel', 'students_donars', 'donar_id', 'student_id');
    }

    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('donar_name', 'id');
    }

    static function getSponserCountById($donar_id){
        return self::findOrFail($donar_id)->sponser_count;
    }
    
}
