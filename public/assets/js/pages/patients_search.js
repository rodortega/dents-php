$(document).ready(function() {

    searchPatient();
    viewToothRecord();
});

// --------------------
// View Patient Info
// --------------------
function viewPatient(id){

    var modal_view_patient = $('#modal-view-patient');

    modal_view_patient.modal('toggle');

    $.ajax({
        url : url + 'patients/view',
        type: 'POST',
        data : {'id': id}
    })
    .done(function(response){

        if (response.status == 'success') {

            var stringed = JSON.stringify(response.data);

            modal_view_patient.find('#view-patient-text-fullname').text(response.data.firstname + ' ' + response.data.lastname);
            modal_view_patient.find('#view-patient-text-birthdate').text(response.data.birthdate);
            modal_view_patient.find('#view-patient-image-profile').prop('src',response.data.picture);
            modal_view_patient.find('#view-patient-text-address').text(response.data.address);
            modal_view_patient.find('#view-patient-text-cellphone').text(response.data.cellphone);
            modal_view_patient.find('#view-patient-text-occupation').text(response.data.occupation);
            modal_view_patient.find('#view-patient-button-add').attr('onclick', 'addTransactionToExistingPatient('+id+',"'+response.data.firstname + ' ' + response.data.lastname+'",'+stringed+')');
            modal_view_patient.find('#view-patient-button-edit').attr('data-details',stringed);
            modal_view_patient.find('#view-patient-button-edit').attr('onclick', 'editPatient(this)');
            
            colorizeTooth(response.data.transactions);
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
}

// --------------------
// Search Patient
// --------------------
function searchPatient(){

    $('#form-search-patient').submit(function(){

        event.preventDefault();

        var template_patients_result = document.querySelector('#template-patients-result');
        var panel_search_patient = $('#panel-search-patient-result');

        panel_search_patient.empty();

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){

            var results = [];
            var contents;

            if (response.data.length > 0) {
            
                $.each(response.data, function(key,value) {

                    template_patients_result.content.querySelector('div.clickable').setAttribute('data-id',value.id);
                    template_patients_result.content.querySelector('h6.media-heading').textContent = value.firstname + ' ' +  value.lastname;
                    template_patients_result.content.querySelector('span.text-muted').textContent = value.birthdate;
                    template_patients_result.content.querySelector('img').src = value.picture;

                    contents = document.importNode(template_patients_result.content, true); 
                    results.push(contents);
                });

                panel_search_patient.append(results);
            }
            else {

                panel_search_patient.append('<h1 class="text-thin text-center">No Results</h1>');
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

function viewToothRecord() {
    
    // --------------------
    // View Tooth Record
    // --------------------
    // $(document).on('click', 'polygon, path', function(){
        
    //     var tooth_object = this;
        
    //     if($(tooth_object).data('key')) {
            
    //         var tooth_number = $(tooth_object).data('key');
    
    //         $.ajax({
    //             url : url + 'patients/tooth/' + tooth_number,
    //             type: 'GET'
    //         })
    //         .done(function(response){
                
    //             if (response.status == 'success') {
                    
    //                 $(tooth_object).popover({
                        
    //                     container: '.tooth-chart',
    //                     title: 'Treatments',
    //                     html: true,
    //                     trigger: 'focus',
    //                     content: 
    //                         'May 5, 1995 : Restoration <br>' +
    //                         'May 6, 1995 : Extraction <br>'
    //                 });
                    
    //                 $(tooth_object).popover('toggle');
    //             }
    //         })
    //         .fail(function(data) {

    //         });
    //     }
    // });
    
    // --------------------
    // Add transaction on tooth double click
    // --------------------
    $(document).on('contextmenu', 'polygon, path', function(e){
        
        e.preventDefault();
        
        var tooth_object = this;
        
        if($(tooth_object).data('key')) {
            
            var tooth_number = $(tooth_object).data('key');
    
            var modal_add_transaction = $('#modal-add-transaction');
            modal_add_transaction.find('#input_tooth_number').val(tooth_number);
            modal_add_transaction.modal('show');
        }
    });
}

// --------------------
// Add transaction on tooth double click
// --------------------
function colorizeTooth(transactions){
    
    var tooth_chart = $('#tooth-chart');

    for (var i = 1; i < 33; i++) {

        tooth_chart.find('[data-key="'+i+'"]').attr('fill', '#ffffff');
    }
    
    
    $.each(transactions, function(key, value) {
        
        var tooth = tooth_chart.find('[data-key="'+value.tooth_number+'"]');
        
        tooth.attr('fill', '#673AB7');
        
        tooth.popover({
            container: '#tooth-chart',
            title: 'Latest Treatment',
            html: true,
            trigger: 'click',
            content: moment(value.date_created).format("MMMM D, YYYY")+' '+value.treatment_id
        });
    });
}