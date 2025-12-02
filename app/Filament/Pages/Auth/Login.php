<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;

class Login extends BaseLogin
{
    public function authenticate(): ?LoginResponse
    {
        $data = $this->form->getState();

        $login = $data['email'];
        $password = $data['password'];
        $remember = $data['remember'] ?? false;

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (! Auth::attempt([$field => $login, 'password' => $password], $remember)) {
            $this->throwFailureValidationException();
            return null;
        }

        return app(LoginResponse::class);
    }

    protected function getEmailFormComponent(): TextInput
    {
        return TextInput::make('email')
            ->label('Email atau Username')
            ->placeholder('Masukkan email atau username')
            ->required();
    }

    protected function getPasswordFormComponent(): \Filament\Forms\Components\TextInput
    {
        return \Filament\Forms\Components\TextInput::make('password')
            ->label('Password')
            ->password()
            ->placeholder('Masukkan password Anda');
    }
}