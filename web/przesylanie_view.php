<?php require 'header.php'; ?>
   
                  <div id="content">
                   <h1>Prześlij zdjęcie</h1>
				   <form action="przesylanie_view.php" method="POST" ENCTYPE="multipart/form-data">
					<input type="file" name="zdjecie"/><br/>
					Podaj znak wodny:<input type="text" name="znak_wodny" required></br>
					Tutuł:<input type="text" name="tytul" required></br>
					Autor:<input type="text" name="autor" value="<?= (isset($_SESSION['name']))? $_SESSION['name'] : '' ?>" required></br>
					<?php if(isset($_SESSION['logged'])): ?>
                            <input type="radio" value="0" name="status" checked/>Prywatne
                            <input type="radio" value="1" name="status" />Publiczne
                            <?php else: ?>
                                    <input type="hidden" value="0" name="status"/>
                                <?php endif; ?>
					<input type="submit" name="submit" value="Wyślij zdjęcie"/>
					 </form>
					<?php
					if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        require "przesylanie.php";
						sprawdz_bledy();
					}
                    ?>
                    </div>
<?php require 'footer.php'; ?>