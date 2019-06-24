<?php
namespace Mini\Controller;

use Mini\Model\Payment;

class PaymentController
{
	public function add()
	{
		$Payment = new Payment();

		$_POST['payment_id'] = $Payment->add($_POST);

		send($_POST,'success');
	}
}