// --------------------
// Delete new transaction
// --------------------
function confirmDeleteTransaction(transaction_id,payment_id) {

    swal({
        title: "Are you sure?",
        text: "The selected transaction will be voided.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false,
        html: false
    }, function() {
    
        $.ajax({
            url : url + 'transaction/delete',
            type: 'POST',
            data : {
                'id': transaction_id,
                'payment_id' : payment_id
            }
        })
        .done(function(response){

            if (response.status == 'success') {

                swal(
                    "Deleted!",
                    "The transaction has been deleted.",
                    "success"
                );

                $('#tbody-add-transaction').find('#new_payment_' + payment_id).prev().find('td:last-child').css('opacity','1');

                $('#new_payment_' + payment_id).remove();
            }

            else {

                new PNotify({
                    title: 'Error',
                    text: 'Looks like an error from server. Please contact the developer.',
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
};

// --------------------
// Delete existing transaction
// --------------------
function confirmDeleteExistingTransaction(transaction_id,payment_id) {

    swal({
        title: "Are you sure?",
        text: "The selected transaction will be voided.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false,
        html: false
    }, function() {
    
        $.ajax({
            url : url + 'transaction/delete',
            type: 'POST',
            data : {
                'id': transaction_id,
                'payment_id' : payment_id
            }
        })
        .done(function(response){

            if (response.status == 'success') {

                swal(
                    "Deleted!",
                    "The transaction has been deleted.",
                    "success"
                );

                $('#view_transaction_a_' + transaction_id).remove();
            }

            else {

                new PNotify({
                    title: 'Error',
                    text: 'Looks like an error from server. Please contact the developer.',
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
};