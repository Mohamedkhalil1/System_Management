<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    

    public function scopeSelection($query){
        return $query->select('id','date','price','type ','client_id','supplier_id','created_at');
    }
    
    public function scopeClient($query){
        return $query->whereNotNull('client_id');
    }

    public function scopeSupplier($query){
        return $query->whereNotNull('supplier_id');
    }

    public function client(){
        return $this->hasMany(Client::class,'client_id');
    }

    public function supplier(){
        return $this->hasMany(Client::class,'client_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'invoice_products','invoice_id','product_id');
    }
}
