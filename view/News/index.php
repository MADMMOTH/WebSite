<h1>ALL NEWS</h1>
<?php
	if(isset($_SESSION["ADMIN"])){
		echo "<a class='adminTool' href = '?c=News&a=form'><img src='ressources/add.png'/></a>";
	}
	echo "<div id='items'>";
	foreach ($data as $news) {
		echo "<a class='news' href= '?c=News&a=show&id=".$news->new_id."'
		style = background-image:url('upload/news/".$news->new_id.".jpg')>
		<h2 class='type'>".$news->u_tpnews->tpn_label."</h2>
		<div>
			<h2>".$news->new_title."</h2>
			<h2 class='date'>".date('d-m-y',strtotime($news->new_date))."</h2>
		</div>
		</a>";
	}
	echo "</div>";
?>
