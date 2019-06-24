<?php
function send($json,$status = null)
{
	if ($status == null)
	{
		$data = $json;
	}
	else
	{
		$data = array(
			"status" => $status,
			"data" => $json
		);
	}
	
	header('Content-Type: application/json');
	echo json_encode($data);
}
?>