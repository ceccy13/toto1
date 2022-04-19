isItWeekEnd = function() {
    var d = new Date();
    var dateValue = d.getDay(); 
    // dateValue : 0 = Sunday
    // dateValue : 1 = Monday
    // dateValue : 6 = Saturday
    var allowed_days = [0,1,6];
    if(allowed_days.includes(dateValue))
        return true;
    else 
        return false; 
}

function doRequest(){    
    var current_url =  window.location.href;
    $.ajax({
        type: "GET",  
        url: current_url,
        success: function(result){  
            //reload url page
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
           console.log(textStatus);
        }       
    });
}

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
        $("a.active").attr("href", "");
    });

    $('#myModal').modal('hide');

    //reload url page every 30 sec.
    if(isItWeekEnd()){
        setInterval(doRequest, 30000);
    }
});
