<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'admin',
            'nomorInduk'=> 'ADM001',
            'role'      => 'admin',
            'email'     => 'admin@mataram-sh.com',
            'password'  => bcrypt('passadmin')
        ]);

        User::create([
            'name'      => 'mentor',
            'nomorInduk'=> 'MTR001',
            'role'      => 'mentor',
            'email'     => 'mentor@mataram-sh.com',
            'password'  => bcrypt('passmentor')
        ]);

        User::create([
            'name'      => 'peserta',
            'nomorInduk'=> 'SIS001',
            'role'      => 'peserta',
            'email'     => 'peserta@mataram-sh.com',
            'password'  => bcrypt('passpeserta')
        ]);
    }
}
