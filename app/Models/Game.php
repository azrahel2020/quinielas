<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;




class Game extends Model
{
    protected $guarded = [];

    protected $dates = ['date']; 
    
    protected $casts = [
        'date' => 'datetime',
    ];
    
    protected $fillable = [
        'quiniela_id',
        'home_team_id',
        'away_team_id',
        
    ];
   


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

    public function home_team()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function away_team()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}
