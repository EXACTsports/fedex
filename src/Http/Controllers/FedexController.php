<?php 

namespace EXACTSports\FedEx\Http\Controllers;

use Illuminate\Routing\Controller;

class FedexController extends Controller
{
    public function index()
    {
        return view('fedex::index');
    }
}