<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toto1
{
    private static $tables = [];
    private static $edition = [];
    private static $jackpot_edition13 = null;
    private static $jackpot_edition12 = null;
    private static $jackpot_edition10 = null;
    private static $jackpot13 = null;
    private static $jackpot12 = null;
    private static $jackpot10 = null;
    private static $final_results_13 = [];
    private static $final_results_12 = [];
    private static $final_results_10 = [];
    private static $prizes_html_13 = null;
    private static $prizes_html_12 = null;
    private static $prizes_html_10 = null;
    private static $test = null;


    private static function setTables()
    {
        $toto1_urls = DictionaryToto1Urls::get();
        $team_pairs = [];
        foreach($toto1_urls as $toto_type => $url) {
            $html_base = file_get_html($url, false, null, 0);
            $elements = $html_base->find('[align="center"]');
            $check = ['служебно предвиждане', 'X'];

            $data = [];
            foreach($elements as $key => $element) {
                $string = $element->plaintext;
                if (in_array(trim($string), $check) || strpos($string, 'Тото') !== false) continue;
                $data[] = $string;
            }

            $teams = [];
            $total = count($data) -1;
            foreach($data as $key => $value) {
                $value_previous = 1;
                $value_next = 2;
                if($key != 0 && $key != $total){
                    $value_previous = $data[$key - 1];
                    $value_next = $data[$key + 1];
                }

                if (($value == 1 && $value_next == 2) || ($value == 2 && $value_previous == 1)) continue;
                $teams[$toto_type][] = $value;
            }

            foreach($teams as $toto_type_key => $teams_group)
            {
                $row = 1;
                $table = 1;
                foreach($teams_group as $key => $team_info){
                    $total_pairs = count($teams_group) / 6;
                    switch ($toto_type_key) {
                        case 'Тото 1 - 10 срещи':
                            if($key > 5 && $key % 6 == 0) $row = $row + 1;
                            if($key == (10 * 6) * $table){
                                $table += 1;
                                $row = 1;
                            }
                            $tables_total = $total_pairs / 10;
                            break;
                        case 'Тото 1 - 12 срещи':
                            if($key > 5 && $key % 6 == 0) $row = $row + 1;
                            if($key == (12 * 6) * $table){
                                $table += 1;
                                $row = 1;
                            }
                            if($key == (12 * 6) * $table) $table += 1;
                            $tables_total = $total_pairs / 12;
                            break;
                        case 'Тото 1 - 13 срещи':
                            if($key > 5 && $key % 6 == 0) $row = $row + 1;
                            if($key == (13 * 6) * $table){
                                $table += 1;
                                $row = 1;
                            }
                            if($key == (13 * 6) * $table) $table += 1;
                            $tables_total = $total_pairs / 13;
                            break;
                        default:
                            //echo "class missing!";
                    }
                    $team_pairs[$toto_type_key][$table][$row][] = $team_info;
                }

            }
        }
        self::$tables = $team_pairs;
    }

    public static function getTables()
    {
        if(empty(self::$tables)) self::setTables();
        return self::$tables;
    }

    private static function setEdition()
    {
        $toto1_urls = DictionaryToto1Urls::get();
        foreach($toto1_urls as $toto_type => $url) {
            $html_base = file_get_html($url, false, null, 0);
            $elements = $html_base->find('span[style="font-size:24px;"]');
            $row = 1;
            foreach ($elements as $key => $element) {
                self::$edition[$toto_type][$row] = $element->plaintext;
                $row++;
            }
        }
    }

    public static function getEdition()
    {
        if(empty(self::$edition)) self::setEdition();
        return self::$edition;
    }

    private static function setFinalResults($game)
    {
        $url = 'http://www.toto.bg/results/'.$game.'t1';
        $html_base = file_get_html($url, false, null, 0);
        $element = $html_base->find('[class="tir_title"]');
        $jackpot_edition = 'jackpot_edition'.$game;
        self::$$jackpot_edition = $element[0]->plaintext;
        $element = $html_base->find('[class="col-sm-6 sum text-right"]');
        $jackpot = 'jackpot'.$game;
        self::$$jackpot = $element[0]->plaintext;
        $elements = $html_base->find('[class="xses"]');
        $step = 0;
        $final_results = 'final_results_'.$game;
        foreach($elements as $element){
            $step++;
            self::$$final_results[$step] = $element->plaintext;
            if($step == $game) break;
        }
        $element = $html_base->find('[class="table"]');
        $prizes = 'prizes_html_'.$game;
        self::$$prizes = $element[0];
    }

    public static function getJackpotEdition($game)
    {
        $jackpot = 'jackpot_edition'.$game;
        if(empty(self::$$jackpot)) self::setFinalResults($game);
        return self::$$jackpot;
    }

    public static function getJackpot($game)
    {
        $jackpot = 'jackpot'.$game;
        if(empty(self::$$jackpot)) self::setFinalResults($game);
        return self::$$jackpot;
    }

    public static function getFinalResults($game)
    {
        $final_results = 'final_results_'.$game;
        if(empty(self::$$final_results)) self::setFinalResults($game);
        return self::$$final_results;
    }

    public static function getPrizes($game)
    {
        $prizes = 'prizes_html_'.$game;
        if(empty(self::$$prizes)) self::setFinalResults($game);
        return self::$$prizes;
    }

}
