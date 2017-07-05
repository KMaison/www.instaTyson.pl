<?php
session_start();
require_once('get_db.php');
$katalog='images';
    $db = get_db();
	$Lista=glob("$katalog/mini_*");
	$i=1;
	global $ulubione;
	foreach ($Lista as $i => $Nazwa) {
		$query= ['nazwa_mini'=>$Nazwa];
		$imagess=  $db->imagess->findOne($query);
		if (isset($_POST[(string)$imagess['nazwa']]))
					{
						//$ulubione[(string)$imagess['nazwa']]=true;
						$_SESSION[(string)$imagess['nazwa']]=1;
						
					}
		else 
					{
						//$ulubione[(string)$imagess['nazwa']]=false;
						$_SESSION[(string)$imagess['nazwa']]=0;
					}
	}

	
 header("Location: galeria.php");
?>