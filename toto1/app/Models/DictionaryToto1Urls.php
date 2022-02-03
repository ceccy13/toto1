<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryToto1Urls
{
    private static $toto1Urls = [
        'Тото 1 - 10 срещи' => 'http://toto.bg/programa/10t1',
        'Тото 1 - 12 срещи' => 'http://toto.bg/programa/12t1',
        'Тото 1 - 13 срещи' => 'http://toto.bg/programa/13t1',
    ];

    public static function get()
    {
        return self::$toto1Urls;
    }
}
