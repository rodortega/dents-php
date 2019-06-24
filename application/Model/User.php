<?php
namespace Mini\Model;

use Mini\Core\Model;

class User extends Model
{
    public function login(array $data)
    {
        $sql = "SELECT * FROM doctors WHERE username = :username AND password = :password";

        $param = array(
            ":username" => $data['username'],
            ":password" => $data['password']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);
        return $query->fetch();
    }
    
	public function logout()
	{
	    session_start();
	    session_destroy();

	    return true;
	}
    
    public function create_session($user)
	{
	    session_start();
	    $_SESSION['id'] = $user->id;
	    $_SESSION['firstname'] = $user->firstname;
	    $_SESSION['lastname'] = $user->lastname;
	    
	    return true;
	}
	
	public function is_logged_in()
	{
	    session_start();
	    
	    if (isset($_SESSION['id']))
	    {
	        return true;
	    }
	    else
	    {
	        session_destroy();
	        return false;
	    }
	}
}