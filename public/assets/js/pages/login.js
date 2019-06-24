$(document).ready(function() {

    login();
});


// --------------------
// Add patient
// --------------------
function login(){

    $('#form-login').submit(function(){

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
                    text: 'Welcome, ' + response.data.firstname + ' ' + response.data.lastname + '!',
                    addclass: 'stack-top-left bg-success',
                    delay: 4000,
                    stack: stack_top_left
                });
                
                window.location.href = url;
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