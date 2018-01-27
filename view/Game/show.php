<?php
	echo "<h1>".$data->gam_title."</h1><p>".$data->gam_desc."</p>";
	$videos = Video::findByFKey("game",$data->gam_id);
	foreach ($videos as $vid) {
		echo "<p>".$vid->vid_url."</p>";
	}
?>