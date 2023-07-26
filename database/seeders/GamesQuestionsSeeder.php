<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxGames = rand(5, 20);
        for($i = 0; $i < $maxGames; $i++)
        {
            $game = Game::factory()->create();
            $max_questions = rand(5, 10);
            for($j = 0; $j < $max_questions; $j++)
            {
                $question = Question::factory()->create();
                $game->questions()->attach($question);
            }
        }
    }
}
