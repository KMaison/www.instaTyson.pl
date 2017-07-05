<?php
session_start();
require_once('get_db.php');
require_once('rejestracja.php');

if(!isset($_SESSION['logged'])){
    $_SESSION['logged'] = false;
}
function sprawdzanie ($login,$pass)
{
	$db = get_db();

  $user = $db->users->findOne( ['login' => $login]);
   if($user != NULL){
       if(password_verify($pass, $user['pass'])){
		   $_SESSION['logged'] = true;
           $_SESSION['name'] = $login;
		  return true;
       }
       else{
          $_SESSION['logged'] = false;
		 return false;
        }

    }
    else{
		$_SESSION['logged'] = false;
       return false;
    }

}
?> 