<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class WorkingDaysModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "working_days";
        
    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('name', 'id');
    }
    
}
