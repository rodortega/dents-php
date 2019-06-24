<?php
namespace Mini\Controller;

use Mini\Libs\GUMP;
use Mini\Model\Transaction;
use Mini\Model\Payment;
use Mini\Model\User;

class TransactionController
{
	public function add()
	{
		$Transaction = new Transaction();
		$Payment = new Payment();

		$error = array();

		if ($_POST['payment'] > $_POST['total'])
		{
			$error[] = 'Payment should not be more than the total';

			send($error,'error');
		}
		else
		{
			if ($_POST['payment'] == $_POST['total'])
			{
				$_POST['status'] = '2';
			}
			else
			{
				$_POST['status'] = '1';
			}		

			$_POST['transaction_id'] = $Transaction->add($_POST);

			$_POST['payment_id'] = $Payment->add($_POST);
			
			send($_POST,'success');
		}
	}

	public function view()
	{
		$Transaction = new Transaction();
		$Payment = new Payment();

		$transactions = $Transaction->get_transactions_by_patient($_POST['id']);

		foreach ($transactions as $transaction)
		{
			$transaction->payments = $Payment->get_payments_by_transaction($transaction->id);
		}
	
		send($transactions,'success');
	}

	public function delete()
	{
		$Payment = new Payment();
		$Transaction = new Transaction();

		$payment_count = $Payment->count_existing($_POST['id']);

		if($payment_count->count > 1)
		{
			$deleted_payment = $Payment->delete($_POST['payment_id']);
		}
		else
		{
			$deleted_payment = $Payment->delete($_POST['payment_id']);
			$deleted_transaction = $Transaction->delete($_POST['id']);
		}
		
		send(null,'success');
	}
}