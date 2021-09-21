<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Admin Registrasi',
        'email' => 'adminregistrasi@7perempuan.com',
        'phone' => '6281234567890',
        'password' => bcrypt('kelasshirah7p'),
        'registration_status' => 'non registrant',
        'get_free' => 0,
        'role_id' => 2,
        'donor' => 0
      ]);
    }
}
