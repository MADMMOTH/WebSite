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
		$this->render("show",new Game(parameters()['id']));
	}

}