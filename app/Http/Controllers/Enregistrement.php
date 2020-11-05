<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Enregistrement extends Controller
{
    public function enrg4_submit(Request $request)
    {
        echo($request->user);
    }

    public function enrg3_submit(Request $request)
    {
        echo($request->user);
    }

}
