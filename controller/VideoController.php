<?php
class VideoController extends Controller
{
	function index(){
		if(isset($_SESSION["ADMIN"])){
			if(isset(parameters()['gameid'])){
				if(isset(parameters()['id'])){
					$this->render("index",array(new Game(parameters()['gameid']),new Video(parameters()['id'])) );
				}else{
					$this->render("index",array(new Game(parameters()['gameid'])) );
				}
			}else{
				throw new Exception("gameid parameter missing");
			}
		}else{
			throw new Exception("403 FORBIDDEN");
		}
	}

	function add(){
		if(isset($_SESSION["ADMIN"])){
			$video;
			if(isset(parameters()['vidid'])){
				$video = new Video(parameters()['vidid']);
			}
			else{
				$video = new Video();
			}
			$video->vid_name = parameters()['name'];
			$video->vid_url = parameters()['url'];
			$video->gam_id = parameters()['gameid'];
		}else{
			throw new Exception("403 FORBIDDEN");
		}
		$this->index();
	}

	function delete(){
		if(isset($_SESSION["ADMIN"])){
			if(isset(parameters()['id'])){
				$video = new Video(parameters()['id']);
				$video->delete();
			}
		}else{
			throw new Exception("403 FORBIDDEN");
		}
		$this->index();
	}
}