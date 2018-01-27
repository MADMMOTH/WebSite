<h1>News</h1>
<?php
	foreach ($data as $news) {
		echo "<div class='news'><h2>".$news->new_title."</h2><a href= '?c=News&a=show&id=".$news->new_id."'>Lire</a></div>";
	}
?>