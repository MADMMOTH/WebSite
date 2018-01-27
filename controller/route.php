<?php

// Gestion des routes
// Déclenchement automatique des controleurs
// ToDo : gestion des erreurs d'accès


// Accès POST ou GET indifférent
$parameters = array();
if (isset($_POST))
	foreach($_POST as $k=>$v)
		$parameters[$k] = $v;
if (isset($_GET))
	foreach($_GET as $k=>$v)
		$parameters[$k] = $v;

// Pour accès ultérieur sans "global"
function parameters() {
	global $parameters;
	return $parameters;
}

// Gestion des la route : paramètre c = controller & a = action
if (isset(parameters()["c"])) {
	$controllerName = parameters()["c"]."Controller";
	$controller = new $controllerName();
		$action = "index";
	if(isset(parameters()["a"])){
		$action = parameters()["a"];
	}
	$controller->$action();
} else {
	$c = new HomeController();
	$c->index();
}


?>