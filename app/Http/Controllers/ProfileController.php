<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request){
        $userData = User::where('id', $request->user()->id)->with('roles')->first();
        
        return view('admin.modules.profile', compact('userData'));
    }
    public function update(Request $request, User $user){
        
        $data = $request->validate([
            'password'=> ['nullable','confirmed','min:6'],
            'name' => ['nullable','string'],
            'email'=> ['nullable','email'],
            'nickname'=> ['nullable','string'],
        ]);

        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->nickname = $data['nickname'];
        $user->updated_at = Carbon::now()->toDateTimeString();

        $user->save();
        return redirect()->back()->with(['message'=>'Perfil Actualizado!','alertStatus'=>'success']);
    }
}
