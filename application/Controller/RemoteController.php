<?php
namespace Mini\Controller;

use Mini\Model\Patient;
use Mini\Libs\FileUpload;
use Mini\Libs\Mysqldump;

class RemoteController
{
	public function view($id)
	{
		$Patient = new Patient();
		$patient = $Patient->view($id);

		require VIEW . 'upload.php';
	}

	public function upload()
	{
		$file 	= new FileUpload();

		$prefix = date('YmdHis');

		$_POST['file_temp'] 	= $_FILES['file']['tmp_name'];
		$_POST['file_name'] 	= $prefix . '_' . $_FILES['file']['name'];
		$_POST['message_body'] 	= $_POST['file_name'];
		$_POST['file_url'] 		= 'uploads/' . $_POST['file_name'];


		$file->setInput('file');
		$file->setDestinationDirectory(UPLOADS);
		$file->setMaxFileSize('10M');
		$file->setCallbackOutput(function($data)
		{
			if ($data->status === true)
			{
				$Patient = new Patient();
				$patient = $Patient->upload($_POST);

				header("location:" . URL . "remote/view/" . $_POST['id']);
			}
		});
		$file->setFilename($_POST['file_name']);
		$file->allowOverwriting();
		$file->save();
	}

	public function dump()
	{
// 		$file = ROOT . 'backup/' . date("YmdHis") . '_dentaldb.sql';

// 		$dump = new Mysqldump('mysql:host=sql312.byethost.com;dbname='.DB_NAME, DB_USER, DB_PASS);
// 		$dump->start($file);

// 		if($this->ftp($file))
// 		{
// 			send('success');
// 		}
// 		else
// 		{
// 			send('failed');
// 		}
        send('success');
	}

	private function ftp($file)
	{
		$ftp_server = 'ftp.epizy.com';
		$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

		$ftp_username = 'epiz_22481343';
		$ftp_password = 'YACtEhbvBUAHk';

		$ftp_login = ftp_login($ftp_conn, $ftp_username, $ftp_password);

		if(ftp_put($ftp_conn, "htdocs/backup.sql", $file, FTP_ASCII))
		{
			ftp_close($ftp_conn);
			return true;
		}
		else
		{
			ftp_close($ftp_conn);
			return false;
		}
	}
}