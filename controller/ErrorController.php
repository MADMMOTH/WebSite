<?php
/**
* 
*/
class ErrorController extends Controller
{
	function index(Exception $e){
		$this->render("index",$e);
	}
}