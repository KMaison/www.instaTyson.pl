<?php
session_start();
require_once('get_db.php');
require('dodawanie_do_mongo.php');
	
	$katalog='images';
    $db = get_db();
	$Lista=glob("$katalog/mini_*");
	$Lista2=glob("$katalog/zw_*");
	echo '<form method="POST" action="usunulub.php" ENCTYPE="multipart/form-data">';
	echo "<table>";$i=1;
	foreach ($Lista as $i => $Nazwa) {
		
		
		if ($i%2==1) echo "<tr >";
		$Nazwa2=$Lista2[$i];$query= ['nazwa_mini'=>$Nazwa];
		$imagess=  $db->imagess->findOne($query);
		
		if (($_SESSION[$imagess['nazwa']]==1))
		{
		echo '<td>';
		echo '<a href="'.$Nazwa2.'"><img src="'.$Nazwa.'" alt="Zdjecie" style="margin:2px; "></a>'; 
		echo '</td>';
		echo '<td>';
		echo "Autor:".$imagess['autor'];
		echo "<td>Tytul:".$imagess['tytul'];
		echo '</td>';
		echo '<td><input name="'.$imagess["nazwa"].'" type="checkbox"/>Usuń z ulubionych<br />';
		echo '</td>';
		}
      
		if ($i%2==1)echo "</tr>";
	}
	echo "</table>";
	echo '<input type="submit" name="nieulubione" value="Zatwierdź usuwanie"/>';
	
    ?>	