<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = []; 

    public function scopeSelection($query){
        return $query->select('id','name','address','city','admin_id');
     }

    public function products(){
        return $this->hasMany(Product::class,'branch_id');
    }

    public function employees(){
        return $this->hasMany(Employee::class,'branch_id');
    }
    
}
