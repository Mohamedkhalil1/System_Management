<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = []; 

    public function scopeSelection($query){
        return $query->select('id','name','email','phone','address','created_at');
     }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
