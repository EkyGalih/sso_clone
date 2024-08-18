<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('ClientID') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('If you want to know about ID and Secret this client please click this bottom.') }}
        </p>
    </header>

    <x-secondary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'modal-id-secret')"
    >{{ __('Client ID and Secret') }}</x-secondary-button>

    <x-modal name="modal-id-secret" focusable>
        <div class="p-4">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Please save and copy this ID and Secret on your Apps') }}
            </h2>
            <div class="mt-6">
                <x-input-label value="{{ __('Client ID') }}" />
                <x-text-input
                    type="text"
                    class="mt-1 block w-full"
                    readonly
                    value="{{ $client->id }}"
                />
            </div>
            <div class="mt-4">
                <x-input-label value="{{ __('Client Secret') }}" />
                <x-text-input
                    type="text"
                    class="mt-1 block w-full"
                    readonly
                    value="{{ $client->secret }}"
                />
            </div>
        </div>
    </x-modal>
</section>
