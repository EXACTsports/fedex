<?php

namespace EXACTSports\FedEx\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FedExController extends Controller
{
    public function index()
    {
        return view('fedex::index');
    }
}
