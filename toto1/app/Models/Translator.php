<?php

namespace App\Models;

class Translator
{
    private static $week = [
        'Monday' => 'Понеделник',
        'Tuesday' => 'Вторник',
        'Wednesday' => 'Сряда',
        'Thursday' => 'Четвъртък',
        'Friday' => 'Петък',
        'Saturday' => 'Събота',
        'Sunday' => 'Неделя',
        'Live' => 'На живо',
        '' => '',
    ];

    private static $text = [
        'PSTP' => 'Отложен',
        'FT' => 'Завършил',
        'HT' => 'Полувреме',
        'PSTP' => 'Отложен',
        '' => '',
    ];

    public static function weekDay($day)
    {
        $day = trim($day);
        $day = explode(' ', $day);
        $day[0] = self::$week[$day[0]];
        $day = implode(' ', $day);
        return $day;
    }

    public static function text($text)
    {
        is_numeric(substr($text, 0, 1)) ?  $text = $text : $text = self::$text[$text];
        return $text;
    }
}
