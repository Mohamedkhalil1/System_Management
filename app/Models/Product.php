<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = []; 

    public function scopeSelection($query){
        return $query->select('id','name','description','price','stock','selled','category_id','branch_id');
     }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function invoices(){
        return $this->belongsToMany(Product::class,'invoice_products','invoice_id','product_id');
    }

}
