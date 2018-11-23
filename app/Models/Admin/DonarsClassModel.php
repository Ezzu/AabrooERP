<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class DonarsClassModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "donars_class";

    static function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }
    
}
