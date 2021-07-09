<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Service::find(1);

        return view('obras', compact(['obras']));
    }
}
