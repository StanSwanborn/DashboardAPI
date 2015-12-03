<?php

namespace App\Http\Controllers;

use App\Services\KundenMeisterService;

class ClientController extends Controller {
    private $sdk;

    public function __construct(KundenMeisterService $sdk) {
        $this->sdk = $sdk;
    }


    public function index() {
        return view('dashboard.clients.index', [
            'clients' => $this->sdk->repositories()
                            ->clients()->get()
        ]);
    }

}