<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        // ]);
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@jobPulse.com',
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user',
                'email' => 'user@jobPulse.com',
                'password' => Hash::make('password'),
                'user_type' => 'candidate',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'company',
                'email' => 'company@jobPulse.com',
                'password' => Hash::make('password'),
                'user_type' => 'company',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
        $user = DB::table('users')->where('email', 'company@jobPulse.com')->first();
        DB::table('companies')->insert([
            'user_id' => $user->id,

        ]);
    }
}
