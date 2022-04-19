<?php
namespace App\Models\Traits;

use App\Models\TeamPair;
use App\Models\Toto1;
use App\Models\Soccerway;
use App\Models\DictionaryTeams;
use App\Models\Translator;
use Illuminate\Support\Facades\Session;

trait Toto1GamesTrait
{
    public function getSitesData()
    {
        $check_day = ['Sat', 'Sun', 'Mon'];
        (in_array(date('D'), $check_day) && date('H:i:s') > '14:00:00') ? Session::flush() : null; //seconds
        if(!Session::has('toto_team_pairs')){
            $toto_team_pairs = Toto1::getTables();
            Session::push('toto_team_pairs', $toto_team_pairs);
        }
        if(!Session::has('soccerway_matches')){
            $soccerway_matches = Soccerway::getData();
            Session::push('soccerway_matches', $soccerway_matches);
        }
    }

    public function getToto1GamesData($toto_team_pairs, $soccerway_matches, $game = null)
    {
        $data = [];
        $editions = Toto1::getEdition();
        foreach($toto_team_pairs as $toto_type => $pairs){
            if(!empty($game) && $game != $toto_type) continue;

            // Проверяваме дали има извънреден тираж за тото играта
            $extra = false;
            foreach($editions[$toto_type] as $edition){
                if(strpos($edition , 'ЗВЪНРЕДЕН') == true){
                    $extra = true;
                    break;
                }
            }

            // Подреждаме масива с отборите от тото играта по тиражи във низходящ ред
            //krsort($pairs);
/*            echo '<pre>';
            echo print_r($soccerway_matches,true);
            echo '<pre>';*/
            $step = 0;
            foreach($pairs as $stage => $stage_pairs){
                //Най - старият тираж да не се показва Вторник, Сряда, Четвъртък и Петък
                $step ++;
                $arrayOfDaysAllowed = ['Mon'];
                $edition = $editions[$toto_type][$stage];
                //if($step == 1 && !in_array(date('D'),$arrayOfDaysAllowed) && !$extra) continue;

                foreach($stage_pairs as $key => $value){
                    $team_home = DictionaryTeams::get($value[1]);
                    $team_away = DictionaryTeams::get($value[2]);

                    $match = TeamPair::get($team_home, $team_away);

                    $league = @$soccerway_matches[$match]['ligue'];
                    $date = @$soccerway_matches[$match]['date'];

                    $score_time = @$soccerway_matches[$match]['score-time'];
                    $string_length = strlen((string) @$soccerway_matches[$match]['score-time']);
                    (isset($score_time) && $score_time != '-' && $string_length < 6) ? $score = $score_time : $score = '? - ?';

                    isset($soccerway_matches[$match]['day']) ? $time = $soccerway_matches[$match]['day'] : $time = @$soccerway_matches[$match]['day playing'];
                    if(strpos($score, '-') == false) $score = Translator::text($score);

                    $data[$toto_type][$edition][$value[0]][0] = $value[0];
                    $data[$toto_type][$edition][$value[0]][1] = $value[1];
                    $data[$toto_type][$edition][$value[0]][2] = $value[2];
                    $data[$toto_type][$edition][$value[0]][3] = $value[3];
                    $data[$toto_type][$edition][$value[0]][4] = $value[4];
                    $data[$toto_type][$edition][$value[0]][5] = $value[5];
                    $data[$toto_type][$edition][$value[0]][6] = $league;
                    $data[$toto_type][$edition][$value[0]][7] = Translator::weekDay($date);
                    $data[$toto_type][$edition][$value[0]][8] = Translator::text($time);
                    $data[$toto_type][$edition][$value[0]][9] = $score;
                }
            }
        }
        return $data;
    }

    public function getRefreshingPage($data, $title)
    {
        date_default_timezone_set('Europe/Sofia');
        $check_day = ['Sat', 'Sun', 'Mon'];
        (in_array(date('D'), $check_day) && date('H:i:s') > '14:00:00') ? $refresh_rate = 30 : $refresh_rate = -1; //seconds
        $url = url()->current();

        return view('1x2',array('data' => $data, 'title' => $title));
        /* return response()->view('1x2', compact('data','title'), 200)
            ->header("Refresh", "$refresh_rate;url=$url"); */
    }

}