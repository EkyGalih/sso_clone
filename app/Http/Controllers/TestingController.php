<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Client;

class TestingController extends Controller
{
    public function custom_authorize_passport_view()
    {
        $client = Client::where('user_id', 1)->first();
        return view('passport::authorize')
            ->with('scopes', [])
            ->with('client', $client);
    }
}
