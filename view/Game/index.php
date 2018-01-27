<h1>Games</h1>
<?php
	foreach ($data as $game) {
		echo "<div class='game'><h2>".$game->gam_title."</h2><a href= '?c=Game&a=show&id=".$game->gam_id."'>Learn more</a></div>";
	}
?>
