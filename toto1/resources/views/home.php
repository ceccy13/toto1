<?php
include 'includes/header.php';
include 'includes/menu.php';

//echo '<div class="container">';

    echo '<h1>Информация и резултати на живо за игрите 10, 12 и 13 срещи от Тото 1 </h1>';

    foreach($data as $value) {

        echo '<div class="container">
            <h1>'.$value['game'].'<br>'.$value['edition'].'</h1>
            <div class="row row-results">
                <div class="col-lg-6" style="margin: auto;">Крайни резултати</div>
                <div class="col-lg-6">';
                    foreach ($value['results'] as $match => $result) {
                        echo '<div class="div-block">
                                  <div class="div-block-row-results">'.$match.'</div>
                                  <div class="div-block-row-jackpot">'.$result.'</div>
                              </div>';
                    }
              echo '</div>
            </div>
        </div>';

        echo '<div class="container distance-top">
            <div class="row row-jackpot">
                <div class="col-lg-8" style="margin: auto;">Джакпот</div>
                <div class="col-lg-4" style="margin: auto;">'.$value['jackpot'].'</div>
            </div>
        </div>';

        echo '<div class="container distance-top">
            <div class="row">
                '.$value['prizes'].'
            </div>
        </div>';

    }

//echo '</div>';

include 'includes/footer.php';

