<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryTeams
{
    private static $teams = [
       // PREMIER LEAGUE
       'АРСЕНАЛ' => 'Arsenal',
       'АСТЪН ВИЛА' => 'Aston Villa',
       'БРАЙТЪН' => 'Brighton & Hove Albion',
       'БЪРНЛИ' => 'Burnley',
       'ЧЕЛСИ' => 'Chelsea',
       'КРИСТЪЛ ПАЛАС' => 'Crystal Palace',
       'ЕВЕРТЪН' => 'Everton',
       'ФУЛЪМ' => 'Fulham',
       'ЛИЙДС ЮНАЙТЕД' => 'Leeds United',
       'ЛЕСТЪР' => 'Leicester City',
       'ЛЕСТЪР СИТИ' => 'Leicester City',
       'ЛИВЪРПУЛ' => 'Liverpool',
       'МАНЧЕСТЪР СИТИ' => 'Manchester City',
       'МАН. ЮНАЙТЕД' => 'Manchester United',
       'МАН.ЮНАЙТЕД' => 'Manchester United',
       'НЮКЯСЪЛ' => 'Newcastle United',
       'НЮКАСЪЛ' => 'Newcastle United',
       'ШЕФИЛД ЮНАЙТЕД' => 'Sheffield United',
       'САУТХЯМПТЪН' => 'Southampton',
       'ТОТНЪМ' => 'Tottenham Hotspur',
       'У.Б.А.' => 'West Bromwich Albion',
       'УЕСТ ХЯМ' => 'West Ham United',
       'УУЛВЪРХЯМПТЪН' => 'Wolverhampton Wanderers',
       'НОРИЧ СИТИ' => 'Norwich City',
       // CHAMPIONSHIP
       'БОРНЕМУТ' => 'AFC Bournemouth',
       'БАРНЗЛИ' => 'Barnsley',
       'БИРМИНГАМ' => 'Birmingham City',
       'БЛЯКБЪРН' => 'Blackburn Rovers',
       'БРЕНТФОРД' => 'Brentford',
       'БРИСТОЛ СИТИ' => 'Bristol City',
       'КАРДИФ СИТИ' => 'Cardiff City',
       'КОВЪНТРИ' => 'Coventry City',
       'ДАРБИ КАУНТИ' => 'Derby County',
       'ХЪДЪРСФИЙЛД' => 'Huddersfield Town',
       'ЛУТЪН ТАУН' => 'Luton Town',
       'МИДЪЛЗБРО' => 'Middlesbrough',
       'МИЛУОЛ' => 'Millwall',
       'НОРИЧ' => 'Norwich City',  //*
       'НОТИНГАМ' => 'Nottingham Forest',
       'ПРЕСТЪН НЕ' => 'Preston North End',
       'К.П.Р.' => 'Queens Park Rangers',
       'РЕДИНГ' => 'Reading',
       'РОДЪРЪМ' => 'Rotherham United',
       'ШЕФИЛД УЕНЗДИ' => 'Sheffield Wednesday',
       'СТОК СИТИ' => 'Stoke City',
       'СУОНЗИ' => 'Swansea City',
       'УОТФОРД' => 'Watford',
       '*' => 'Wycombe Wanderers',
       //BUNDESLIGA
       'АРМИНИЯ БИЛЕФЕЛД' => 'Arminia Bielefeld',
       'АУГСБУРГ' => 'Augsburg',
       'ЛЕВЕРКУЗЕН' => 'Bayer Leverkusen',
       'БАЙЕРН МЮНХЕН' => 'Bayern Munich',
       'ДОРТМУНД' => 'Borussia Dortmund',
       'М ГЛАДБАХ' => 'Borussia M\'gladbach',
       'АЙНТРАХТ ФРАНКФУРТ' => 'Eintracht Frankfurt',
       'ФРАЙБУРГ' => 'Freiburg',
       'ХЕРТА' => 'Hertha BSC',
       'ХЕРТА' => 'Hertha Berlin',
       'ХОФЕНХАЙМ' => 'Hoffenheim',
       'ФК КЬОЛН' => 'Köln',
       'ФК КЬОЛН' => 'FC Cologne',
       'МАЙНЦ 05' => 'Mainz 05',
       'МАЙНЦ 05' => 'Mainz',
       'РБ ЛАЙПЦИГ' => 'RB Leipzig',
       'ШАЛКЕ 04' => 'Schalke 04',
       'ЩУТГАРТ' => 'Stuttgart',
       'ШУТГАРТ' => 'Stuttgart',
       'УНИОН БЕРЛИН' => 'Union Berlin',
       'ВЕРДЕР' => 'Werder Bremen',
       'ВОЛФСБУРГ' => 'Wolfsburg',
       // SERIE A
       'АТАЛАНТА' => 'Atalanta',
       'БЕНЕВЕНТО' => 'Benevento',
       'БОЛОНЯ' => 'Bologna',
       'КАЛЯРИ' => 'Cagliari',  //*
       'КРОТОНЕ' => 'Crotone',
       'ФИОРЕНТИНА' => 'Fiorentina',
       'ДЖЕНОА' => 'Genoa',
       'ХЕЛАС ВЕРОНА' => 'Hellas Verona',
       'ИНТЕР' => 'Internazionale',  //*
       'ЮВЕНТУС' => 'Juventus',
       'ЛАЦИО' => 'Lazio',  //*
       'МИЛАН' => 'Milan',  //*
       'МИЛАН' => 'AC Milan',
       'НАПОЛИ' => 'Napoli',
       'ПАРМА' => 'Parma',
       'РОМА' => 'Roma',
       'САМПДОРИЯ' => 'Sampdoria',
       'САСУОЛО' => 'Sassuolo',
       'СПЕЦИЯ' => 'Spezia',
       'ТОРИНО' => 'Torino',
       'УДИНЕЗЕ' => 'Udinese',
       'ЕМПОЛИ' => 'Empoli',
       'ВЕНЕЦИЯ' => 'Venezia',
       // LA LIGA
       'АТЛЕТИК БИЛБАО' => 'Athletic Club',
       'АТЛЕТИК БИЛБАО' => 'Athletic Bilbao',
       'АТЛЕТИКО МАДРИД' => 'Atletico Madrid',
       'БАРСЕЛОНА' => 'Barcelona',  //*
       'СЕЛТА' => 'Celta Vigo',
       'КАДИС' => 'Cádiz',
       'КАДИС' => 'Cadiz',
       'АЛАВЕС' => 'Deportivo Alavés',  //*
       'АЛАВЕС' => 'Alaves',
       'ЕЙБАР' => 'Eibar',
       'ЕЛЧЕ' => 'Elche',
       'ХЕТАФЕ' => 'Getafe',
       'ГРАНАДА' => 'Granada',
       'УЕСКА' => 'Huesca',  //*
       'ЛЕВАНТЕ' => 'Levante',  //*
       'ОСАСУНА' => 'Osasuna',
       'БЕТИС' => 'Real Betis',
       'РЕАЛ МАДРИД' => 'Real Madrid',  //*
       'РЕАЛ СОСИЕДАД' => 'Real Sociedad',
       'ВАЛЯДОЛИД' => 'Real Valladolid',
       'СЕВИЛЯ' => 'Sevilla',
       'ВАЛЕНСИЯ' => 'Valencia',
       'ВИЛЯРЕАЛ' => 'Villarreal',
       'ЕСПАНЬОЛ' => 'Espanyol',
       'МАЙОРКА' => 'Mallorca',
       //LIGUE 1
       'АНЖЕ' => 'Angers SCO',
       'АНЖЕ' => 'Angers',
       'БОРДО' => 'Bordeaux',
       'БРЕСТ' => 'Brest',
       'ДИЖОН' => 'Dijon',
       'ЛАНС' => 'Lens',
       'ЛИЛ' => 'Lille',
       'ЛОРИЕНТ' => 'Lorient',
       'МЕТЦ' => 'Metz',
       'МОНАКО' => 'Monaco',  //*
       'МОНПЕЛИЕ' => 'Montpellier',
       'НАНТ' => 'Nantes',
       'НИЦА' => 'Nice',
       'НИМ' => 'Nîmes',
       'ЛИОН' => 'Olympique Lyonnais',
       'ЛИОН' => 'Lyon',
       'МАРСИЛИЯ' => 'Olympique Marseille',
       'ПАРИ СЕН ЖЕРМЕН' => 'PSG',
       'РЕЙМС' => 'Reims',
       'РЕН' => 'Rennes',
       'СЕНТ ЕТИЕН' => 'Saint-Etienne',
       'СТРАСБУРГ' => 'Strasbourg',
        // България
        'АРДА КЪРДЖАЛИ' => 'Arda',
        'БЕРОЕ СТ. ЗАГОРА' => 'Beroe',
        'БЕРОЕ СТ.ЗАГОРА' => 'Beroe',
        'БОТЕВ ПД' => 'Botev Plovdiv',	    		//*
        'БОТЕВ ВРАЦА' => 'Botev Vratsa',
        'ЧЕРНО МОРЕ' => 'Cherno more',
        'ЦСКА 1948' => 'CSKA 1948 Sofia',
        'ЦСКА СФ' => 'CSKA Sofia',
        'ЕТЪР В.ТЪРНОВО' => 'Etar',
        'ЛЕВСКИ СФ' => 'Levski Sofia',
        'ЛОКОМОТИВ ПД' => 'Lokomotiv Plovdiv',
        'ЛУДОГОРЕЦ' => 'Ludogorets',
        'МОНТАНА' => 'Montana',						//*
        'СЛАВИЯ СФ' => 'Slavia Sofia',
        'ЦАРСКО СЕЛО' => 'Tsarsko selo',
        'ЛОКОМОТИВ СФ' => 'Lokomotiv Sofia 1929',
        //УЕФА
        'ПОРТО' => 'Porto',
        'СПОРТИНГ БРАГА' => 'Sporting Braga',
        'ДИНАМО КИЕВ' => 'Dynamo Kyiv',
        'ФК БРЮЖ' => 'Club Brugge',
        'ЙЪНГ БОЙС' => 'Young Boys',
        'АНТВЕРПЕН' => 'Antwerp',
        'РЕЙНДЖЪРС' => 'Rangers',
        'АЯКС' => 'Ajax',
        'БЕНФИКА' => 'Benfica',
        'РБ ЗАЛЦБУРГ' => 'Salzburg',
        'ДИНАМО ЗАГРЕБ' => 'Dinamo Zagreb',
        'ФК КРАСНОДАР' => 'Krasnodar',
        'ПСВ АЙНДХОВЕН' => 'PSV',
        'ОЛИМПИАКОС' => 'Olympiakos Piraeus',
        'БРАГА' => 'Sporting Braga',
        'СЛАВИЯ ПРАГА' => 'Slavia Praha',
        'РЕЙНДЖЪРС' => 'Rangers',
        'МОЛДЕ' => 'Molde',
        'ШАХТЬОР ДОНЕЦК' => 'Shakhtar Donetsk',

   ];

    private static $team;

    private static function set($team)
    {
        $team = trim($team);
        //$team = mb_strtoupper($team);
        $team = str_replace('*', '' , $team);

        if(strpos($team , 'ГЛАДБАХ') != false) $team = 'М ГЛАДБАХ';

        $position = strpos($team, '(');
        if($position != false) $team = substr($team, 0, $position);
        $team = trim($team);

        $team_array = explode(' ',$team);

        if(count($team_array) > 1) {
            foreach($team_array as $key => $value){
                //echo mb_strlen($value);
                // Test if string contains the word
                if(strpos(htmlentities($value), 'rsquo') != false) unset($team_array[$key]);
                if(strpos(htmlentities($value), 'nbsp') == false) continue;
                $value = trim(trim($value, '&nbsp;'), '');
                //$value = substr($value, 0, -6);
                $team_array[$key] = $value;
            }
        }
        self::$team = implode(' ', $team_array);
        //echo self::$team;
    }

    public static function get($team)
    {
        self::set($team);
        isset(self::$teams[self::$team]) ? $team = self::$teams[self::$team] : $team = '-';
        return $team;
    }

    public static function getAll()
    {
        return self::$teams;
    }
}
