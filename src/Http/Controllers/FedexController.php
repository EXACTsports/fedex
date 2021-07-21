<?php

namespace EXACTSports\FedEx\Http\Controllers;

use EXACTSports\FedEx\Http\Services\FedExService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FedexController extends Controller
{
    private FedexService $fedexService;

    public function __construct(FedexService $fedexService)
    {
        $this->fedexService = $fedexService;
    }

    public function index()
    {
        return view('fedex::index');
    }

    public function uploadDocument()
    {
        $json = $this->fedexService->uploadDocumentFromLocalDrive();

        return response()->json($json);
    }

    public function getToken()
    {
        $token = $this->fedexService->getPublicKey();
        print_r($token);
        die;
    }
}
