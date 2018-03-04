<?php
/**
* 
*/
class GameController extends Controller
{
	function index(){
		$this->render("index",Game::findAll());
	}
	function show(){
		if(isset(parameters()['id']))
			$this->render("show", new Game( parameters()['id'] ) );
		else{
			throw new Exception("id parameter missing");
		}
	}

	function add(){
		if(isset($_SESSION["ADMIN"])){
			$game;
			if(isset(parameters()['id']))
				$game = new Game(parameters()['id']);
			else
				$game = new Game();
			$game->gam_title = parameters()['title'];
			$game->gam_desc = parameters()['text'];
			if(!empty($_FILES['jacket']))
			{
			    $path = "upload/game/";
			    $path = $path.$game->gam_id."_jacket.jpg";
			    move_uploaded_file($_FILES['jacket']['tmp_name'], $path);
			}
			if(!empty($_FILES['banner']))
			{
			    $path = "upload/game/";
			    $path = $path.$game->gam_id."_banner.jpg";
			    move_uploaded_file($_FILES['banner']['tmp_name'], $path);
			}
		}else{
			throw new Exception("403 FORBIDDEN");
		}
		$this->index();
	}

	function delete(){
		if(isset($_SESSION["ADMIN"])){
			if(isset(parameters()['id'])){
				$game = new Game(parameters()['id']);
				$game->delete();
			}
		}else{
			throw new Exception("403 FORBIDDEN");
		}
		$this->index();
	}

	function form(){
		if(isset($_SESSION["ADMIN"])){
			if(isset(parameters()['id']))
				$this->render("form",new Game(parameters()['id']));
			else
				$this->render("form");
		}else{
			throw new Exception("403 FORBIDDEN");
		}
	}

}