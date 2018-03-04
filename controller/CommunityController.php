<?php
class CommunityController extends Controller
{
	function index(){
		$newslist = News::findAll();
		$communews = News::filterArrayByType($newslist,"Commu");
		usort($communews,array("News","sortByDate"));
		$lastnews = array_slice($communews,0,3);
		$this->render("index",$lastnews);
	}
}