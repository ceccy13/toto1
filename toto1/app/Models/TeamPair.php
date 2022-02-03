<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPair
{
    public static function get($team_home, $team_away)
    {
        $team_pair = $team_home.'-'.$team_away;
        return $team_pair;
    }
}
