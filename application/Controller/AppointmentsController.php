<?php
namespace Mini\Controller;

use Mini\Libs\GUMP;
use Mini\Model\Appointment;
use Mini\Model\User;

class AppointmentsController
{
	public function __construct()
	{
		session_start();
	}

	public function index()
	{
		$Appointment = new Appointment();
		$appointments = $Appointment->get();

		foreach ($appointments as $appointment)
		{
			if ($appointment->doctor_id != $_SESSION['id'])
			{
				$appointment->color = '#2b2b2b';
				$appointment->editable = false;
				$appointment->deletable = false;
			}
			else
			{
				$appointment->editable = true;
				$appointment->deletable = true;
			}
		}

		send($appointments);
	}

	public function today()
	{
		$date = date("Y-m-d");
		$Appointment = new Appointment();
		$appointments = $Appointment->today($date);

		send($appointments,'success');
	}

	public function read($id)
	{
		$Appointment = new Appointment();
		$Appointment->read($id);
	}

	public function add()
	{
		$GUMP = new GUMP();

		$filter = array(
			'title' => 'sanitize_string'
		);

		$inputs = $GUMP->filter($_POST,$filter);

		$inputs['start'] = $inputs['date'] .' '. $inputs['time']; 

		$inputs['doctor_id'] = $_SESSION['id'];

		$Appointment = new Appointment();
		$inputs['id'] = $Appointment->add($inputs);

		send($inputs, 'success');
	}

	public function update()
	{
		if ($_POST['doctor_id'] != $_SESSION['id'])
		{
			$message = "You are not allowed to update someone else's appointment.";
			send($message,'error');

			exit();
		}

		$Appointment = new Appointment();
		$appointment = $Appointment->update($_POST);

		send($appointment,'success');
	}

	public function delete()
	{
		if ($_POST['doctor_id'] != $_SESSION['id'])
		{
			$message = "You are not allowed to update someone else's appointment.";
			send($message,'error');

			exit();
		}
		
		$Appointment = new Appointment();
		$appointment = $Appointment->delete($_POST['id']);

		send(null,'success');
	}	
}