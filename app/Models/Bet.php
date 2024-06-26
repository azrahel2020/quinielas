<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'game_id',
        'bets_home',
        'bets_away',
        'pointsGanador',
        'pointsHome',
        'pointsAway',
        'pointsAltaBaja',
        'total',
        'total_final',
        
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }
    
        
    
}
