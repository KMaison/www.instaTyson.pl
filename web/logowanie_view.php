<?php require 'header.php';?>
					
				   <div id="content">
				   <?php if (!$_SESSION['logged']){?>
				   <p class="tytul">Logowanie</p>
				  <form  method="post">
					<input  type="text" name="login" placeholder="login" required />
					<input  type="password" name="pass" placeholder="hasło" required />
					<input  type="submit" value="Zaloguj" />
					</form>
					<?php  }  else  echo"JESTES ZLOGOWANY";?>
                    </div>
<?php require 'footer.php'; ?>