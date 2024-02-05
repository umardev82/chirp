<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(["name"=> "admin"]);
        Role::create(["name"=> "publisher"]);

        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@cpc.com',
            'password'=> Hash::make('123456789'),
        ]);
        
        $publisher = \App\Models\User::create([
            'name' => 'Publisher',
            'email' => 'publisher@cpc.com',
            'password'=> Hash::make('123456789'),
        ]);

        $admin->assignRole('admin');
        $publisher->assignRole('publisher');

    }
}
