<?php
require_once('get_db.php');


function hasla ($pass, $pass2){	
  if($pass !== $pass2){
	  
       return false;
    }
	else return true;
}
function czy_istnieje($login, $email, $pass){
         $db = get_db();
        if($db->users->findOne(
            [
                    '$or' => [
                         
                            ["login" => $login],
                             ["email" => $email]
                         
                    ]
            ]))
				{
					return false;
				}
			else 
				{
					return true;
				}
}
function dodawanie_do_bazy($login,$email,$pass)
 {
	 $pass = password_hash($pass, PASSWORD_BCRYPT);
	  $db = get_db();
            $userDB = [
                'login' => $login,
                'email' => $email,
                'pass' => $pass
                ];

            $db->users->insert($userDB);

}