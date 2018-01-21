<?php
include 'librairie/f_connectBD.php';

/** */
class Page{
	
	public $urlPage;
	public $titrePage;
	
	public function Page($idPage){
		$this->searchUrlTitre($idPage);
	}
	
	/** Recherche urlPage et titre de la page */
	function searchUrlTitre($idPage){
		try{
			$connect = fconnectBD();
			
			$rqt= $connect->prepare("SELECT urlPage,titrePage FROM liste_page where idPage = ? ");
			$rqt->bindParam(1, $idPage);
			
			$rqt->execute();
			$rqt->setFetchMode(PDO::FETCH_OBJ);
			
			$result = $rqt->fetch();
			
			/* si url chercher dans la base n'est pas valide, on redirige sur la page d'acceuil */
			if(!$this->urlPage = $result->urlPage){
				header ( 'Location: index.php?idPage=0 ' ); //redirection page acceuil
				exit ();
			}
			$this->titrePage = $result->titrePage;
			
		} catch ( Exception $e ) {
			exit( "ERREUR Select dans listPage : " .$e->getMessage () );
		}
	}
	
}

?>