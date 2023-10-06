<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($userId): void
    {
        Board::factory()->create([
            'title' => fake()->company() . ' Board',
            'user_id' => $userId,
        ])->each(function ($board) {
            $this->callWith(ColumnSeeder::class, [
                'board' => $board->id,
                'title' => fake()->userName()
            ]);

            Column::all()->each(function ($column) {
                $this->callWith(CardSeeder::class, ['column' => $column->id]);
            });
        });
    }
}
