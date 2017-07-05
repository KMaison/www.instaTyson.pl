<?php if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        require "logowanie2.php";
						
						if (!sprawdzanie($_POST['login'], $_POST['pass']))
						 echo 'Niprawidłowy login lub hasło';
						 else 
							// echo "logowanie przebiegło pomyślnie";
							header('location: index.php');
					}
					 
                    include 'logowanie_view.php';
					 ?> 