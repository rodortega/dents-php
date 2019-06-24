$(document).ready(function() {

    updatePatient();
});

// --------------------
// View Patient Info
// --------------------
function editPatient(data) {

    var data = $(data).data('details');

    var modal_edit_patient = $('#modal-edit-patient');

    modal_edit_patient.find('[name="id"]').val(data.id);
    modal_edit_patient.find('[name="firstname"]').val(data.firstname);
    modal_edit_patient.find('[name="lastname"]').val(data.lastname);
    modal_edit_patient.find('[name="birthdate"]').val(data.birthdate);
    modal_edit_patient.find('[name="address"]').val(data.address);
    modal_edit_patient.find('[name="cellphone"]').val(data.cellphone);
    modal_edit_patient.find('[name="occupation"]').val(data.occupation);
    
    modal_edit_patient.modal('toggle');
}

function updatePatient() {

    $('#form-edit-patient').submit(function(){

        event.preventDefault();

        var modal_view_patient = $('#modal-view-patient');

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){
            
            if (response.status == 'success') {

                new PNotify({
                    title: 'Success',
                    text: 'A patient has been updated.',
                    addclass: 'stack-top-left bg-success',
                    delay: 4000,
                    stack: stack_top_left
                });

                var stringed = JSON.stringify(response.data);

                modal_view_patient.find('#view-patient-text-fullname').text(response.data.firstname + ' ' + response.data.lastname);
                modal_view_patient.find('#view-patient-text-birthdate').text(response.data.birthdate);
                modal_view_patient.find('#view-patient-image-profile').prop('src',response.data.picture);
                modal_view_patient.find('#view-patient-text-address').text(response.data.address);
                modal_view_patient.find('#view-patient-text-cellphone').text(response.data.cellphone);
                modal_view_patient.find('#view-patient-text-occupation').text(response.data.occupation);
                modal_view_patient.find('#view-patient-button-add').attr('onclick', 'addTransactionToExistingPatient('+response.data.id+',"'+response.data.firstname + ' ' + response.data.lastname+'",'+stringed+')');
                modal_view_patient.find('#view-patient-button-edit').attr('data-details',stringed);
                modal_view_patient.find('#view-patient-button-edit').attr('onclick', 'editPatient(this)');

                $('#modal-edit-patient').modal('toggle');
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