<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamMember::create([
            'name' => 'Johnathon Trailor',
            'pl_designation' => 'Head Of Idea',
            'sl_designation' => "Chef d'idée",
            'image' => 'team-img-1.png',
            'active_status' => true
        ]);

        TeamMember::create([
            'name' => 'Aguestine Mithe',
            'pl_designation' => 'Accountent',
            'sl_designation' => "Akcontent",
            'image' => 'team-img-2.png',
            'active_status' => true
        ]);

        TeamMember::create([
            'name' => 'Haiafa Karloza',
            'pl_designation' => 'Manager',
            'sl_designation' => "Directrice",
            'image' => 'team-img-3.png',
            'active_status' => true
        ]);

        TeamMember::create([
            'name' => 'Johnathon Trailor',
            'pl_designation' => 'Head Of Idea',
            'sl_designation' => "Chef d'idée",
            'image' => 'team-img-1.png',
            'active_status' => true
        ]);

        TeamMember::create([
            'name' => 'Johnathon Trailor',
            'pl_designation' => 'Head Of Idea',
            'sl_designation' => "Chef d'idée",
            'image' => 'team-img-1.png',
            'active_status' => true
        ]);

        TeamMember::create([
            'name' => 'Aguestine Mithe',
            'pl_designation' => 'Accountent',
            'sl_designation' => "Akcontent",
            'image' => 'team-img-2.png',
            'active_status' => true
        ]);

    }
}
