<?php

namespace App\Models;

use App\Observers\InvoiceOobserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

   

    protected $guarded = []; 

    public function scopeSelection($query){
        return $query->select('id','name','description');
     }

    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
    
}
