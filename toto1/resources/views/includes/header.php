<!DOCTYPE html>
<html>
<head>
    <title id="title"><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= asset('css/mc.css'); ?>" >
    <script src="<?= asset('js/mc.js'); ?>" ></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
        </div>

        <div class="col-lg-8">
            <div class="container">

                <div id="myModal" class="modal fade mc-modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content1 mc-modal-content">
                            <div class="modal-body">
                                <div class="loader">
                                    <div class="loader-wheel"></div>
                                    <div class="loader-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>