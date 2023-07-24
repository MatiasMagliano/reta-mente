<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_code',
    ];

    // RELACIONES
    public function questions()
    {
        return $this->belongsToMany(
            Question::class,
            'games_questions'
        );
    }
}
