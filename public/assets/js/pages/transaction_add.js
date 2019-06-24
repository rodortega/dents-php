$(document).ready(function() {

    addNewTransaction();
    saveBalancedTransaction();
    finishTransaction();
});

// --------------------
// Add new transaction
// --------------------
function addNewTransaction(){

    $('#form-add-transaction').submit(function(){

        event.preventDefault();

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){

            if (response.status == 'success') {
                
                displayToTable(response.data);

                $('#form-add-transaction')[0].reset();
            }
            else {

                console.log(response);
            }
        })
        .fail(function(data) {

            new PNotify({
                title: 'Error',
                text: 'Looks like an error from server. Please contact the developer.',
                addclass: 'stack-top-left bg-danger',
                delay: 4000
            });
        });
    });
}

// --------------------
// Finish adding transaction
// --------------------
function finishTransaction(){

    $('#button-finish-transaction').click(function(){

        $('#form-add-patient')[0].reset();
        $('#form-add-transaction')[0].reset();
        $('#tbody-add-transaction').empty();
        $('#modal-add-transaction').modal('toggle');
    });
}

// --------------------
// Display new transaction to table
// --------------------
function displayToTable(data) {

    var tbody_add_transaction = $('#tbody-add-transaction');
    var balance = (parseInt(data.total) - parseInt(data.payment)).toString();

    if (balance > 0) {

        var button = '<a class="text-primary-600 mr-10" onclick="addBalancedTransaction('+data.transaction_id+','+balance+','+data.payment_id+');"><i class="icon-plus-circle2"></i></a>' + 
             '<a class="text-warning-600" onclick="confirmDeleteTransaction('+data.transaction_id+','+data.payment_id+');"><i class="icon-trash"></i></a>';
    }

    else {

        var button = '<a class="text-warning-600" onclick="confirmDeleteTransaction('+data.transaction_id+','+data.payment_id+');"><i class="icon-trash"></i></a>';
    }

    var html =  '<tr class="active" id="new_payment_'+data.payment_id+'">' +
                '<td>' + data.tooth_number + '</td>' + 
                '<td>' + data.treatment_id + '</td>' + 
                '<td>' + data.total + '</td>' +
                '<td>' + data.date_created + '</td>' + 
                '<td>' + data.payment + '</td>' + 
                '<td>' + balance + '</td>' +
                '<td class="hidden-print">' +  button + '</td>' +
            '</tr>';

    tbody_add_transaction.append(html);
};

// --------------------
// Add a transaction with balance
// --------------------
function addBalancedTransaction(id,balance,previous_payment_id) {

    var form_add_balanced_transaction = $('#form-add-balanced-transaction');

    form_add_balanced_transaction.find('[name=transaction_id]').val(id);
    form_add_balanced_transaction.find('[name=previous_payment_id]').val(previous_payment_id);
    form_add_balanced_transaction.find('[name=balance]').val(balance);
    form_add_balanced_transaction.find('[name=payment]').prop('max',balance);

    $('#modal-add-balanced-transaction').modal('toggle');
}

