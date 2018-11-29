<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class PaymentTypesModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    protected $table = "payment_types";

    static function getActiveOnly(){
        return self::where(['status' => 1])->get();
    }

    static function pluckActiveOnly(){
        return self::where(['status' => 1])->pluck('name', 'id');
    }

    static function getPaymentTypeByID($id){
        return self::find($id) ? self::find($id)->name : 'ERROR';
    }

}
