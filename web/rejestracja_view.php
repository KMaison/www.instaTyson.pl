<?php require 'header.php';?>
					
				   <div id="content">
				   <p class="tytul">Rejestracja</p>
				   <form  method="POST">
					login: <input type="text" placeholder="login" name="login" required></br>
					haslo: <input type="password" placeholder="haslo" name="pass" required></br>
					powtórz hasło: <input type="password" placeholder="haslo" name="pass2" required></br>
					adres e-mail: <input type="email" placeholder="e-mail" name="email" required />
					<input type="submit" name="submit" value="Załóż konto"/>
					 </form>
                    </div>
<?php require 'footer.php'; ?>