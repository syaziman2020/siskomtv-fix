<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pegawai = [
            [
                'position' => 'Ketua Jurusan',
                'name' => 'Ikhwan Ruslianto',
                'nip' => '12232434344',
                'image' => '6537543576777d65376',
                'users_id' => 2
            ],
            [
                'position' => 'Sekretaris',
                'name' => 'Rahmi',
                'nip' => '12232434344',
                'image' => '6537543576777d65376',
                'users_id' => 3
            ],
        ];
        DB::table('employee_data')->insert($pegawai);
    }
}
