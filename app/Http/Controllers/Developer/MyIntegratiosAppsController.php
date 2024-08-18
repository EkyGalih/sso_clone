<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyIntegrations\AddClientRequest;
use App\Http\Requests\MyIntegrations\UpdateInformationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Passport\Client;

class MyIntegratiosAppsController extends Controller
{
    public function index() : View
    {
        return view('developers.my-integrations.index', [
            'clients' => auth()->user()->clients
        ]);
    }

    public function create() : View
    {
        return view('developers.my-integrations.create');
    }

    public function store(AddClientRequest $request)
    {
        $request->validated();
        $request['user_id'] = auth()->id();
        $request['secret'] = Str::random(40);
        $request['personal_access_client'] = false;
        $request['password_client'] = false;
        $request['revoked'] = false;

        $client = new Client();
        $client->fill($request->all());
        $client->save();

        return Redirect::route('developer.my-integrations.show', $client->id)->with('status', 'information-updated');
    }

    public function show($clientId) : View
    {
        return view('developers.my-integrations.show', [
            'client' => auth()->user()->clients->where('id', $clientId)->first()
        ]);
    }

    public function updateInformation($clientId, UpdateInformationRequest $request) : RedirectResponse
    {
        $client = auth()->user()->clients->where('id', $clientId)->first();
        $client->update($request->validated());
        return Redirect::route('developer.my-integrations.show', $clientId)->with('status', 'information-updated');
    }

    public function destroy(Request $request) : RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $clientId = $request->client_id;
        $client = auth()->user()->clients->where('id', $clientId)->first();
        if ($client) $client->delete();
        return Redirect::route('developer.my-integrations.index');
    }
}
