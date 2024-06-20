<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;




class Game extends Model
{
    /**
     * Get the result associated with the game.
     */
    public function result()
    {
        return $this->hasOne(Result::class);
    }

    /**
     * Get the home team for the game.
     */
    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    /**
     * Get the away team for the game.
     */
    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    /**
     * Get the bets for the game.
     */
    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
