<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTablSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Mr. Admin',
            'email' => 'admin@admin.com',
            'password' =>Hash::make('password'),
            'is_active' =>true,
            'image' =>'author-img.png',
            'pl_bio' =>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alterations in some form, by insertion of humor or randomly chosen words that have not yet been used.',
            'sl_bio' =>'Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeurig gekozen woorden die nog.',
            'role' =>SUPER,
        ]);
    }

}
