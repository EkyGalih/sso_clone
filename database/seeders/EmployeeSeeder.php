<?php

namespace Database\Seeders;

use App\Enums\StatusEmployee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Excel::toArray(new \stdClass(), public_path('imports/20230616-pegawai.xlsx'));
        $DATE_NOW = Carbon::now();
        foreach ($data[0] as $key => $row){
            /*
             * INI UNTUK SKIP JUDUL KARENA BARIS PERTAMA MERUPAKAN JUDUL IMPORT DATA
             */
            if ($key < 1) continue;

            $nip = str_replace("`", "", $row[0]);

            User::updateOrCreate(
                [
                    'email' => "$row[3]@$row[4]",
                ],[
                    'name' => str_replace("'", "`", $row[1]),
                    'email_verified_at' => $DATE_NOW,
                    'password' => Hash::make($nip),
                    'nip' => $nip,
                ]
            )->assignRole('EMPLOYEE')
                ->employee()->updateOrCreate(
                [
                    'nip' => $nip,
                    'status_kepegawaian' => StatusEmployee::PNS
                ]
            );

            $this->command->info(implode(" ", $row));
//            if ($key > 10 ) break;
        }
    }
}
