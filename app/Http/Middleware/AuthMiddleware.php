<?php

namespace App\Http\Middleware;

use App\Services\Contracts\AuthorizationService;
use App\Services\Contracts\Privilege;
use App\Services\Contracts\PrivilegeService;
use App\Services\Contracts\Resource;
use App\Services\KundenMeisterService;
use Closure;
use Illuminate\Contracts\Validation\UnauthorizedException;
use Symfony\Component\Translation\DataCollectorTranslator;

/**
 *  This class verifies that the provided access tokens are valid.
 */
class AuthMiddleware
{
    /**
     * @var KundenMeisterService
     */
    private $sdk;

    public function __construct(KundenMeisterService $sdk) {
        $this->sdk = $sdk;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->sdk->clientUserAuthorized())
            return redirect()->route('dashboard.login');

        return $next($request);
    }
}
