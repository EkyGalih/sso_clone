<section class="ml-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Role') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update role user this account.") }}
        </p>
    </header>

    <form method="post" action="{{ route('user.update-role', $user->id) }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        @foreach($roles as $role)
            <div class="flex">
                <input id="{{ $role->name }}" type="checkbox" name="role[]" value="{{ $role->name }}" class="rounded mr-2" {{ $user->hasRole($role->name) ? 'checked' : '' }}/>
                <x-input-label for="{{ $role->name }}" :value="$role->name" />
            </div>
        @endforeach

        @can('edit-role-management-user')
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'roles-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        @endcan
    </form>
</section>
