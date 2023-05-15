<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = User::create([
            'name' => 'Rachmad Suharja',
            'username' => 'root',
            'email' => Hash::make('admin@root.dev'),
            'password' => Hash::make('root'),
            'role' => 'admin',
        ]);
        $admin = Admin::create([
            'name' => $data->name,
            'username' => $data->username,
            'password' => $data->password,
        ]);

        $data->save();
        $admin->save();
    }
}
