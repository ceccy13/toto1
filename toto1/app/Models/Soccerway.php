<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soccerway
{
    private static $data = [];

    private static function setData()
    {
        $soccer_urls = DictionarySoccerwayUrls::get();
        $data = [];
        foreach($soccer_urls as $ligue => $url) {
            $html_base = file_get_html($url, false, $a, 0);
            $elements = $html_base->find('tr td');
            $row = 0;
            foreach($elements as $element) {
                $element_class = trim($element->class);
                if ($element_class == 'date') {
                    $row++;
                }
                $data[$ligue][$row]['ligue'] = $ligue;
                switch ($element_class) {
                    case 'date':
                        $string = trim($element->plaintext);
                        $data[$ligue][$row]['date'] = $string;
                        break;
                    case 'day':
                        $string = $element->plaintext;
                        if (strpos($string, ':') !== false) {
                            $string = explode( ':', $string );
                            $string[0] = $string[0] + 1;
                            $string = implode( ':', $string );
                        }
                        $data[$ligue][$row]['day'] = trim($string);
                        break;
                    case 'day playing':
                        $data[$ligue][$row]['day playing'] = trim($element->plaintext);
                        break;
                    case 'team team-a':
                        $data[$ligue][$row]['team-a'] = trim($element->plaintext);
                        break;
                    case 'team team-a strong':
                        $data[$ligue][$row]['team-a'] = trim($element->plaintext);
                        break;
                    case 'score-time':
                        $data[$ligue][$row]['score-time'] = trim($element->plaintext);
                        break;
                    case 'team team-b':
                        $data[$ligue][$row]['team-b'] = trim($element->plaintext);
                        break;
                    case 'team team-b strong':
                        $data[$ligue][$row]['team-b'] = trim($element->plaintext);
                        break;
                    default:
                        //echo "class missing!";
                }
            }

            $matches = [];
            foreach($data as $data_key => $element) {
                foreach($element as $element_key => $info) {
                    $matches[$info['team-a'].'-'.$info['team-b']] = $info;
                }
            }
        }
        self::$data = $matches;
    }

    public static function getData()
    {
        if(empty(self::$data)) self::setData();
        return self::$data;
    }
}
