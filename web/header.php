<?php
session_start();
?>
 <html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="Tyson, boks, bestia" />
        <title>Mike Tyson</title>
        <link rel="Stylesheet" href="Style.css" />
        <script src="scripts/jquery-1.11.3.js"></script>
        <script type="text/javascript" src="scripts/main.js"></script>
        <script src="scripts/ui/jquery-ui.js"></script>
        <link rel="stylesheet" href="scripts/ui/jquery-ui.css">
    </head>
	 <body onload="wczytaj_tlo()">

        <div id="container">

            <a href="index.php" class="stronaglowna">
                <div id="logo">
                    Mike Tyson
                    <img class="logo" src="Zdjecia/logo.png" alt="Mike Tyson" />
                    <div id="animacja">
                        <p class="tytul" style="font-size: 12px;">"Nienawidziłem każdej minuty treningu, ale powtarzałem sobie: nie poddawaj się, przecierp teraz i żyj resztę życia jako mistrz."</p>
                    </div>
                </div>
            </a>
            <div id="container2">
                <div id="menu">
                    <p class="tytul">MENU</p>
                    <ul class="ulmenu">
                        <li><a href="przesylanie_view.php" class="strona">Przesyłanie zdjęć</a></li>
						 <li><a href="galeria.php" class="strona">Galeria zdjęć</a></li>
						  <li><a href="ulubione_view.php" class="strona">Ulubione</a></li>
                    </ul>
					</br>
					<?php
					if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
                    ?>
					 <a href="logowanie.php" class="strona">Zaloguj sie!</a>
					<p style="font-size:15px;"><a href="test.php" class="strona">Nie masz konta?</a></p>
					
				   <?php
				   }
				   else{
					?>
					  Zalogowano jako <span style="color:#357753"><?= $_SESSION['name'] ?></span>.
					Aby wylogować <a href="wyloguj.php">kliknij tutaj</a>.
					</br>
					<?php
				   }
					?>
                
					
                    <button id="przycisk-zamien-tlo" onclick="zamien_tlo()"> Inne tło </button>
                    <br />
					<br />
                    <a href="http://www.filmweb.pl/person/Mike+Tyson-47792">
                        <img style="width: 40px; margin-left: 30px;" src="Zdjecia/filmweb.png" alt="Mike Tyson" />
                    </a>
                    <a href="https://youtu.be/FdmfndhIh-E">
                        <img style="width:55px; margin-left:30px;" src="Zdjecia/yt.png" alt="Mike Tyson" />
                    </a>
                </div>