<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(): Renderable
    {
        return view('livewire.game.paginated');
    }

    // FUNCTION OUTSIDE RESOURCE ROUTE
    public function showGame(Request $request)
    {
        $gameCode = $request->route('code');
        $questions = Question::where('game_code', $gameCode)->get();

        return view('game', [
            'questions' => $questions,
        ]);
    }

}
