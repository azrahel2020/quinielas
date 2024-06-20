<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function games() {
        return $this->hasMany(Game::class, 'home_team_id')->orWhere('away_team_id', $this->id);
    }
}
