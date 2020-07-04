<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailResendRequest;
use App\Services\Auth\VerifyService;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class VerificationController
 * @package App\Http\Controllers\Auth
 *
 * This controller is responsible for handling email verification for any
 * user that recently registered with the application.
 */
class VerificationController extends Controller
{
    /**
     * Service for verify the email user.
     *
     * @var VerifyService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param VerifyService $service
     */
    public function __construct(VerifyService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    /**
     * Show the email verification notice.
     *
     * @return View|RedirectResponse|Redirector
     */
    public function show()
    {
        return view('auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param $token
     * @return RedirectResponse
     *
     */
    public function verify($token)
    {
        try {
            $user = $this->service->verify($token);
            Auth::login($user);
            return redirect('/home');
        }catch (\DomainException $error){
            return redirect('/login')->with('error', $error->getMessage());
        }
    }

    /**
     * Resend the email verification notification.
     *
     * @param  EmailResendRequest  $request
     * @return RedirectResponse
     */
    public function resend(EmailResendRequest $request)
    {
        try {
            $this->service->resend($request->email);
            return back()->with('success', 'Check your email.');
        }catch (\DomainException $error){
            return back()->with('error', $error->getMessage());
        }
    }
}
