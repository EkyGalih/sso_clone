<section class="ml-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Permission') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update permissions for this role.") }}
        </p>
    </header>

    <form method="post" action="{{ route('role.update-permission', $role->id) }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        @foreach($permissions as $permission)
            <div class="flex">
                <input id="{{ $permission->name }}" type="checkbox" name="permission[]" value="{{ $permission->name }}" class="rounded mr-2" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}/>
                <x-input-label for="{{ $permission->name }}" :value="$permission->name" />
            </div>
        @endforeach

        @can('edit-permissions-management-role')
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'permissions-updated')
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
