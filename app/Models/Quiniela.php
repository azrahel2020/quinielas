<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiniela extends Model
{
    protected $fillable = ['name', 'inicio', 'final', 'image', 'status'];

    protected $casts = [
        'inicio' => 'datetime',
        'final' => 'datetime',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
    
    /* use HasFactory;
    

    protected $fillable = ['name', 'inicio','final','image', 'status'];
    
    protected $casts = [
        'inicio' => 'date',
        'final' => 'date',
    ];

    public function games() {
        return $this->hasMany(Game::class);
    }
    public function bets()
    {
        return $this->hasMany(Bet::class);
    } */
    
}
