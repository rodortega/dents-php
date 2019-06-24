<?php
namespace Mini\Controller;

use Mini\Model\Counter;
use Mini\Model\Transaction;

class ReportController
{
	public function generate()
	{
		switch ($_POST['type'])
		{
			case 'transaction':

				$Transaction = new Transaction();

				$transactions['type'] = 'transaction';
				$transactions['info'] = $Transaction->get_transactions_by_date($_POST['start'],$_POST['end']);
				
				send($transactions,'success');
				break;
			
			case 'revenue':

				$Transaction = new Transaction();

				$transactions = $Transaction->get_revenue_by_date($_POST['start'],$_POST['end']);

				send($transactions,'success');
				break;
		}
	}
}