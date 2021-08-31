<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $userID = User::where('id', $request->user()->id)->first();
        
        return view('admin.modules.profile', compact('userID'));
    }
}
