<h1>COMMUNITY</h1>
<h2 class="title">Join us on Social Networks</h2>
<div id="socialNetworks">
	<a href="https://discord.gg/MufvvVt" target='_blank'><img src="ressources/discord.png"/></a>
	<a href="https://discord.gg/MufvvVt" target='_blank'><img src="ressources/youtube.png"/></a>
	<a href="https://discord.gg/MufvvVt" target='_blank'><img src="ressources/twitter.png"/></a>
	<a href="https://discord.gg/MufvvVt" target='_blank'><img src="ressources/facebook.png"/></a>
</div>
<h2 class="title">Lastest Community Updates</h2>
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
