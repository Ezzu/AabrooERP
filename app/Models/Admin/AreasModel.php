<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class AreasModel extends Model
{
    use SoftDeletes;

    protected $table = "areas";

    protected $fillable = ['name', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    static public function getActiveOnly(){
        return self::where(['status' => 1])->where(['deleted_at' => NULL])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->where(['deleted_at' => NULL])->pluck('name','id');
    }

    static public function getAll(){
        return self::get();
    }
}