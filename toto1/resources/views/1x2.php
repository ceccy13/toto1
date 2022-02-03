<?php
include 'includes/header.php';
include 'includes/menu.php';

foreach($data as $toto_type => $editions){
    foreach($editions as $edition => $data){
        echo '<h1>'.$toto_type.'<br>'.$edition.'</h1>';
        echo '<table class="table">
                 <tr>
                 <th colspan="3">'.$toto_type.'</th>
                 <th colspan="3" class="mobile-hidden">служебно предвиждане</th>
                 <th colspan="4">Информация</th>
                 </tr>
                 <tr>
                 <th colspan="3" width="40%"></th>
                 <th class="mobile-hidden">1</th>
                 <th class="mobile-hidden">x</th>
                 <th class="mobile-hidden">2</th>
                 <th>Лига</v>
                 <th>Дата</th>
                 <th>Време</th>
                 <th>Резултат</th>
                 </tr>';
        foreach($data as $key => $value){
            ((int)$key % 2 == 0) ? $style_color = 'style="background-color: #F5F5F5;"' : $style_color = '';

            $class_live = '';
            $id = '';
            if($value[7] == 'На живо'){
                $class_live = 'live';
                $id = 'live';
            }

            ($value[8] == 'Завършил') ? $class_ft = 'ft' : $class_ft = '';

            echo '<tr '.$style_color.' class="'.$class_live.' '.$class_ft.'" id="'.$id.'">
                 <td>'.$value[0].'</td>
                 <td>'.$value[1].'</td>
                 <td>'.$value[2].'</td>
                 <td class="mobile-hidden">'.$value[3].'</td>
                 <td class="mobile-hidden">'.$value[4].'</td>
                 <td class="mobile-hidden">'.$value[5].'</td>
                 <td>'.$value[6].'</td>
                 <td>'.$value[7].'</td>
                 <td>'.$value[8].'</td>
                 <td>'.$value[9].'</td>
                 </tr>';
        }
        echo '</table>';
    }
}

include 'includes/footer.php';

