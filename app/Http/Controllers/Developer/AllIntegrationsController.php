<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Laravel\Passport\Client;

class AllIntegrationsController extends Controller
{
    public function index() : View
    {
        $data = Client::query();
        if ($q = request()->get('q')){
            $data = $data->where('name', 'like', '%'.$q.'%')
                ->orWhere('id', 'like', '%'.$q.'%')
                ->orWhere('provider', 'like', '%'.$q.'%')
                ->orWhere('redirect', 'like', '%'.$q.'%');
        }
        return view('developers.all-integrations.index',[
            'clients' => $data->paginate(20)
        ]);
    }

    public function show($clientId) : View
    {
        return view('developers.all-integrations.show', [
            'client' => Client::where('id', $clientId)->first()
        ]);
    }

    public function destroy(Request $request) : RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $clientId = $request->client_id;
        $client = Client::where('id', $clientId)->delete();
        return Redirect::route('developer.all-integrations.index');
    }
}
