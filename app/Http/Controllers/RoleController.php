<?php

namespace App\Http\Controllers;

use App\Models\Permisstion;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.user.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perParents = Permisstion::where('parent_id',0)->get();
        return view('admin.user.role.add',compact('perParents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            DB::beginTransaction();
     
        $data = $request->only('name','display_name');
        $role = Role::create($data);
         $role->permisstion()->attach($request->permisstion_id);
         DB::commit();
         return redirect()->route('role.index')->with('success','Thêm quyền thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error','Thêm quyền thất bại');
            
        }

    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $perParents = Permisstion::where('parent_id',0)->get();
        $perChecked = $role->permisstion;
        // dd($perChecked);
        return view('admin.user.role.edit',compact('role','perParents','perChecked'));
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
     
        $data = $request->only('name','display_name');
        $role = Role::find($id);
        $role->update($data);
         $role->permisstion()->sync($request->permisstion_id);
         DB::commit();
         return redirect()->route('role.index')->with('success','Thêm quyền thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error','Thêm quyền thất bại'); 
            
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if( $role->delete()){
            $role->permisstion()->detach();
            return redirect()->route('role.index')->with('success','Xóa thành công');
        }
        else{
            return redirect()->back()->with('error','Xóa thất bại');  
        }
       
    }
}
