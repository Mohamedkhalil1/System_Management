<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = []; 

    public function scopeSelection($query){
        return $query->select('id','name','email','phone','address','created_at');
     }

    public function invoices(){
        return $this->hasMany(Invoice::class,'client_id');
    }
}
