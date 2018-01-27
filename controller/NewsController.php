<?php
/**
* 
*/
class NewsController extends Controller
{
	function index(){
		$this->render("index",News::findAll());
	}

	function show(){
		$this->render("show",new News(parameters()['id']));
	}

	function add(){
		$news = new News();
		$news->new_title = parameters()['title'];
		$news->new_text = parameters()['text'];
		print_r($_FILES);
		if(!empty($_FILES['image']))
		{
			echo "ENTER";
		    $path = "upload/";
		    $path = $path.basename( $_FILES['image']['name']);

		    if(move_uploaded_file($_FILES['image']['tmp_name'], $path))
		    {
		      echo "The file ".basename( $_FILES['image']['name'])." has been uploaded";
		    } else{
		        echo "There was an error uploading the file, please try again!";
		    }
		}
		else{
			echo "BUGGGGGGGGGGGG";
		}
		$this->index();
	}
}