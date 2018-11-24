<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class SWDonarsModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['donar_name', 'address', 'cnic', 'area_id', 'phone_no', 'cell_no', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "swdonars";

    static public function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('donar_name', 'id');
    }
    
}
