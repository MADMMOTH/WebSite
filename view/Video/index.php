<h1>VIDEO MANAGER</h1>
<?php
	$game = $data[0];

	$name = "";
	$url = "";
	$btn_label = "ADD";
	echo "<form action='?c=video&gameid=".$game->gam_id."&a=add' method='post' enctype='multipart/form-data'>";
	if(count($data) == 2){
		echo "<h2 class='title'>EDIT VIDEO</h2>";
		$name = $data[1]->vid_name;
		$url = $data[1]->vid_url;
		$btn_label = "MODIFY";
	}else{
		echo "<h2 class='title'>ADD VIDEO</h2>";
	}
	echo "   <div>
		        <label for='name'>Nom :</label>
		      	<input name='name' type='text' value ='".$name."'/> 
		    </div>
		    <div>
		        <label for='url'>Url :</label>
		      	<input name='url' type='text' value ='".$url."'/> 
		    </div>
		    <div class='button'>
	        	<button type='submit'>".$btn_label."</button>
	    	</div>";
	if(count($data) == 2){
		echo "<input type='hidden' name='vidid' value='".$data[1]->vid_id."'/>";
	}
	echo "</form>";
	echo "<div id='vidlist'>";
	foreach ($game->l_video as $video) {
		echo "<div>
				<p>".$video->vid_name." : ".$video->vid_url."</p>
				<a class='adminLink' href='?c=video&gameid=".$game->gam_id."&id=".$video->vid_id."'>EDIT</a>
				<a class='adminLink' href='?c=video&gameid=".$game->gam_id."&a=delete&id=".$video->vid_id."'>DELETE</a>
			</div>";
	}	
	echo "</div>";
?>
