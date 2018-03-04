<?php
session_start();
$password = "mdp";


if(isset($_POST["password"])){
    if($_POST["password"] == $password)
        $_SESSION["ADMIN"] = true;
}

if(isset($_POST["disconnect"])){
	unset($_SESSION["ADMIN"]);
}

echo "<form action='' method='post' enctype='multipart/form-data'>";
if(isset($_SESSION["ADMIN"])){
	echo "<div><button type='submit' name='disconnect'>Disconnect</button></div>";
}else{
	echo "<div><input name='password' type='password' /></div>
		<div><button type='submit'>Connect</button></div>";
}
echo "</form>";
?>

<a href="..">RETURN TO HOME PAGE</a>
