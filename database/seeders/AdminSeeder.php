<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        	'name' => 'admin',
	        'email' => 'akhsanfadil@gmail.com',
	        'password' => bcrypt('Testing123'),
	        'role_id' => '1',
	        'nomor_identitas' => '-',
	        'alamat' => '-',
	        'no_tlp' => '-',
	        'sekolah' => '-',
        ];

        \DB::table('users')->insert($admin);
    }
}
