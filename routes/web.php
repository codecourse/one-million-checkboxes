<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::login(new User());

Route::get('/', HomeController::class);
