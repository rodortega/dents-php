$(document).ready(function() {

    addPatient();
});


// --------------------
// Add patient
// --------------------
function addPatient(){

    $('#form-add-patient').submit(function(){

    	event.preventDefault();

        var inputs_add_patient = $('#form-add-patient :input');
        var panel_add_transaction = $('#panel-add-transaction');

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){
            
            if (response.status == 'success') {

                new PNotify({
                    title: 'Success',
                    text: 'A new patient has been added.',
                    addclass: 'stack-top-left bg-success',
                    delay: 4000,
                    stack: stack_top_left
                });

                $('#add-transaction-text-fullname').text(response.data.firstname +' '+ response.data.lastname);
                $('#form-add-transaction #input-patient-id').val(response.data.id);

                $("#div-add-transaction-print").html(

                    '<b>Name:</b> ' + response.data.firstname + ' ' + response.data.lastname + '<br>' +
                    '<b>Address:</b> ' + response.data.address + '<br>' + 
                    '<b>Cellphone No.:</b> ' + response.data.cellphone + '<br>' + 
                    '<b>Birthdate:</b> ' + response.data.birthdate + '<br>' +
                    '<b>Occupation:</b> ' + response.data.occupation + '<br><br>'
                );

                $('#modal-add-patient').modal('toggle');
                $('#modal-add-transaction').modal('toggle');
            }

            else {

                new PNotify({
                    title: 'Error',
                    text: 'Looks like an error from server. Please contact the developer.',
                    addclass: 'stack-top-left bg-danger',
                    delay: 4000,
                    stack: stack_top_left
                });
            }
            
        })
        .fail(function(data) {

        	new PNotify({
            	title: 'Error',
            	text: 'Looks like an error from server. Please contact the developer.',
            	addclass: 'stack-top-left bg-danger',
                delay: 4000,
            	stack: stack_top_left
        	});
    	});
    });
}