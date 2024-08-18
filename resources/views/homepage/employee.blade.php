<section>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            @role('EMPLOYEE')
            @if($user->employee)
                <div class="space-y-4">
                    <div>
                        <x-input-label for="name" :value="__('Nip')" />
                        <p class="text-gray-800 text-sm">{{ $user->employee->nip ?? '-' }}</p>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Status')" />
                        <p class="text-gray-800 text-sm">{{ $user->employee->status_kepegawaian ?? '-' }}</p>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Golongan')" />
                        <p class="text-gray-800 text-sm">{{ $user->employee->golongan ?? '-' }}</p>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Pangkat')" />
                        <p class="text-gray-800 text-sm">{{ $user->employee?->pangkat ?? '-' }}</p>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Jabatan')" />
                        <p class="text-gray-800 text-sm">{{ $user->employee?->jabatan ?? '-' }}</p>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Unit Kerja')" />
                        <p class="text-gray-800 text-sm">{{ $user->employee?->unit_kerja ?? '-' }}</p>
                    </div>
                </div>
            @else
                <p class="mt-6 mb-2">
                    Anda belum mengisi data kepegawaian anda. Untuk melakukan pengisian
                <form id="create-employee" method="post" action="{{ route('profile.create-employee') }}">
                    @csrf
                    <x-secondary-button type="submit" class="">Klik disini <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </x-secondary-button>
                </form>
                </p>
            @endif
            @endrole
        </div>
    </div>
</section>
