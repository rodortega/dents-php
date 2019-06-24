<?php
namespace Mini\Controller;

use Mini\Model\User;

class UsersController
{
	public function login()
	{
		$User = new User();
		
		$_POST['password'] = md5($_POST['password']);
		
		$login_details = $User->login($_POST);
		
		if (empty($login_details))
		{
		    $message[] = "Username or Password is incorrect.";
		    send($message, 'error');
		}
		else
		{
		    if ($User->create_session($login_details))
    		{
    		    send($login_details,'success');
    		}
		}
	}
	
	public function logout()
	{
	    $User = new User();
	    if ($User->logout())
		{
		    $message[] = "Logout Successful.";
		    send($message,'success');
		    
		    header("location:" . URL . 'login');
		}
	}
}