<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Log;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = config()->get('constants.TAGS'); 
        Tag::insert($tag);
        
        Log::info(__METHOD__ . " | Success: Seeding completed successfully.");
    }
}
