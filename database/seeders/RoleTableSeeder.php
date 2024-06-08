<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Log;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = config()->get('constants.ROLES'); 
        Role::insert($role);
        
        Log::info(__METHOD__ . " | Success: Seeding completed successfully.");
    }
}
