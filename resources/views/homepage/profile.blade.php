<section>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="grid grid-cols-5 gap-4 items-center mb-4">
                <div class="">
                    @if($user->profile->avatar == null)
                        <x-avatar-alphabet :alphabet="substr($user->name, 0, 1)"/>
                    @else
                        <img src="{{ asset('storage/'.$user->profile->avatar ?? '') }}" alt="avatar">
                    @endif
                </div>
                <div class="col-span-4 space-y-3">
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <p class="text-gray-800 text-sm">{{ $user->name }}</p>
                    </div>
                </div>
            </div>
            <div class="space-y-4 col-span-3">
                <div>
                    <x-input-label for="name" :value="__('Email')" />
                    <p class="text-gray-800 text-sm">{{ $user->email }}</p>
                </div>
                <div>
                    <x-input-label for="name" :value="__('Phone Number')" />
                    <p class="text-gray-800 text-sm">{{ $user->profile->number_phone ?? '-' }}</p>
                </div>
                <div>
                    <x-input-label for="name" :value="__('Whatsapp Number')" />
                    <p class="text-gray-800 text-sm">{{ $user->profile->number_whatsapp ?? '-' }}</p>
                </div>
                <div>
                    <x-input-label for="name" :value="__('Email Recovery')" />
                    <p class="text-gray-800 text-sm">{{ $user->profile->email_recovery ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
