<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    /**
     * AuthenticationController constructor.
     */
    public function __construct()
    {
        $this->middleware('checkAuthenticated')->only('index');
        $this->middleware('auth')->only(['home', 'logout']);
    }

    /**
     * Handle the request for viewing login page.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Handle the request for viewing admin home page.
     *
     * @return Factory|View
     */
    public function home()
    {
        return view('admin.home');
    }

    /**
     * Handle the request for logging users out.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    /**
     * Handle the request for authenticating users.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended(route('adminHome'));
        }

        $messageBag = new MessageBag();
        $messageBag->add('error', 'Invalid credentials.');

        return redirect()->back()->with(['errors' => $messageBag]);
    }
}
