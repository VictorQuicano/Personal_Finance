<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;

Route::
get('/', Login::class)->name('login');