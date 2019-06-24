$(function() {

    $('.typeahead-remote').on('typeahead:selected', enableSubmit); 
    $('.typeahead-remote').on('typeahead:autocompleted', enableSubmit);


    function enableSubmit(){

        $('#button-save-appointment').attr('disabled',false);
    }

    // Initialize Typeahead and Bloodhound
    // --------------------------------
    var patients = new Bloodhound({
      datumTokenizer: function(datum) {

        return Bloodhound.tokenizers.whitespace(datum.value);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      remote: {
        wildcard: '%QUERY',
        url: url + 'patients/query/%QUERY',
        transform: function(response) {

          return $.map(response, function(patient) {

            return {
                id: patient.id,
                cellphone: patient.cellphone,
                value: patient.firstname + ' ' + patient.lastname
            };
          });
        }
      }
    });

    $('.typeahead-remote').typeahead(null, {

        display: 'value',
        source: patients
    });

    $('.typeahead-remote').bind('typeahead:select', function(ev, suggestion) {

        var form_add_appointment = $("#form-add-appointment");
        
        form_add_appointment.find('[name="patient_id"]').val(suggestion.id);
        form_add_appointment.find('[name="cellphone"]').val(suggestion.cellphone);
        form_add_appointment.find('[name="date"]').focus();
    });

    // Add new appointment
    // --------------------------------
    $('#form-add-appointment').submit(function(){

        event.preventDefault();

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){
            
            if (response.status == 'success') {

                new PNotify({
                    title: 'Success',
                    text: 'A new appointment has been added.',
                    addclass: 'stack-top-left bg-success',
                    delay: 4000,
                    stack: stack_top_left
                });

                $('#button-save-appointment').attr('disabled',true);

                $('#modal-add-appointment').modal('toggle');
                $('#form-add-appointment')[0].reset();

                $('#calendar-appointment').fullCalendar('renderEvent', response.data);
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

    // Initialize fullcalendar
    // --------------------------------
    $('#calendar-appointment').fullCalendar({
        
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek'
        },
        events: url + 'appointments/',
        // eventStartEditable: true,
        eventDurationEditable: false,
        validRange: {
            start: '2018-07-01',
            end: '2020-12-31'
        },
        eventRender: function (event, element) {

            element.bind('contextmenu', function (e) {

                e.preventDefault();
                deleteEvent(event);
            });

            element.popover({
                title: event.title,
                html: true,
                content: '<i class="icon-user position-left"></i>' + event.name + '<br>' + '<i class="icon-phone position-left"></i>' + event.cellphone + '<br>' + '<i class="icon-enter2 position-left"></i>' + moment(event.start).format('h:mm a'),
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
        },

        eventDrop: function(event, delta, revertFunc) {

            $.ajax({
                url : url + 'appointments/update',
                type: 'POST',
                data : {
                    'id': event.id,
                    'start': event.start.format("YYYY-MM-DD HH:mm:ss"),
                    'doctor_id': event.doctor_id
                }
            })
            .done(function(response){

                if (response.status == 'success') {

                    new PNotify({
                        title: 'Success',
                        text: 'The appointment has been rescheduled.',
                        addclass: 'stack-top-left bg-success',
                        delay: 4000,
                        stack: stack_top_left
                    });
                }

                else {

                    new PNotify({
                        title: 'Error',
                        text: response.data,
                        addclass: 'stack-top-left bg-danger',
                        stack: stack_top_left
                    });

                    // revertFunc();
                }
            })
            .fail(function(data) {

                new PNotify({
                    title: 'Error',
                    text: 'Looks like an error from server. Please contact the developer.',
                    addclass: 'stack-top-left bg-danger',
                    stack: stack_top_left
                });
            });
        }
    });

    // Delete an event
    // --------------------------------
    function deleteEvent(event){

        swal({
            title: "Are you sure?",
            text: "The selected appointment will be deleted.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            html: false
        }, function() {
        
            $.ajax({
                url : url + 'appointments/delete',
                type: 'POST',
                data : {
                    'id': event.id,
                    'doctor_id': event.doctor_id
                }
            })
            .done(function(response){

                if (response.status == 'success') {

                    swal(
                        "Deleted!",
                        "The appointment has been deleted.",
                        "success"
                    );

                    $('#calendar-appointment').fullCalendar('removeEvents', event.id);
                }

                else {

                    new PNotify({
                        title: 'Error',
                        text: response.data,
                        addclass: 'stack-top-left bg-danger',
                        stack: stack_top_left
                    });
                }
            })
            .fail(function(data) {

                new PNotify({
                    title: 'Error',
                    text: 'Looks like an error from server. Please contact the developer.',
                    addclass: 'stack-top-left bg-danger',
                    stack: stack_top_left
                });
            });
        });
    }

    // override bootstrap tab display bug
    // --------------------------------
    $("#navtab-appointments").click(function() {

        event.preventDefault();

        setTimeout(function(){ 

            $("#calendar-appointment").fullCalendar("render");
        }, 500); 
    });
});