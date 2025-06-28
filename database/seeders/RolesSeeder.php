<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Correct placement of the 'use' statement

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles in the database
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'hr']);
        Role::create(['name' => 'reviewer']);
        Role::create(['name' => 'applicant']);
    }
}
