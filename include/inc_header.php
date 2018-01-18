<?php
include 'object/Page.php';

$idPage = 0;

/*verifie par la methode GET la page correspondante a ce qu'on souhaite*/
if(isset($_GET["idPage"])){
	$idPage = $_GET["idPage"];
}

$page = new Page($idPage);
$urlPage = $page->urlPage;
$titrePage = $page->titrePage;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<title><?php echo $titrePage ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<?php include 'include/inc_menu.php';?>