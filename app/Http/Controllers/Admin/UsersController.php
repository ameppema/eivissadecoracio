<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.modules.users', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $userID = User::where('id', $request->user()->id)->first();
        
        return view('admin.modules.profile', compact('userID'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permissions(Request $request)
    {
        $userID = User::where('id', $request->user()->id)->first();
        $permissionsAll = Permission::all()->pluck('name');
        
        return view('admin.modules.permissions', compact(['userID', 'permissionsAll']));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function roles(Request $request)
    {
        $rolesAll = Role::all()->pluck('name');
        $users = User::with('roles')->get();
        
        return view('admin.modules.roles', compact(['rolesAll', 'users']));
    }
    public function userRole($id)
    {
        return response()->json(User::where('id',$id)->with('roles')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->validate([
            'role'=>['nullable','string'],
            'status'=>['nullable','numeric'],
        ]);

        $user = User::where('id',$id)->with('roles')->first();

        $user->status = $data['status'] ?? $user->status;
        if(isset($data['role'])){
            $user->removeRole($user->roles[0]['name']);
            $user->assignRole($data['role']);
        }

        $user->save();

        return redirect()->back()->with(['message'=>'Informacion de usuario actualizada!','alert-result'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
