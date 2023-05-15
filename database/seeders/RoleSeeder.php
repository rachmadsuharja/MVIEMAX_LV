<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Rookie',
            'features' => 'Badge, Free Ads, 720p Quality',
            'price' => '65000',
            'role_limit' => '1'
        ]);
        Role::create([
            'name' => 'Pro',
            'features' => 'Badge, Free Ads, 1080p Quality, Download Standar Resolution',
            'price' => '159000',
            'role_limit' => '1'
        ]);
        Role::create([
            'name' => 'Master',
            'features' => 'Badge, Free Ads, 4K+HDR Quality, Download High Resolution',
            'price' => '259000',
            'role_limit' => '1'
        ]);
    }
}
