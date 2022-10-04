<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
       return view('admin.user.add',compact('roles'));
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
        $user_data = $request->only('name','email');
        $user_data['password'] = bcrypt($request->password);
        $user = User::create($user_data);
        $roleID = $request->role_id;
        $user->roles()->attach($roleID);
        DB::commit();    
        return redirect()->route('user.index')->with('success','Thêm thành công');
        } catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->with('error','Thêm thất bại');
        }

    }
    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        $roles = Role::all();
        $users = User::find($id);
        $user_roles = $users->roles;
        return view('admin.user.edit',compact('users','roles','user_roles'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user_data = $request->only('name','email');
            $user_data['password'] = bcrypt($request->password);
            $user = User::find($id);
            $user->update($user_data);

            $roleID = $request->role_id;
            $user->roles()->sync($roleID);
            DB::commit();    
            return redirect()->route('user.index')->with('success','Thêm thành công');
            } catch(\Exception $ex)
            {
                DB::rollBack();
                return redirect()->back()->with('error','Thêm thất bại');
            }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại ');
    }
}
