<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionarySoccerwayUrls
{
    private static $soccerwayUrls = [
        'Шампионска Лига' => 'https://int.soccerway.com/international/europe/uefa-champions-league/20202021/s19119/final-stages/',
        'Лига Европа' => 'https://int.soccerway.com/international/europe/uefa-cup/20202021/s19204/final-stages/',
        'Англия, Висша Лига' => 'https://int.soccerway.com/national/england/premier-league/20202021/regular-season/r59136/',
        'Англия, Чемпиъншип' => 'https://int.soccerway.com/national/england/championship/20202021/regular-season/r59442/',
        'Германия, Бундеслига' => 'https://int.soccerway.com/national/germany/bundesliga/20202021/regular-season/r58871/',
        'Италия, Серия А' => 'https://int.soccerway.com/national/italy/serie-a/20202021/regular-season/r59286/',
        'Испания, Примера дивисион' => 'https://int.soccerway.com/national/spain/primera-division/20202021/regular-season/r59097/',
        'Франция, Лига 1' => 'https://int.soccerway.com/national/france/ligue-1/20202021/regular-season/r58178/',
        'България, Първа професионална лига' => 'https://int.soccerway.com/national/bulgaria/a-pfg/20202021/regular-season/r58952/',
    ];

    public static function get()
    {
        return self::$soccerwayUrls;
    }

}
