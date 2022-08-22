<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'John.',
            'last_name' => 'Doe',
            'email' => 'campaigner@demo.com',
            'password' => Hash::make('123456'),
            'gender' => 2,
            'phone' => '(325) 5263-632',
            'address' => '123 Downstreet Ln, Los Angelos, Virginia',
            'country' => 'United State',
            'image' => 'author-img.png',
            'role' => \CAMPAIGNER,

        ]);
        User::create([
            'first_name' => 'Mr.',
            'last_name' => 'Donar',
            'email' => 'donar@demo.com',
            'password' => Hash::make('123456'),
            'gender' => 2,
            'phone' => '(325) 5263-632',
            'address' => '123 Downstreet Ln, Los Angelos, Virginia',
            'country' => 'United State',
            'image' => 'author-img.png',
            'role' => DONAR,
        ]);
    }
}
