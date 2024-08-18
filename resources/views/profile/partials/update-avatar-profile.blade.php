<section class="mr-4 ">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your avatar") }}
        </p>
    </header>
    <form method="post" action="{{ route('profile.update-avatar') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div class="flex content-center justify-center">
            <div class="w-1/2">
                @if($user->profile->avatar == null)
                    <x-avatar-alphabet :alphabet="substr($user->name, 0, 1)"/>
                @else
                    <img src="{{ asset('storage/'.$user->profile->avatar ?? '') }}" alt="avatar">
                @endif
            </div>
        </div>

        <div>
            <div class="relative">
                <input type="file" name="avatar">
                <x-primary-button type="submit">
                    Upload
                </x-primary-button>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            <p class="mt-2 font-medium text-sm text-gray-600">
                {{ __('Use portrait size for maximum results') }}
            </p>
        </div>
        <div>
        </div>
    </form>
</section>
