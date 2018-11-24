<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

use Illuminate\Database\Eloquent\Model;

class QualificationsModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'passing_year', 'division', 'institution', 'employee_id', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "qualifications";

    public function employee(){
        return $this->belongsTo('App\Models\Admin\EmployeesModel', 'employee_id');
    }

    static function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('title', 'id');
    }

    static public function addBulkRecords($collection, $employee_id){
        $qualifications = [];
        foreach($collection as $h => $item){
            foreach($item as $it => $value){
                if($it != NULL && $it != '######'){
                    $qualifications[$it][$h] = $value;
                    $qualifications[$it]['employee_id'] = $employee_id;
                    $qualifications[$it]['created_by'] = Auth::user()->id;
                }
            }
        }

        self::deleteQualificationsByEmployeeId($employee_id);

        foreach($qualifications as $q){
            QualificationsModel::create($q);
        }
        return;
    }

    static public function deleteQualificationsByEmployeeId($employee_id){
        $qualifications = self::where(['employee_id' => $employee_id]);
        if(!empty($qualifications)){
            return $qualifications->forceDelete();
        }
        return;
    }

    static public function getLastQualificationByEmployeeId($employee_id){
        return self::where(['employee_id' => $employee_id])->get()->last();
    }

}
