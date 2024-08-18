<section class="ml-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('user.update-information', $user->id) }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="name" :value="__('Phone Number')" />
            <x-text-input id="name" name="number_phone" type="text" class="mt-1 block w-full" :value="old('number_phone', $user->profile?->number_phone)" autofocus autocomplete="number_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('number_phone')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Whatsapp Number')" />
            <x-text-input id="name" name="number_whatsapp" type="text" class="mt-1 block w-full" :value="old('number_whatsapp', $user->profile?->number_whatsapp)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('number_whatsapp')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Email Recovery')" />

            <div class="relative">

                <x-text-input id="name" name="email_recovery" type="email" class="mt-1 block w-full" :value="old('email_recovery', $user->profile?->email_recovery)" autofocus autocomplete="email_recovery" />
                @if($user->profile?->email_recovery_verified_at == null)
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-red-600 text-sm leading-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                @else
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-green-600 text-sm leading-5">
                        <div class="group relative w-max">
                            <button>Click me!</button>
                            <span class="pointer-events-none bg-gray-500 text-white absolute -top-7 left-0 w-max opacity-0 transition-opacity group-hover:opacity-100">This is a button.</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                @endif
            </div>
        </div>

        @can('edit-profile-management-user')
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
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
