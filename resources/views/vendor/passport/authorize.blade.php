<x-guest-layout>
    <div class="">
        <h4 class="font-semibold">Permintaan Otorisasi / Authorization Request</h4>
        <div class="mb-5 flex">
{{--            <div class="mr-1 font-semibold">{{ $client->name }}</div> is requesting permission to access your account.--}}
            <div class="mr-1 font-semibold">{{ $client->name }}</div> meminta izin untuk mengakses akun Anda.
        </div>
    </div>
    <div class="my-2">
        @if (count($scopes) > 0)
            <div class="scopes">
                <p><strong>This application will be able to:</strong></p>
                <ul>
                    @foreach ($scopes as $scope)
                        <li>{{ $scope->description }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="flex">
        <form method="post" action="{{ route('passport.authorizations.approve') }}">
            @csrf
            <input type="hidden" name="state" value="{{ $request->state }}">
            <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
            <input type="hidden" name="auth_token" value="{{ $authToken }}">
            <x-primary-button class="mr-1">
                Authorize
            </x-primary-button>
        </form>
        <form method="post" action="{{ route('passport.authorizations.deny') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="state" value="{{ $request->state }}">
            <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
            <input type="hidden" name="auth_token" value="{{ $authToken }}">
            <x-secondary-button>
                <div class="mx-3">{{ __('Cancel') }}</div>
            </x-secondary-button>
        </form>
    </div>
</x-guest-layout>



{{--<body class="passport-authorize">--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card card-default">--}}
{{--                <div class="card-header">--}}
{{--                    Authorization Request--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <!-- Introduction -->--}}
{{--                    <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>--}}

{{--                    <!-- Scope List -->--}}
{{--                    @if (count($scopes) > 0)--}}
{{--                        <div class="scopes">--}}
{{--                            <p><strong>This application will be able to:</strong></p>--}}

{{--                            <ul>--}}
{{--                                @foreach ($scopes as $scope)--}}
{{--                                    <li>{{ $scope->description }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <div class="buttons">--}}
{{--                        <!-- Authorize Button -->--}}
{{--                        <form method="post" action="{{ route('passport.authorizations.approve') }}">--}}
{{--                            @csrf--}}

{{--                            <input type="hidden" name="state" value="{{ $request->state }}">--}}
{{--                            <input type="hidden" name="client_id" value="{{ $client->getKey() }}">--}}
{{--                            <input type="hidden" name="auth_token" value="{{ $authToken }}">--}}
{{--                            <button type="submit" class="btn btn-success btn-approve">Authorize</button>--}}
{{--                        </form>--}}

{{--                        <!-- Cancel Button -->--}}
{{--                        <form method="post" action="{{ route('passport.authorizations.deny') }}">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}

{{--                            <input type="hidden" name="state" value="{{ $request->state }}">--}}
{{--                            <input type="hidden" name="client_id" value="{{ $client->getKey() }}">--}}
{{--                            <input type="hidden" name="auth_token" value="{{ $authToken }}">--}}
{{--                            <button class="btn btn-danger">Cancel</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
