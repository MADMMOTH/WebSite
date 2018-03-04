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
try{
	if (isset(parameters()["c"])) {
		$controllerName = ucfirst(parameters()["c"])."Controller";
		if(class_exists($controllerName)){
			$controller = new $controllerName();
			$action = "index";
			if(isset(parameters()["a"])){
				$action = parameters()["a"];
			}
			if(method_exists($controller, $action)){
				$controller->$action();
			}else{
				throw new Exception($action." method do not defined in ".$controllerName);	
			}
		}
		else{
			throw new Exception($controllerName." do not exist");	
		}
		
	} else {
		$c = new HomeController();
		$c->index();
	}
}catch(Exception $e){
	$c = new ErrorController();
	$c->index($e);
}

?>