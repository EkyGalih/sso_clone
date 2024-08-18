<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Client Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Detail about client information.") }}
        </p>
    </header>

    <div class="mt-6 space-y-4">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ $client->name }}
            </p>
        </div>
        <div>
            <x-input-label for="name" :value="__('Provider')" />
            <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ $client->provider ?? '-' }}
            </p>
        </div>
        <div>
            <x-input-label for="name" :value="__('Redirect')" />
            <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ $client->redirect }}
            </p>
        </div>
        <div>
            <x-input-label for="name" :value="__('Created at')" />
            <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ $client->created_at }}
            </p>
        </div>
        <div>
            <x-input-label for="name" :value="__('Updated at')" />
            <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ $client->updated_at }}
            </p>
        </div>
        <div>
            <x-input-label for="name" :value="__('User')" />
            <p class="text-sm text-gray-600 dark:text-gray-200">
                {{ $client->user->name ?? '' }} - {{ $client->user->email ?? '' }}
            </p>
        </div>
    </div>
</section>
