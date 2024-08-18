<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Client Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your client for integrations with SSO.") }}
        </p>
    </header>

    <form method="post" action="{{ route('developer.my-integrations.update-information', $client->id) }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <p class="text-sm mt-2 text-gray-600 dark:text-gray-200">
                {{ __('Please insert name your client apps.') }}
            </p>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $client->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Provider')" />
            <x-text-input id="name" name="provider" type="text" class="mt-1 block w-full" :value="old('provider', $client->provider)" autofocus autocomplete="provider" />
            <x-input-error class="mt-2" :messages="$errors->get('provider')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Redirect')" />
            <p class="text-sm mt-2 text-gray-600 dark:text-gray-200">
                {{ __('Please insert redirect with url callback from your client apps.') }}
            </p>
            <x-text-input id="name" name="redirect" type="text" class="mt-1 block w-full" :value="old('redirect', $client->redirect)" required autofocus autocomplete="redirect" />
            <x-input-error class="mt-2" :messages="$errors->get('redirect')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'information-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
