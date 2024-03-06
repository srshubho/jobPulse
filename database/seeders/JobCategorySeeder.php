<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_categories')->insert([
            [
                'title' => 'IT',
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'title' => 'Design',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Finance',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'HR',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Sales',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
