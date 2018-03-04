<h1>OUR GAMES</h1>
<?php
	if(isset($_SESSION["ADMIN"])){
		echo "<a class='adminTool' href = '?c=Game&a=form'><img src='ressources/add.png'/></a>";
	}
	echo "<div id='items'>";
	foreach ($data as $game) {
		echo "<a class='game' href= '?c=Game&a=show&id=".$game->gam_id."'><img src ='upload/game/".$game->gam_id."_jacket.jpg'>
			<div><h2>".$game->gam_title."</h2></div>
			</img>
			</a>";
	}
	echo "</div>";
?>

