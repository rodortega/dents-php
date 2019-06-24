<?php
namespace Mini\Controller;

use Mini\Libs\GUMP;
use Mini\Model\Patient;
use Mini\Model\Payment;
use Mini\Model\Transaction;

class PatientsController
{
	public function query($keyword)
	{
		$inputs = array(
			"name" => $keyword
		);

		$Patient = new Patient();
		$patients = $Patient->search($inputs);

		send($patients);
	}

	public function update()
	{
		$GUMP = new GUMP();

		$filter = array(
			'firstname' => 'sanitize_string|upper_case',
			'lastname' => 'sanitize_string|upper_case',
			'address' => 'sanitize_string|upper_case',
			'cellphone' => 'sanitize_numbers',
			'occupation' => 'sanitize_string|upper_case'
		);

		$inputs = $GUMP->filter($_POST,$filter);

		$Patient = new Patient();
		$patient = $Patient->update($inputs);

		send($inputs, 'success');
	}

	public function add()
	{
		$GUMP = new GUMP();

		$filter = array(
			'firstname' => 'sanitize_string|upper_case',
			'lastname' => 'sanitize_string|upper_case',
			'address' => 'sanitize_string|upper_case',
			'cellphone' => 'sanitize_numbers',
			'occupation' => 'sanitize_string|upper_case'
		);

		$inputs = $GUMP->filter($_POST,$filter);

		$inputs['picture'] = 'assets/images/male.jpeg';
		$inputs['date_created'] = date('Y-m-d');

		$Patient = new Patient();
		$inputs['id'] = $Patient->add($inputs);

		send($inputs,'success');
	}

	public function view()
	{
		$payments = array();

		$Patient = new Patient();
		$patient_info = $Patient->view($_POST['id']);
		
		$Transaction = new Transaction();
		$patient_info->transactions = $Transaction->get_transactions_by_patient($_POST['id']);
	
		send($patient_info,'success');
	}

	public function search()
	{	
		$GUMP = new GUMP();

		$filter = array(
			'name' => 'sanitize_string|trim|upper_case|rmpunctuation'
		);

		$inputs = $GUMP->filter($_POST,$filter);

		$Patient = new Patient();
		$results = $Patient->search($inputs);

		send($results,'success');
	}
}