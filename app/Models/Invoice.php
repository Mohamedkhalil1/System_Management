<?php

namespace App\Models;

use App\Observers\InvoiceOobserver;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    

     protected static function boot(){
        parent::boot();
        Invoice::observe(InvoiceOobserver::class);
    }

    public function scopeSelection($query){
        return $query->select('id','date','price','type','status','client_id','supplier_id','admin_id','employee_id','branch_id','created_at');
    }
    
    public function scopeClientInvoices($query){
        return $query->whereNotNull('client_id');
    }

    public function scopeSupplierInvoices($query){
        return $query->whereNotNull('supplier_id');
    }

    public function scopeEmployeeInvoices($query){
        return $query->whereNotNull('employee_id');
    }

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    
    

    public function products(){
        return $this->belongsToMany(Product::class,'invoice_products','invoice_id','product_id');
    }
}
