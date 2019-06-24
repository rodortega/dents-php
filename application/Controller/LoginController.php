<?php
namespace Mini\Controller;

class LoginController
{
	public function index()
	{
        $page_title = "Login";
		
		require VIEW . '_templates/header.php';
		require VIEW . 'login.php';
		require VIEW . '_templates/footer.php';
	}
}