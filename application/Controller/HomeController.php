<?php
namespace Mini\Controller;

use Mini\Model\User;

class HomeController
{
	public function index()
	{
	    $User = new User();
	    
	    if($User->is_logged_in())
	    {
	        $page_title = "Home";
		
    		require VIEW . '_templates/header.php';
    		require VIEW . 'index.php';
    		require VIEW . '_templates/footer.php';
	    }
	    
	    else
	    {
	        header("location:". URL . "login");
	    }
	}
}