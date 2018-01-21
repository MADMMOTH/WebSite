<?php
/**
* 
*/
class NewsController extends Controller
{
	function index(){
		$this->render("index",News::findAll());
	}
}