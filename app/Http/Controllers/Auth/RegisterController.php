<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 *
 * This class handles the registration of new users
 * as well as their validation and creation.
 */
class RegisterController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Service for registers the user.
     *
     * @var RegisterService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param RegisterService $service
     */
    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    /**
     * Show the application registration form.
     *
     * @return View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Redirector
     */
    public function register(RegisterRequest $request)
    {
        $this->service->register($request);

        return redirect($this->redirectPath())
            ->with('success', 'Check your email and click on the link to verify.');
    }
}
