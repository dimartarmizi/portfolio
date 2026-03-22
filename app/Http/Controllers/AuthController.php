<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
	public function create(): Response
	{
		return Inertia::render('Admin/Auth/Login');
	}

	public function store(LoginRequest $request): RedirectResponse
	{
		$credentials = $request->validated();

		$loginField = $request->loginField();

		if (Auth::attempt([
			$loginField => $credentials['login'],
			'password' => $credentials['password'],
		], $request->boolean('remember'))) {
			$request->session()->regenerate();

			return redirect()->intended(route('admin.dashboard'));
		}

		return back()->withErrors([
			'login' => 'The provided credentials are incorrect.',
		])->onlyInput('login');
	}

	public function destroy(Request $request): RedirectResponse
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('login');
	}
}