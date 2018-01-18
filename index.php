<?php
session_start ();
ob_start ();

include 'include/inc_header.php';

/* si url n'est pas vide, charge la page correspondante 
 * sinon charge accueil par defaut 
 */
if (strlen ( $urlPage ) > 0) {
	include $urlPage;
} else {
	include 'page/accueil.php';
}

include 'include/inc_footer.php';
?>