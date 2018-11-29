<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class SWEmployeesModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['employee_id','emergency_contact', 'area_id', 'day_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "swemployees";

    public function employee(){
        return $this->belongsTo('App\Models\Admin\EmployeesModel', 'employee_id');
    }
    
    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }
    
}
