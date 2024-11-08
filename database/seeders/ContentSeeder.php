<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contents')->insert([
            ['title' => 'Privacy Policy', 'content' => '<p>Your privacy policy content here...</p>', 'slug' => 'privacy-policy'],
            ['title' => 'Terms and Conditions', 'content' => '<p>Your terms and conditions content here...</p>', 'slug' => 'terms'],
            ['title' => 'FAQ', 'content' => '<p>Your FAQ content here...</p>', 'slug' => 'faq'],
        ]);

    }
}
