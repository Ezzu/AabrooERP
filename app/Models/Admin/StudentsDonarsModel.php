<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class StudentsDonarsModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'donar_id', 'sponser_type', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "students_donars";

    public function donar(){
        return $this->belongsTo('App\Models\Admin\DonarsModel', 'donar_id');
    }

    public function student(){
        return $this->belongsTo('App\Models\Admin\StudentsModel', 'student_id');
    }

    public function donar_payments(){
        return $this->hasMany('App\Models\Admin\DonarPaymentsModel', 'sponsership_id');
    }

    static public function getActiveOnly(){
        return self::where(['deleted_at' => NULL])->get();
    }

    static public function getSponserCountByDonarId($donar_id){
        return self::where(['donar_id' => $donar_id])->get() ? self::where(['donar_id' => $donar_id])->get()->count() : 0;
    }

    static public function getGroupBySponserships(){
        $results = [];
        $ids = self::getDistinctDonarIds();
        if($ids){
            $ids = $ids[0];
            foreach($ids as $id){
                $results[$id] = self::where('donar_id', $id)->get()->toArray();
            }
        }
        return $results;
    }

    static public function getDistinctDonarIds(){
        return self::selectRaw('distinct donar_id')->get()->toArray();
    }
    
}
