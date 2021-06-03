<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'role' => 'Admin',
        		'keterangan' => 'Memiliki hak akses untuk semua CRUD'
        	],
        	[
        		'role' => 'Pengajar',
        		'keterangan' => 'Guru/ Dosen/ Instruktur/ Pelatih'
        	],
        	[
        		'role' => 'Peserta Didik',
        		'keterangan' => 'Siswa/ Mahasiswa/ Murid'
        	]
        ];

        \DB::table('roles')->insert($roles);
    }
}
