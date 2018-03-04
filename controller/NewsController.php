<?php
class NewsController extends Controller
{
	function index(){
		$newslist;
		if(isset(parameters()['gameid'])){
			$game = new Game(parameters()['gameid']);
			$newslist = $game->l_news;
		}else{
			$newslist = News::findAll();
		}
		usort($newslist,array("News","sortByDate"));
		$this->render("index",$newslist);
	}

	function show(){
		if(isset(parameters()['id']))
			$this->render("show",new News(parameters()['id']));
		else{
			throw new Exception("id parameter missing");
		}
	}

	function add(){
		if(isset($_SESSION["ADMIN"])){
			$news;
			if(isset(parameters()['id']))
				$news = new News(parameters()['id']);
			else
				$news = new News();
			$news->u_tpnews = parameters()['type'];
			$news->new_title = parameters()['title'];
			$news->new_text = parameters()['text'];
			$news->gam_id = parameters()['game'];
			if(!empty($_FILES['image']))
			{
			    $path = "upload/news/";
			    $path = $path.$news->new_id.".jpg";
			    move_uploaded_file($_FILES['image']['tmp_name'], $path);
			}
		}else{
			throw new Exception("403 FORBIDDEN");
		}
		$this->index();
	}

	function delete(){
		if(isset($_SESSION["ADMIN"])){
			if(isset(parameters()['id'])){
				$news = new News(parameters()['id']);
				$news->delete();
			}
		}else{
			throw new Exception("403 FORBIDDEN");
		}
		$this->index();
	}

	function form(){
		if(isset($_SESSION["ADMIN"])){
			if(isset(parameters()['id']))
				$this->render("form",new News(parameters()['id']));
			else
				$this->render("form");
		}else{
			throw new Exception("403 FORBIDDEN");
		}
	}
}