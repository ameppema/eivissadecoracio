<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:admin.users']);
    }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = $request->validate([
            'password'=> ['required','confirmed','min:6'],
            'name' => ['required','string'],
            'email'=> ['email'],
            'status' => ['required','numeric'],
            'nickname'=> ['required','string'],
            'role'  => ['required','string']
        ]);
        User::create([  'name'=>$newUser['name'],
                        'email'=>$newUser['email'],
                        'password'=> Hash::make($newUser['password']),
                        'nickname' => $newUser['nickname'],
                        'status' => $newUser['status'],
                        ])
                        ->assignRole($newUser['role']);
        return redirect()->back()->with(['message'=>'Usuario Creado!','alertStatus'=>'success']);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function userRole($id)
    {
        return response()->json(User::where('id',$id)->with('roles')->first());
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
            if(isset($user->roles[0]['name'])) $user->removeRole($user->roles[0]['name']);
            $user->assignRole($data['role']);
        }

        $user->save();

        return redirect()->back()->with(['message'=>'Informacion de usuario actualizada!','alertStatus'=>'success']);
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
        return redirect()->back()->with(['message'=>'Usuario Elimido!', 'alertStatus'=>'warning']);
    }
}
