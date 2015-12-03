<?php

namespace App\Http\Controllers;

use App\Services\KundenMeisterService;
use Illuminate\Http\Request;

class ClientController extends Controller {
    private $sdk;

    public function __construct(KundenMeisterService $sdk) {
        $this->sdk = $sdk;
    }


    public function index(Request $request) {
        return view('dashboard.clients.index', [
            'clients' => $this->sdk
                            ->repositories()
                            ->clients()
                            ->get($request->get('page') * 50, 50, $request->get('where'))
        ]);
    }

}