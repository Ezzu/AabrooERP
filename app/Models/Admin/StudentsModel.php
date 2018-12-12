<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class StudentsModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'admission_date', 'date_of_birth', 'gender', 'cnic', 'age', 'class', 'roll_no', 'shift', 'campus',
                            'father_name', 'father_cnic', 'father_education', 'father_professional_status',
                            'mother_name', 'mother_cnic', 'mother_education', 'mother_professional_status',
                            'permanent_address', 'phone_no', 'cell_no',
                            'no_of_children', 'male', 'female',
                            'religion', 'guardian_occupation', 'residential_status',
                            'father_income', 'mother_income', 'other_income',
                            'guarantor_name', 'guarantor_relation', 'guarantor_cnic', 'guarantor_address', 'guarantor_contact',
                            'eyesight', 'hearing', 'weight', 'height',
                            'bcg', 'polio', 'dpt', 'measles', 'mr', 'hepatitis',
                            'chest_xray', 'blood_cbcesr', 'spuntum_afb', 'blood_group',
                            'diabetes', 'hypertension', 'tab_chest', 'myocardial_impaction', 'congenital_deformity', 'others',
                            'image', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "students";

    public function donars(){
        return $this->belongsToMany('App\Models\Admin\DonarsModel', 'students_donars', 'student_id', 'donar_id');
    }

    public function students_donars(){
        return $this->belongsToMany('App\Models\Admin\StudentsDonarsModel', 'student_id');
    }

    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('name', 'id');
    }

    static public function pluckActiveOnlyWithRoll(){
        return self::where(['status' => 1])->pluck('name', 'id');
    }

}
