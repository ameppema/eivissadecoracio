<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $userData = User::where('id', $request->user()->id)->with('roles')->first();
        
        return view('admin.modules.profile', compact('userData'));
    }
}
