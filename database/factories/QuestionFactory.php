<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $question_type = ['multiple_choice', 'true_false', 'fill_the_gap'];
        $question_selection = $question_type[array_rand($question_type)];
        switch($question_selection)
        {
            case 'multiple_choice':
                $choices = $this->faker->words(3);
                $correct_answer = $choices[array_rand($choices)];
                return [
                    'question'       => $this->faker->sentence(5, true),
                    'correct_answer' => $correct_answer,
                    'score'          => $this->faker->randomDigit(),
                    'question_type'  => $question_selection,
                    'choices'        => json_encode($choices),
                ];
            break;

            case 'true_false':
                $question = $this->faker->sentence(5, true);
                $correct_answer = array_rand(['True', 'False']);
                return [
                    'question'       => $question,
                    'correct_answer' => $correct_answer,
                    'score'          => $this->faker->randomDigit(),
                    'question_type'  => $question_selection,
                ];
            break;

            case 'fill_the_gap': // complete the missing word with the options
                $question = $this->faker->words(5); //generates the question
                $missing_word = array_rand($question); // selects a position of random word
                $correct_answer = $question[$missing_word]; // reserves the missiong word
                $question[$missing_word] = '______'; // replaces the selected word with "_____"
                $question = implode(" ", $question); //cast the array to string
                $choices = $this->faker->words(2); // set the choices for the question
                array_push($choices, $correct_answer);
                shuffle($choices);
                return [
                    'question'       => $question,
                    'correct_answer' => $correct_answer,
                    'score'          => $this->faker->randomDigit(),
                    'question_type'  => $question_selection,
                    'choices'        => json_encode($choices)
                ];
            break;
        }
    }
}
