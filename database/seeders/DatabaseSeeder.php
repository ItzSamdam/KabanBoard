<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    // }

    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'odevservices@gmail.com',
            'password' => bcrypt('secret'),
            'name' => 'Samuel Damilola',
        ]);

        $this->callWith(BoardSeeder::class, ['userId' => $user->id]);
    }
}
