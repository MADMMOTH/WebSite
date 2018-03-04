<h1>ARE YOU LOST</h1>
<img id="travolta" src="ressources/travolta.gif" />
<?php
if(isset($_SESSION['ADMIN']))
 echo "<p>ERROR LOG : ". $data->getMessage()."</p>"; 
 ?>
<a href="?c=Home">go back to home</a>