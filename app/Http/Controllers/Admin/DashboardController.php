<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $invoices = Invoice::clientInvoices()->orderBy('id','desc')->limit(10)->get();
        return view('admin.dashboard',compact('invoices'));
    }
}