function saveBalancedTransaction() {

    $('#form-add-balanced-transaction').submit(function(){

        event.preventDefault();

        $.ajax({
            url : $(this).attr('action'),
            type: $(this).attr('method'),
            data : $(this).serialize()
        })
        .done(function(response){
            
            if (response.status == 'success') {

                var balance = parseInt(response.data.balance) - parseInt(response.data.payment);

                if (balance > 0) {

                    var button = '<a class="text-primary-600 mr-10" onclick="addBalancedTransaction('+response.data.transaction_id+','+balance+','+response.data.payment_id+');"><i class="icon-plus-circle2"></i></a>' + 
                        '<a class="text-warning-600" onclick="confirmDeleteTransaction('+response.data.transaction_id+','+response.data.payment_id+');"><i class="icon-trash"></i></a>';
                }
                else {

                    var button = '<a class="text-warning-600" onclick="confirmDeleteTransaction('+response.data.transaction_id+','+response.data.payment_id+');"><i class="icon-trash"></i></a>';
                }

                $('#tbody-add-transaction').find('#new_payment_' + response.data.previous_payment_id + ' td:last-child').css('opacity','0');

                var html =  '<tr id="new_payment_'+response.data.payment_id+'">' +
                        '<td> </td>' + 
                        '<td> </td>' + 
                        '<td> </td>' + 
                        '<td>' + response.data.date_created + '</td>' + 
                        '<td>' + response.data.payment + '</td>' + 
                        '<td>' + balance + '</td>' +
                        '<td class="hidden-print">' + button + '</td>' +
                    '</tr>';
                    
                $('#new_payment_' + response.data.previous_payment_id).after(html);

                $('#form-add-balanced-transaction')[0].reset();
                $('#modal-add-balanced-transaction').modal('toggle');
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

// --------------------
// Add transaction to existing Patient
// --------------------
function addTransactionToExistingPatient(id,fullname,data) {

    $("#div-add-transaction-print").html(

        '<b>Name:</b> ' + data.firstname + ' ' + data.lastname + '<br>' +
        '<b>Address:</b> ' + data.address + '<br>' + 
        '<b>Cellphone No.:</b> ' + data.cellphone + '<br>' + 
        '<b>Birthdate:</b> ' + data.birthdate + '<br>' +
        '<b>Occupation:</b> ' + data.occupation + '<br><br>'
    );

    $.ajax({
        url : url + 'transaction/view',
        type: 'POST',
        data : {'id': id}
    })
    .done(function(response){

        if (response.status == 'success') {

            displayExistingTransactionsToTable(response.data);

            $('#add-transaction-text-fullname').text(fullname);
            $('#form-add-transaction #input-patient-id').val(id);
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
}

function displayExistingTransactionsToTable(data) {

    var tbody_add_transaction = $('#tbody-add-transaction');

    $.each(data, function(key,value){

        var transaction_id = value.id;
        var tooth_number = value.tooth_number;
        var treatment_id = value.treatment_id;
        var total = parseInt(value.total);
        var balance = 0;
        var payment = 0;

        var payments = value.payments;

        $.each(payments, function(key,value){

            var payment_id = value.id;
            payment = parseInt(value.payment);


            total = balance = total - payment;
            

            if (balance > 0) {

                var button = '<a class="text-primary-600 mr-10" onclick="addBalancedTransaction('+transaction_id+','+balance+','+payment_id+');"><i class="icon-plus-circle2"></i></a>' + 
                     '<a class="text-warning-600" onclick="confirmDeleteTransaction('+transaction_id+','+payment_id+');"><i class="icon-trash"></i></a>';
            }

            else {

                var button = '<a class="text-warning-600" onclick="confirmDeleteTransaction('+transaction_id+','+payment_id+');"><i class="icon-trash"></i></a>';
            }

            if (key == payments.length - 1) {

                var ishidden = '';
            }

            else {

                var ishidden = 'style="opacity:0;"';
            }

            if (key == 0) {

                var html =  '<tr class="active" id="new_payment_'+payment_id+'">' +
                    '<td>' + tooth_number + '</td>' + 
                    '<td>' + treatment_id + '</td>' + 
                    '<td>' + total + '</td>' +
                    '<td>' + value.date_created + '</td>' + 
                    '<td>' + value.payment + '</td>' + 
                    '<td>' + balance + '</td>' +
                    '<td '+ishidden+' class="hidden-print">' + button + '</td>' +
                '</tr>';
            }

            else {

                var html =  '<tr id="new_payment_'+payment_id+'">' +
                    '<td></td>' + 
                    '<td></td>' + 
                    '<td></td>' +
                    '<td>' + value.date_created + '</td>' + 
                    '<td>' + value.payment + '</td>' + 
                    '<td>' + balance + '</td>' +
                    '<td '+ishidden+' class="hidden-print">' + button + '</td>' +
                '</tr>';
            }

            tbody_add_transaction.append(html);
        });
    });
}
