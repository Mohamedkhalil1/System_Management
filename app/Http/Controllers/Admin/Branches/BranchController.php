<?php

namespace App\Http\Controllers\Admin\Branches;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branches\BranchReuqest;
use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches =  Branch::select()->get();
        return view('admin.branches.index',compact('branches'));
    }

   
    public function create()
    {
        $admins = Admin::select()->get();
        return view('admin.branches.create',compact('admins'));
    }

    public function store(BranchReuqest $request)
    {
        try{
            $params = $request->except('_token');
            Branch::create($params);
            return redirect()->route('admin.branches')->with(['success' => 'تم إضافه الفرع بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('admin.branches')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
       
    }

    public function show($id)
    {
        $branch =  Branch::find($id);
        $products = $branch->products;
        return view('admin.branches.show',compact('branch','products'));
    }

    public function edit($id)
    {
        try{
            $admins = Admin::select()->get();
            $branch = Branch::find($id);
            return view('admin.branches.edit',compact('admins','branch'));
        }catch(\Exception $ex){
            return redirect()->route('admin.branches')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
      
    }

    public function update(BranchReuqest $request, $id)
    {
        try{
            $params = $request->except('_token');
            Branch::find($id)->update($params);
            return redirect()->route('admin.branches')->with(['success' => 'تم تحديث الفرع بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('admin.branches')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
      
    }

    public function destroy($id)
    {
        try{
            Branch::find($id)->delete();
            return redirect()->route('admin.branches')->with(['success' => 'تم حذف الفرع بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->route('admin.branches')->with(['error' => 'حدث مشكله جرب مره اخرى']);
        }
    }
}
