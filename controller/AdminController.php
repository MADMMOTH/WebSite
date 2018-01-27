<?php
class AdminController extends Controller
{
	function index(){
		$this->render("index");
	}

	function news(){
		$this->render("news");
	}
}