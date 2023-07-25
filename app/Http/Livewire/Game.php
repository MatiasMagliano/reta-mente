<?php

namespace App\Http\Livewire;

use App\Models\Game as GameModel;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Livewire\WithPagination;

class Game extends Component
{
    use WithPagination;

    /* COMPONENT PARAMS */
    public $page_length = 5;
    public $search_terms;
    protected $queryString = [
        'search_terms' => ['except' => ''],
        'page_length' => ['except' => '5']
    ];


    /* COMPONENT METHODS */
    public function render(): Renderable
    {
        return view('livewire.game', [
            'games' => GameModel::where('name', 'LIKE' , "%{$this->search_terms}%")
                ->orWhere('game_code', 'LIKE' , "%{$this->search_terms}%")
                ->paginate($this->page_length)
        ]);
    }

    public function clear()
    {
        $this->search_terms = '';
        $this->page_length = '5';
    }
}
