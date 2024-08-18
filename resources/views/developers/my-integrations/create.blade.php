<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Client Information') }}
                        </h2>
                    </header>
                    <form method="post" action="{{ route('developer.my-integrations.store') }}" class="mt-6 space-y-4">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <p class="text-sm mt-2 text-gray-600 dark:text-gray-200">
                                {{ __('Please insert name your client apps.') }}
                            </p>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Provider')" />
                            <x-text-input id="name" name="provider" type="text" class="mt-1 block w-full" :value="old('provider')" autofocus autocomplete="provider" />
                            <x-input-error class="mt-2" :messages="$errors->get('provider')" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Redirect')" />
                            <p class="text-sm mt-2 text-gray-600 dark:text-gray-200">
                                {{ __('Please insert redirect with url callback from your client apps.') }}
                            </p>
                            <x-text-input id="name" name="redirect" type="text" class="mt-1 block w-full" :value="old('redirect')" required autofocus autocomplete="redirect" />
                            <x-input-error class="mt-2" :messages="$errors->get('redirect')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-secondary-link href="{{ route('developer.my-integrations.index') }}">{{ __('Cancel') }}</x-secondary-link>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
