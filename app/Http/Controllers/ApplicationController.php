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
        return view('dashboard.clients.applications.index', [
            'applications' => $this->sdk->repositories()->applications()->getApplications($clientId, $request->get('page') * 50, 50, $request->get('where')),
            'clientId' => $clientId,
            'clientName'=> $this->sdk->repositories()->clients()->getClient($clientId)->name_mandant
        ]);
    }

    public function details($clientId, $applicationId) {
        return view('dashboard.clients.applications.details', [
            'application' => $this->sdk->repositories()->applications()->getApplication($clientId, $applicationId),
            'clientId' => $clientId,
            'applicationId' => $applicationId,
            'clientName'=> $this->sdk->repositories()->clients()->getClient($clientId)->name_mandant
        ]);
    }

    public function edit($clientId, $applicationId) {
        return view('dashboard.clients.applications.edit', [
            'application' => $this->sdk->repositories()->applications()->getApplication($clientId, $applicationId),
            'clientId' => $clientId,
            'applicationId' => $applicationId,
            'clientName'=> $this->sdk->repositories()->clients()->getClient($clientId)->name_mandant
        ]);
    }

    public function delete($clientId, $applicationId) {
        $result = $this->sdk
            ->repositories()
            ->applications()
            ->deleteApplication($clientId, $applicationId);

        if(!$result)
            return redirect()->back()->with('error', 'Failed to delete application!');
        
        return redirect()->route('dashboard.client.application', ['clientId' => $clientId])->with('success', 'Application deleted!');
    }
}