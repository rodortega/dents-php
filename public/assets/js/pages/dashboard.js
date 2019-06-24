$(function() {

	updateAppointments();
	updateCounter();
});

function updateAppointments() {

	var tbody_appointments = $('#tbody-appointments');

	$.ajax({
        url : url + 'appointments/today',
        type: 'POST'
    })
    .done(function(response){
        
        if (response.status == 'success') {

        	$("#text-date-today").text(moment().format("MMMM D, YYYY"));

        	var html = [];
        	var content;

            $.each(response.data, function(index,value){

            	content = '<tr>' +
            		'<td>' + moment(value.start).format('hh:mm a') + '</td>' +
            		'<td>' + value.name + '</td>' +
            		'<td>' + value.cellphone + '</td>' +
            		'<td>' + value.title + '</td>';

                html.push(content);

                var minutes = moment().diff(moment(value.start), 'minutes');

                if (value.status == '1' && minutes <= '60')
                {
                    new PNotify({
                        title: 'APPOINTMENT',
                        text: value.name + ' <br> ' + value.title + ' <br> ' + moment(value.start).format('hh:mm a'),
                        addclass: 'stack-top-right bg-orange-800',
                        hide: false,
                    });

                    player.play();

                    $.post(url + "appointments/read/" + value.id);
                }    
            });

            tbody_appointments.html(html);

            setTimeout(updateAppointments, 10000);
        }      
    });
}

function updateCounter() {

	$.ajax({
        url : url + 'counter',
        type: 'POST'
    })
    .done(function(response){
        
        if (response.status == 'success') {

        	var receivable = parseInt(response.data.revenue_count) - parseInt(response.data.payment_count);

        	$("#counter-revenue").text(response.data.revenue_count);
        	$("#counter-receivable").text(receivable);
        	$("#counter-patient").text(response.data.patient_count);

        	setTimeout(updateCounter, 10000);
        }      
    });
}

function backup() {

    $.ajax({
        url : url + 'remote/dump',
        type: 'POST'
    })
    .done(function(){
        
        setTimeout(updateCounter, 21600);  // 6 hours backup
    });
}