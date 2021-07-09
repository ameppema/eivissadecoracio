<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;

class InterioresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interiores = Service::find(3);

        // $interioresData = $services[2];

        return view('interiores', compact(['interiores']));
    }
}
