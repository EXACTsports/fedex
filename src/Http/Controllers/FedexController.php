<?php 

namespace EXACTSports\FedEx\Http\Controllers;

use Illuminate\Routing\Controller;
use EXACTSports\FedEx\Http\Services\FedexService;

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

    /**
     * Gets token
     */
    public function getToken()
    {
        $token = $this->fedexService->getToken();

        return response()->json($token);
    }
}