<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $admin = User::create([
            'id_user' => 'USR-00001',
            'nama_depan' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('12345678'),
            'tipe_user' => 'Admin'
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'id_user' => 'USR-00002',
            'nama_depan' => 'User',
            'email' => 'user@app.com',
            'password' => bcrypt('12345678'),
            'tipe_user' => 'User'
        ]);
        $user->assignRole('user');

        $user = User::create([
            'id_user' => 'USR-00003',
            'nama_depan' => 'Ananta',
            'email' => 'ananta@app.com',
            'password' => bcrypt('12345678'),
            'tipe_user' => 'User'
        ]);
        $user->assignRole('user');
    }
}
