<?php if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        require "rejestracja.php";
						if (!hasla($_POST['pass'], $_POST['pass2']))
							 echo 'Podane dwa hasła różnią się';
						else if (!czy_istnieje($_POST['login'], $_POST['email'], $_POST['pass']))
							  echo 'Podany login lub e-mail już istnieje!';
						 else {
							 dodawanie_do_bazy($_POST['login'], $_POST['email'], $_POST['pass'] );
							 header("Location: galeria.php");
							 exit;
						}
					}
					 
                    include 'rejestracja_view.php';
					 ?> 