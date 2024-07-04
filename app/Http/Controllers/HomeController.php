<?php

namespace App\Http\Controllers;

use App\Checkboxes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $state = (new Checkboxes());

        return view('home', [
            'count' => $state->count(),
            'state' => $state->all(),
        ]);
    }
}
