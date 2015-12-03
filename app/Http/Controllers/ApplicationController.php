<?php

namespace App\Http\Controllers;

use App\Services\KundenMeisterService;
use Illuminate\Http\Request;

class ApplicationController extends Controller {
    private $sdk;

    public function __construct(KundenMeisterService $sdk) {
        $this->sdk = $sdk;
    }


    public function index(Request $request, $clientId) {
        return view('dashboard.clients.applications.index');
    }

}