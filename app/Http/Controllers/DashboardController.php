<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SDK\KundenMeister;

class DashboardController extends Controller
{
    /** @var KundenMeister $sdk */
    private $sdk;

    public function __construct() {
        $this->sdk = new KundenMeister(6, 'q0CTixlOPnB42Yf9gzcOVMPY43W1CizBswiDf8lQNHlsY6ZpklfkcJlHHmOG1n95Anv2zbYcAt8k9hcXOaMK0IqyrhIvOa2GNb1IFZeUREMrTaUEkYvTK53w1Pmc7jBc', 'http://localhost:8081/index.php/');
        $this->sdk->initialize();
    }

    public function index() {
        if(!$this->sdk->clientUserAuthorized())
            return redirect()->route('dashboard.login');

        $user = $this->sdk->userManagement()->me();

        return view('dashboard.index', ['user' => $user]);
    }

    public function login() {
        if($this->sdk->clientUserAuthorized())
            return redirect()->route('dashboard');

        return view('dashboard.login');
    }

    public function authorizeClient(Request $request) {
        $action = $request->input('action');
        switch($action) {
            case 'login':
                // If client is already logged in, return
                if($this->sdk->clientUserAuthorized())
                    return redirect()->route('dashboard.login')->with('status', 'jammerjoh');

                $username = $request->input('username');
                $password = $request->input('password');
                $this->sdk->authorizeClientUser($username, $password);

                if($this->sdk->clientUserAuthorized())
                    return redirect()->route('dashboard');
                else
                    return redirect()->route('dashboard.login')->with('status', 'jammerjoh');
                break;
        }
    }
}