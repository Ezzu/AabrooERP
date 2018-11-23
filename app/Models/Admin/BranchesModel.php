<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class BranchesModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'contact', 'location', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "branches";

    static function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static public function pluckActiveOnly(){
        return self::where(['status' => 1])->where(['deleted_at' => NULL])->pluck('name','id');
    }

}
