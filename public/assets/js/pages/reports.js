$(function () {
    
    $('#form-generate-report').submit(function(){

        event.preventDefault();

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){
            
            if (response.status == 'success') {

                var chart = c3.generate({
                    bindto: '#chart-reports',
                    data: {
                        json: response.data,
                        keys: {
                          x: 'doctor',
                          value: ['revenue','transactions']
                        },
                        type: 'bar'
                    },
                    axis: {
                        x: {
                            type: 'category'
                        }
                    }
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
});