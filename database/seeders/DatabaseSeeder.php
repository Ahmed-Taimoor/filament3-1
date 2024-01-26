<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Course::factory(20)->create();
        \App\Models\Student::factory(100)->create();
        // $courseIds = \App\Models\Course::pluck('id');
        // \App\Models\Student::all()->each(function ($student) use ($courseIds) {
        //     $student->courses()->attach($courseIds->random());
        // });

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);
    }
}