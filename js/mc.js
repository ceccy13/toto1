/* Loader */
$(document).ready(function(){

    var title = $("#title").text().trim();
    switch(title) {
        case 'Начало':
            $('a').removeClass('active');
            $('li:eq( 0 ) a').addClass('active');
            break;
        case 'Тото 1 - 13 срещи':
            $('a').removeClass('active');
            $('li:eq( 1 ) a').addClass('active');
            break;
        case 'Тото 1 - 12 срещи':
            $('a').removeClass('active');
            $('li:eq( 2 ) a').addClass('active');
            break;
        case 'Тото 1 - 10 срещи':
            $('a').removeClass('active');
            $('li:eq( 3 ) a').addClass('active');
            break;
        default:
        // code block
    }

    $('a').click(function () {
        $('#myModal').modal('show');
    });

    $('#myModal').modal('hide');

});
