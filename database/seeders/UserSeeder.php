<?php

namespace Database\Seeders;

use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $User = [
            [
                'name' => 'Muhammad Danil',
                'role' => 0,
                'nisn' => 0,
                'password' => bcrypt('test12345')

            ],
            [
                'name' => 'Zeta Vestia',
                'role' => 2,
                'nisn' => 2,
                'password' => bcrypt('zeta12345')
            ],
            [
                'name' => 'Kobo kanaeru',
                'role' => 1,
                'nisn' => 123456784,
                'password' => bcrypt('kobo12345')
            ],
            [
                'name' => 'Kaela Kovalskia',
                'role' => 1,
                'nisn' => 123456783,
                'password' => bcrypt('kobo12345')
            ],
            [
                'name' => 'Moona Hashinova',
                'role' => 1,
                'nisn' => 123456782,
                'password' => bcrypt('kobo12345')
            ],
            [
                'name' => 'Kereji ollie',
                'role' => 1,
                'nisn' => 123456781,
                'password' => bcrypt('kobo12345')
            ],
            [
                'name' => 'Fatma Dwi Safitri',
                'role' => 1,
                'nisn' => 123456681,
                'password' => bcrypt('fatma12345')
            ],
            [
                'name' => 'Irfanda',
                'role' => 1,
                'nisn' => 121456781,
                'password' => bcrypt('irfanda12345')
            ],
            [
                'name' => 'Zacky Aulya Rahman P',
                'role' => 1,
                'nisn' => 12345678121,
                'password' => bcrypt('zacky12345')
            ],
            [
                'name' => 'M Danish Hakim',
                'role' => 1,
                'nisn' => 123446781,
                'password' => bcrypt('danish12345')
            ],
            [
                'name' => 'Gefri',
                'role' => 1,
                'nisn' => 1234588781,
                'password' => bcrypt('gefri12345')
            ],
            [
                'name' => 'Ayunda Risu',
                'role' => 1,
                'nisn' => 827365029,
                'password' => bcrypt('risu12345')
            ],
            ];

            foreach($User as $user){
                User::create($user);
            }
    }
}
