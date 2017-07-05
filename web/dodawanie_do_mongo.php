<?php

function dodaj($imageFileType, $name){
    $db = get_db();
    $image = [
    'nazwa' => $name,
	'nazwa_mini' => 'images/mini_'.$name.".".$imageFileType,
    'autor' => $_POST['autor'],
    'tytul' => $_POST['tytul'], 
    'rozszerzenie' => $imageFileType,
	'status' => $_POST['status']
   ];
   $db->imagess->insert($image);
   
}

function DeleteImages() {
	$db = get_db();
$imagess = $db->imagess->find(); 

foreach($imagess as $image) {
$db->imagess->remove($image);
}
}
?>

