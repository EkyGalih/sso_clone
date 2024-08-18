<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Employee Data Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your data employee information.") }}
        </p>
    </header>

    @if($user->employee)
        <form method="post" action="{{ route('profile.update-employee') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div class="grid md:grid-cols-2 space-x-4">
                <div class="space-y-4">
                    <div>
                        <x-input-label for="nip" :value="__('Nip')" />
                        <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full" :value="old('nip', $user->employee?->nip)" required autofocus autocomplete="nip" />
                        <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                    </div>
                    <div>
                        <x-input-label for="golongan" :value="__('Golongan')" />
                        <x-text-input id="golongan" name="golongan" type="text" class="mt-1 block w-full" :value="old('golongan', $user->employee?->golongan)" autofocus autocomplete="golongan" />
                        <x-input-error class="mt-2" :messages="$errors->get('golongan')" />
                    </div>
                    <div>
                        <x-input-label for="pangkat" :value="__('Pangkat')" />
                        <x-text-input id="pangkat" name="pangkat" type="text" class="mt-1 block w-full" :value="old('pangkat', $user->employee?->pangkat)" autofocus autocomplete="pangkat" />
                        <x-input-error class="mt-2" :messages="$errors->get('pangkat')" />
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <x-input-label for="status_kepegawaian" :value="__('Status')" />
                        <x-select-input class="mt-1 w-full" name="status_kepegawaian" id="status_kepegawaian">
                            <x-slot name="option">
                                @foreach(\App\Enums\StatusEmployee::cases() as $i)
                                    <option value="{{ $i }}" {{ $i == $user->employee?->status_kepegawaian ? 'selected' : '' }}>{{ $i }}</option>
                                @endforeach
                            </x-slot>
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('status_kepegawaian')" />
                    </div>
                    <div>
                        <x-input-label for="jabatan" :value="__('Jabatan')" />
                        <x-text-input id="jabatan" name="jabatan" type="text" class="mt-1 block w-full" :value="old('jabatan', $user->employee?->jabatan)" autofocus autocomplete="jabatan" />
                        <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
                    </div>
                    <div>
                        <x-input-label for="unit_kerja" :value="__('Unit Kerja')" />
                        <x-text-input id="unit_kerja" name="unit_kerja" type="text" class="mt-1 block w-full" :value="old('unit_kerja', $user->employee?->unit_kerja)" autofocus autocomplete="unit_kerja" />
                        <x-input-error class="mt-2" :messages="$errors->get('unit_kerja')" />
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'employee-updated')
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
</section>
