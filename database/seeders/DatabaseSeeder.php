<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $roleAdmin = ModelsRole::create([
            'name' => 'admin',
            'guard_name' => 'web',
    
        ]);
        $roleUser = ModelsRole::create([
            'name' => 'user',
            'guard_name' => 'web',
    
        ]);

        $user = User::create([
            'nama' => 'Admin',
            'email' => 'admin2@mail.com',
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole('admin');
    }
}
