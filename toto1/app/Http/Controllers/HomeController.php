<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soccerway;
use App\Models\TeamPair;
use App\Models\Toto1;
use App\Models\DictionaryTeams;
use App\Models\Traits\Toto1GamesTrait;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    use Toto1GamesTrait;

    public function index()
    {
        in_array(date('D'), ['Mon']) ? Session::forget('results_and_jackpot') : null;
        if(!Session::has('results_and_jackpot')){
            $editions = Toto1::getEdition();
            foreach($editions as $game => $edition){
                $game_type = substr($game, -13);
                $game_type = substr($game_type, 0, 2);
                $data[$game_type]['game'] = $game;
                $data[$game_type]['edition'] = Toto1::getJackpotEdition($game_type);
                $data[$game_type]['jackpot'] = Toto1::getJackpot($game_type);
                $data[$game_type]['results'] = Toto1::getFinalResults($game_type);
                $data[$game_type]['prizes'] = Toto1::getPrizes($game_type);
            }
            Session::push('results_and_jackpot', $data);
        }

        $data = [];
        $data = Session::get('results_and_jackpot')[0];

        $title = 'Начало';
        return view('home',array('data' => $data, 'title' => $title));
    }

    public function matches13()
    {
        $this->getSitesData();
        $data = $this->getToto1GamesData(Session::get('toto_team_pairs')[0], Session::get('soccerway_matches')[0], 'Тото 1 - 13 срещи');
        $title = 'Тото 1 - 13 срещи';

        return $this->getRefreshingPage($data, $title);
    }

    public function matches12()
    {
        $this->getSitesData();
        $data = $this->getToto1GamesData(Session::get('toto_team_pairs')[0], Session::get('soccerway_matches')[0], 'Тото 1 - 12 срещи');
        $title = 'Тото 1 - 12 срещи';

        return $this->getRefreshingPage($data, $title);
    }

    public function matches10()
    {
        $this->getSitesData();
        $data = $this->getToto1GamesData(Session::get('toto_team_pairs')[0], Session::get('soccerway_matches')[0], 'Тото 1 - 10 срещи');
        $title = 'Тото 1 - 10 срещи';

        return $this->getRefreshingPage($data, $title);
    }
}
