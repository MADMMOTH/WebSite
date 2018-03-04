<h1>HOME</h1>
<h2 class="title">Lastest News</h2>
<?php
	echo "<div id='items'>";
	$id = "id=lastnews";
	foreach ($data as $news) {
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
?>
<br/>
<br/>
<h2 class="title">About Us</h2>
<div id="aboutus">
	<p>Our objective as player and developers is to tell unforgettable stories with original ways to play and to provide fun as much we have when make games. Our studio is  interested in the developement of multiple types of interactive experiences such as arcade games, fast paced fps, horror games and more</p>
	<p>Madmmoth is an indie game studio based in France. It was founded in 2018 by two ambitious french IT students : Louis Lagache and Remi Chapuis</p>
</div>