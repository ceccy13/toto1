<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionarySoccerwayUrls
{
    private static function soccerwayUrls()
    {
        $date = (date('Y')-1).date('Y');
        return
        [
            'Шампионска Лига' => 'https://int.soccerway.com/international/europe/uefa-champions-league/'.$date.'/s20225/final-stages/',
            'Лига Европа' => 'https://int.soccerway.com/international/europe/uefa-cup/'.$date.'/s20273/final-stages/',
            'Англия, Висша Лига' => 'https://int.soccerway.com/national/england/premier-league/'.$date.'/regular-season/r63396/',
            'Англия, Чемпиъншип' => 'https://int.soccerway.com/national/england/championship/'.$date.'/regular-season/r63602/',
            'Германия, Бундеслига' => 'https://int.soccerway.com/national/germany/bundesliga/'.$date.'/regular-season/r63141/',
            'Италия, Серия А' => 'https://int.soccerway.com/national/italy/serie-a/'.$date.'/regular-season/r63208/',
            'Испания, Примера дивисион' => 'https://int.soccerway.com/national/spain/primera-division/'.$date.'/regular-season/r63145/',
            'Испания, Секунда дивисион' =>'https://int.soccerway.com/national/spain/segunda-division/'.$date.'/regular-season/r64292/',
            'Франция, Лига 1' => 'https://int.soccerway.com/national/france/ligue-1/'.$date.'/regular-season/r63317/',
            'България, Първа професионална лига' => 'https://int.soccerway.com/national/bulgaria/a-pfg/'.$date.'/regular-season/r63720/',
        ];
    }

    public static function get()
    {
        return self::soccerwayUrls();
    }

}
