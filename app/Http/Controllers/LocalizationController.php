<?php

namespace App\Http\Controllers;

class LocalizationController extends Controller
{
    public function lang($locale = 'es'){

        $prev_url = url()->previous();
        $prev_req = app('request')->create($prev_url);
        $prev_segmets = $prev_req->segments();

        $prev_segmets[0] = $locale;
        return redirect()->to(implode('/', $prev_segmets));
    }
}
