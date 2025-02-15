<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    public string $email = '';
    public string $password = '';

    public function login()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            if(auth()->user()->hasVerifiedEmail()){
                flash()->success('Please verify your email!');;
            }else{
                auth()->logout();
                flash()->error('Please verify your email!');;
            }
        }
        else {
            flash()->error('Invalid credentials!');
        }
    }
}