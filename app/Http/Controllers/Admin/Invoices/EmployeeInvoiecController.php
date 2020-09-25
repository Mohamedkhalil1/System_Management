<?php

namespace App\Http\Controllers\Admin\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Invoice;
use Illuminate\Http\Request;

class EmployeeInvoiecController extends Controller
{
    public function index()
    {
        try{
            $invoices = Invoice::employeeInvoices()->get();
            return view('admin.employeesInvoice.index',compact('invoices'));
        }catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
    }

    public function create()
    {
        try{
            $employees = Employee::all();
            return view('admin.employeesInvoice.create',compact('employees'));
        }catch(\Exception $ex){
            return redirect()->route('admin.employeesInvoice')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
    }

    public function store(Request $request)
    {
        try{
            $params = $request->except('_token');
            Invoice::create($params);
            return redirect()->route('admin.employeesInvoice')->with(['success' => 'تم إضافه الموظف بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('admin.employeesInvoice')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
       
    }

    public function edit($id)
    {
        try{
            $invoice = Invoice::employeeInvoices()->findOrFail($id);
            $employees = Employee::all();
            return view('admin.employeesInvoice.edit',compact('invoice','employees'));
        }catch(\Exception $ex){ 
            return redirect()->route('admin.employeesInvoice')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
      
    }

    public function update(Request $request, $id)
    {
        try{
            $params = $request->except('_token');
            Invoice::employeeInvoices()->findOrFail($id)->update($params);
            return redirect()->route('admin.employeesInvoice')->with(['success' => 'تم تحديث موظف بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('admin.employeesInvoice')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
      
    }

    public function destroy($id)
    {
        try{
            Invoice::employeeInvoices()->findOrFail($id)->delete();
            return redirect()->route('admin.employeesInvoice')->with(['success' => 'تم حذف موظف بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->route('admin.employeesInvoice')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
    }
}
