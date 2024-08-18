<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/favicon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="p-6 sm:p-0 bg-gray-100 dark:bg-gray-900">
    <div class="p-6">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div class="mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
            <div class="text-lg font-semibold">
                Privacy Policy (Kebijakan Privasi)
            </div>
            <div class="text-xs text-gray-400 mb-5">
                Terakhir diperbarui: 01 Desember 2023
            </div>

            <ol class="list-decimal mb-5">
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Pengantar
                    </div>
                    <div>
                        Selamat datang di Single Sign On (SSO) Pemerintah Provinsi Nusa Tenggara Barat.
                        Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda.
                        Dengan menggunakan layanan kami, Anda setuju dengan ketentuan kebijakan privasi ini.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Informasi yang Kami Kumpulkan
                    </div>
                    <div>
                        a. Informasi Pribadi: Kami dapat mengumpulkan informasi pribadi seperti nama, alamat email, dan informasi kontak lainnya yang Anda berikan saat mendaftar atau menggunakan layanan kami.

                        b. Informasi Penggunaan: Kami dapat mengumpulkan informasi tentang cara Anda menggunakan layanan kami, seperti data koneksi jaringan, data log, aktivitas browser, dan informasi perangkat.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Penggunaan Informasi
                    </div>
                    <div>
                        Kami menggunakan informasi yang kami kumpulkan untuk:
                        <div class="list-disc">
                            <div>
                                Menyediakan layanan autentikasi secara terpusat sehingga meningkatkan tingkat kredibilitas pengguna.
                            </div>
                            <div>
                                Memperbaiki dan mengoptimalkan seluruh layanan yang berada pada ruang lingkup Pemerintah Provinsi Nusa Tenggara Barat.
                            </div>
                            <div>
                                Mengirimkan pembaruan, pemberitahuan, dan informasi terkait layanan yang berada pada ruang lingkup Pemerintah Provinsi Nusa Tenggara Barat.
                            </div>
                        </div>
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Berbagi Informasi
                    </div>
                    <div>
                        Kami tidak akan menjual, menyewakan, atau mentransfer informasi pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali yang dijelaskan dalam kebijakan ini atau sebagaimana diizinkan atau diwajibkan oleh hukum.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Keamanan Informasi
                    </div>
                    <div>
                        Kami mengambil langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dari akses yang tidak sah atau penggunaan yang tidak sah.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Cookie dan Teknologi Serupa
                    </div>
                    <div>
                        Kami dapat menggunakan cookie dan teknologi serupa untuk menyimpan informasi tentang preferensi Anda dan meningkatkan pengalaman pengguna.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Tautan ke Situs Lain
                    </div>
                    <div>
                        Layanan kami dapat berisi tautan ke situs web pihak ketiga. Kami tidak bertanggung jawab atas kebijakan privasi atau konten situs web tersebut.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Perubahan pada Kebijakan Privasi
                    </div>
                    <div>
                        Kebijakan privasi ini dapat diperbarui dari waktu ke waktu. Perubahan signifikan akan diberitahukan dengan cara yang sesuai.
                    </div>
                </li>
                <li class="ml-4 mb-2">
                    <div class="font-bold">
                        Kontak
                    </div>
                    <div>
                        Jika Anda memiliki pertanyaan atau kekhawatiran mengenai kebijakan privasi kami, hubungi kami di kominfotik@ntbprov.go.id atau ke Dinas Komunikasi Informatika dan Statistik Provinsi Nusa Tenggara Barat.
                    </div>
                </li>
            </ol>
            <div>
                Terima kasih atas kepercayaan Anda pada Single Sign On (SSO) Pemerintah Provinsi Nusa Tenggara Barat.
                <br>
                Dengan menggunakan layanan kami, Anda setuju dengan kebijakan privasi ini.
            </div>
        </div>
    </div>

</div>
</body>
</html>
