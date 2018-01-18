<?php
include 'librairie/f_connectBD.php';

/** Recherche urlPage et titre de la page */
function listPage($idPage){
	
	$listDonnerPage = array();
	
	try{
		$connect = fconnectBD();
		
		$rqt= $connect->prepare("SELECT urlPage,titrePage FROM liste_page where idPage = ? ");
		$rqt->bindParam(1, $idPage);
		
		$rqt->execute();
		$rqt->setFetchMode(PDO::FETCH_OBJ);
		
		$result = $rqt->fetch();
		
		$listDonnerPage['a'] = $result->urlPage;
		$listDonnerPage['b'] = $result->titrePage;
		
	} catch ( Exception $e ) {
		exit( "ERREUR Select dans listPage : " .$e->getMessage () );
	}
	
	return $listDonnerPage;
}

?>