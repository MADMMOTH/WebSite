<?php
	if(isset($_SESSION["ADMIN"])){
		echo "<a class='adminTool' href = '?c=Game&a=form&id=".$data->gam_id."'><img src='ressources/edit.png'/></a>";
	}
	echo "<img class='banner' src ='upload/game/".$data->gam_id."_banner.jpg'>";
	
	$firstVid = "";
	if(count($data->l_video)){
		$firstVid = $data->l_video[0]->vid_url;
	}

	echo "<div id='videoReader'>
			<iframe allowfullscreen frameborder='0' src='".$firstVid."'></iframe>";
	echo "	<span>";
	foreach ($data->l_video as $vid) {
		echo "<button value='".$vid->vid_url."'>".$vid->vid_name."</button>";
	}
	echo "	</span>";
	if(isset($_SESSION["ADMIN"])){
		echo "<a class='adminLink' href = '?c=Video&gameid=".$data->gam_id."'>VIDEO MANAGER</a>";
	}
	echo "</div>";

	echo "<div class='content'>
		<p>".$data->gam_desc."</p>
		</div>";
?>
<br/>
<br/>
<h2 class="title">Lastest News</h2>
<?php
	echo "<div id='items'>";
	$id = "id=lastnews";
	$newslist = $data->l_news;
	usort($newslist,array("News","sortByDate"));
	$lastnews = array_slice($newslist,0,3);

	foreach ($lastnews as $news) {
		echo "<a ".$id." class='news' href= '?c=News&a=show&id=".$news->new_id."'
		style = background-image:url('upload/news/".$news->new_id.".jpg')>
		<h2 class='type'>".$news->u_tpnews->tpn_label."</h2>
		<div>
			<h2>".$news->new_title."</h2>
			<h2 class='date'>".date('d-m-y',strtotime($news->new_date))."</h2>
		</div>
		</a>";
		$id = "";
	}
	echo "</div>";
	echo "<a href='?c=News&gameid=".$data->gam_id."'>View more</a>"
?>