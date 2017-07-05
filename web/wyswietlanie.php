<?php
session_start();
require_once('get_db.php');
require('dodawanie_do_mongo.php');
	 $katalog='images';
    $db = get_db();
	$Lista=glob("$katalog/mini_*");
	$Lista2=glob("$katalog/zw_*");
	echo '<form method="POST" action="dodajulub.php" ENCTYPE="multipart/form-data">';
	echo "<table>";$i=1;
	foreach ($Lista as $i => $Nazwa) {
		$query= ['nazwa_mini'=>$Nazwa];
		$imagess=  $db->imagess->findOne($query);
		if ($imagess['status'] == 1 || (isset($_SESSION['logged']) && $imagess['autor'] == $_SESSION['name']) )
		{
		echo "<tr >";
		$Nazwa2=$Lista2[$i];
		echo '<td>';
		echo '<a href="'.$Nazwa2.'"><img src="'.$Nazwa.'" alt="Zdjecie" style="margin:2px; "></a>'; 
		echo '</td>';
		echo '<td>';
		echo "Autor: ".$imagess['autor'];
		echo "<td>Tytul: ".$imagess['tytul'];
		echo '</td>';
		if (($_SESSION[$imagess['nazwa']]==1))
			echo '<td><input name="'.$imagess["nazwa"].'" type="checkbox" checked/>Ulubione<br />';
	
		else 
			echo '<td><input name="'.$imagess["nazwa"].'" type="checkbox" />Ulubione<br />';
		
		if ($imagess['status'] == 0 && isset($_SESSION['logged']))
			 echo "zdjęcie prywatne";
        echo '</td>';
		echo "</tr>";
		}
	}
	echo "</table>";
	echo '<input type="submit" name="ulubione" value="Dodaj do ulubionych"/>';
	echo "</form>";
	
    ?>	