<?php
/**
* 
*/
class HomeController extends Controller
{
	function index(){
		$newslist = News::findAll();
		usort($newslist,array("News","sortByDate"));
		$lastnews = array_slice($newslist,0,3);
		$this->render("index",$lastnews);
	}
}