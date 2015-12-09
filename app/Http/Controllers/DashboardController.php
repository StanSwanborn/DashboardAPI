<?php
namespace App\Http\Controllers;

use App\Services\KundenMeisterService;
use Illuminate\Http\Request;
use SDK\Exceptions\Remote\InvalidCredentialsException;

class DashboardController extends Controller
{
    /** @var KundenMeisterService $sdk */
    private $sdk;

    public function __construct(KundenMeisterService $sdk) {
        $this->sdk = $sdk;
    }

    public function index() {
        return view('dashboard.index', ['applicationId' => $this->sdk->applicationId()]);
    }

    public function login() {
        if($this->sdk->clientUserAuthorized())
            return redirect()->route('dashboard', ['applicationId' => $this->sdk->applicationId()]);

        return view('dashboard.login');
    }

    public function logout() {
        $this->sdk->logout();

        return redirect()->route('dashboard.login')->with('status', 'Successfully logged out.');
    }

    public function authorizeClient(Request $request) {
        $action = $request->input('action');
        switch($action) {
            case 'login':
                // If client is already logged in, return
                if($this->sdk->clientUserAuthorized())
                    return redirect()->route('dashboard', ['applicationId' => $this->sdk->applicationId()])->with('status', 'User already logged in.');

                $username = $request->input('username');
                $password = $request->input('password');

                try {
                    $this->sdk->authorizeClientUser($username, $password);

                    return redirect()->route('dashboard', ['applicationId' => $this->sdk->applicationId()]);
                } catch ( InvalidCredentialsException $e ) {
                    return redirect()->route('dashboard.login')->with('status', 'Invalid credentials provided!');
                }
            break;
        }
    }
}