<?php
namespace Mini\Controller;

use Mini\Model\Counter;

class CounterController
{
	public function index()
	{
		$date = date('Y-m-d');

		$Counter = new Counter();
		$counter = $Counter->today($date);

		if (!$counter)
		{
			$counter['date'] = $date;
			$counter['revenue_count'] = "0";
			$counter['patient_count'] = "0";
			$counter['payment_count'] = "0";
		}

		send($counter,'success');
	}
}