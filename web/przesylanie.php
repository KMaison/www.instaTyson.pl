<?php
require('get_db.php');
require('dodawanie_do_mongo.php');
$upload_dir = '/var/www/dev/web/images/';
function sprawdz_bledy(){
	$upload_dir = '/var/www/dev/web/images/';
	$file = $_FILES["zdjecie"];
	$file_name = basename($file['name']);
	$target = $upload_dir . $file_name;
	$tmp_path = $file['tmp_name']; 
	$imageFileType = pathinfo($target,PATHINFO_EXTENSION); //?
	$target_file = $GLOBALS['upload_dir'] . $file_name; //?
	$name = pathinfo($target,PATHINFO_FILENAME); //?
	$bledy=0;
	if ($_FILES["zdjecie"]["size"] > 1024*1024 || $_FILES["zdjecie"]["error"] == 1) {
		echo "Plik jest za duży! \n";
		$bledy=1;
	}
	if ($_FILES["zdjecie"]["type"] != 'image/jpeg' && $_FILES["zdjecie"]["type"] != 'image/jpg' && $_FILES["zdjecie"]["type"] != 'image/png' && $_FILES["zdjecie"]["error"] != 1) {
		echo 'Niepoprawny format. ';
		$bledy=1;
	}
	if($_FILES['zdjecie']['error'] != 0 || $bledy==1){
		echo "Plik nie został przesłany.";
		return false;
	}
	if ($bledy==0) {
		echo "Zdjecie wyslano poprawnie.";
		if(move_uploaded_file($tmp_path, $target)){
								echo "Upload przebiegł pomyślnie!\n";
								 mini($file_name,$imageFileType);
								 znak_wodny($file_name,$imageFileType);
								 dodaj($imageFileType, $name);
								}
		return true;
	}
}

function mini($file_name, $imageFileType){
    if($imageFileType == 'jpg' || $imageFileType == 'jpeg' || $imageFileType == 'JPEG' || $imageFileType == 'JPG'){
    $filepath = $GLOBALS['upload_dir'].$file_name;
    // Zmiana rozmiaru orginalnego obrazu
    list($width,$height) = getimagesize($filepath);
    $obraz_zmiana_wielkosci = imagecreatetruecolor(200, 125);
    $obrazek_tymczasowy     = imagecreatefromjpeg ($filepath);
    imagecopyresampled($obraz_zmiana_wielkosci, $obrazek_tymczasowy, 0, 0, 0, 0, 200, 125, $width, $height);
    imagejpeg($obraz_zmiana_wielkosci, $GLOBALS['upload_dir'].'mini_'.$file_name, 100);
    imagedestroy($obraz_zmiana_wielkosci);
    }
    else {
         $filepath = $GLOBALS['upload_dir'].$file_name;
    // Zmiana rozmiaru orginalnego obrazu
    list($width,$height) = getimagesize($filepath);
    $obraz_zmiana_wielkosci = imagecreatetruecolor(200, 125);
    $obrazek_tymczasowy     = imagecreatefrompng ($filepath);
    imagecopyresampled($obraz_zmiana_wielkosci, $obrazek_tymczasowy, 0, 0, 0, 0, 200, 125, $width, $height);
    imagepng($obraz_zmiana_wielkosci, $GLOBALS['upload_dir'].'mini_'.$file_name, 0);
    imagedestroy($obraz_zmiana_wielkosci);
    }


 }

function znak_wodny($file_name, $imageFileType ){
	
	$font ='/var/www/dev/web/fonts/arial.ttf';
	
	
	   if($imageFileType == 'jpg' || $imageFileType == 'jpeg' || $imageFileType == 'JPEG' || $imageFileType == 'JPG'){
    $filepath = $GLOBALS['upload_dir'].$file_name;
    list($width,$height) = getimagesize($filepath);
   $image = imagecreatetruecolor($width, $height);
	$image_src = imagecreatefromjpeg($filepath);
    imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $width, $height);
   $blue = imagecolorallocatealpha($image, 0, 0, 255, 80);
    imagettftext($image, 150, 0, 68, 190, $blue, $font, $_POST['znak_wodny']);
    imagejpeg($image, $GLOBALS['upload_dir'].'zw_'.$file_name, 100);
    }
	else 
    {
    $filepath = $GLOBALS['upload_dir'].$file_name;
    list($width,$height) = getimagesize($filepath);
    $image = imagecreatetruecolor($width, $height);
    $image_src = imagecreatefrompng($filepath);
    imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $width, $height);
   $blue = imagecolorallocatealpha($image, 0, 0, 255, 80);
    imagettftext($image, 150, 0, 68, 190, $blue, $font, $_POST['znak_wodny']);
    imagepng($image, $GLOBALS['upload_dir'].'zw_'.$file_name, 0);
    imagedestroy($image);
	}
}


?>