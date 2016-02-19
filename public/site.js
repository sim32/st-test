$(function(){

    var $buttom = $('#find-button'),
        $body = $('#tickets-list'),
        $departureCity = $('#departure-city'),
        $arrivalCity = $('#arrival-city'),
        $dateDeparture = $('#date-departure'),
        $countAdults = $('#count-adults'),
        $countChildren = $('#count-children');


    $buttom.on('click', function(e) {
        e.preventDefault();
        var searchKey = '';

        if($departureCity.val() == $arrivalCity.val()) {
            console.log('Город отправления не может быть равным городу прибытия');
            return false;
        }

        if($dateDeparture.val() == '') {
            console.log('Нужно выбрать дату');
            return false;
        }

        if($dateDeparture.val().match( /(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]-(?!1[3-9]|00)[01][0-9]-(?!10|28|29)[12][089][0-9][0-9]/ ) == null) {
            console.log('Неверный формат даты');
            return false;
        }

        if(isNaN(parseInt($countChildren.val()))) {
            $countChildren.val(0);
        }
        if(isNaN(parseInt($countAdults.val()))) {
            $countAdults.val(0);
        }

        if(parseInt($countChildren.val()) == 0 && parseInt($countAdults.val()) == 0) {
            console.log('сумма людей не может быть = 0');
            return false;
        }

        searchKey = $departureCity.val()+"_"+$arrivalCity.val()+"_"+$dateDeparture.val()+"_"+$countAdults.val()+"_"+$countChildren.val();

        $.ajax({
            url: '/api/getbykey/'+searchKey,
            dataType: 'json'

        })
            .done(function(data){
                if(data.status == 'ok') {
                    $body.html('');
                    if(data.data.length != undefined) {
                        data.data.forEach(function(item, i){
                            var $ticket = $('<div class="ticket"><div class="body">Билет'+(++i)+'<br/>Время<br/>отправления<br/>'+item.time_departure+'<br/></div></div>');
                            $body.append($ticket);
                        })
                    }
                }
            })


    })

});