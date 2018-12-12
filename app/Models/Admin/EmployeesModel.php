<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class EmployeesModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'branch_id', 'department_id', 'job_title_id', 'bank_id', 'date_of_joining',
                            'name', 'gender', 'cnic', 'father_name', 'contact', 'image',
                            'email', 'permanent_address', 'temporary_address', 'city',
                            'account_no', 'basic_salary', 'medical_allowance', 'conveyance',
                            'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "employees";

    public function qualifications(){
        return $this->hasMany('App\Models\Admin\QualificationsModel', 'employee_id');
    }

    public function swemployee(){
        return $this->hasOne('App\Models\Admin\SWEmployeesModel', 'employee_id');
    }

    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('name', 'id');
    }

    static public function getEmployeeNameById($employee_id){
        return self::findOrFail($employee_id)->name;
    }

}
