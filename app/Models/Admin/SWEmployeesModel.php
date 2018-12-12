<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class SWEmployeesModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['employee_id','emergency_contact', 'day_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "swemployees";

    public function employee(){
        return $this->belongsTo('App\Models\Admin\EmployeesModel', 'employee_id');
    }

    public function areas(){
        return $this->belongsToMany('App\Models\Admin\AreasModel', 'swemployees_area', 'employee_id', 'area_id');
    }

    public function working_day(){
        return $this->belongsTo('App\Models\Admin\WorkingDaysModel', 'day_id');
    }
    
    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('employee_id', 'id');
    }

    static public function getSWEmployeeByEmployeeId($employee_id){
        return self::where(['employee_id' => $employee_id])->first();
    }
    
}
