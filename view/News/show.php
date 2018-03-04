<?php
	echo "<h1>".strtoupper($data->u_tpnews->tpn_label)."</h1>";
	if(isset($_SESSION["ADMIN"])){
		echo "<a class='adminTool' href = '?c=News&a=form&id=".$data->new_id."'><img src='ressources/edit.png'/></a>";
	}
?>
<div class="content">
<?php
	echo "<h2 class='title'>".$data->new_title."</h2><p>".$data->new_text."</p>";
?>
</div>

