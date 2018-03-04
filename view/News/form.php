<?php
$link ="";
$title = "";
$text = "";
$btn_label = "ADD";
if($data != null){
	echo "<h1>EDIT NEWS</h1>";
	$link = "&id=".$data->new_id;
	$title = $data->new_title;
	$text = $data->new_text;
	$btn_label = "MODIFY";
}else{
	echo "<h1>ADD NEWS</h1>";
}

echo "
	<form action='?c=news&a=add".$link."' method='post' enctype='multipart/form-data'>
		<div>
	        <label for='game'>Game :</label>
	        <select name='game'>
	        	<option>None</option>";
				foreach (Game::findAll() as $game) {
					if($data == null){
						echo "<option value='".$game->gam_id."'>".$game->gam_title."</option>";
					}else if($data->gam_id == $game->gam_id){
						echo "<option selected value='".$game->gam_id."'>".$game->gam_title."</option>";
					}else{
						echo "<option value='".$game->gam_id."'>".$game->gam_title."</option>";
					}
				}
echo "		</select>
	    </div>
		<div>
	        <label for='type'>Type :</label>
	        <select name='type'>";
				foreach (Tpnews::findAll() as $type) {
					if($data == null){
						echo "<option value='".$type->tpn_id."'>".$type->tpn_label."</option>";
					}else if($data->u_tpnews->tpn_id == $type->tpn_id){
						echo "<option selected value='".$type->tpn_id."'>".$type->tpn_label."</option>";
					}else{
						echo "<option value='".$type->tpn_id."'>".$type->tpn_label."</option>";
					}
				}
echo "		</select>
	    </div>
	    <div>
	        <label for='title'>Titre :</label>
	      	<input name='title' type='text' value ='".$title."'/> 
	    </div>
	    <div>
	        <label for='image'>Miniature :</label>
	        <input type='file' name='image'>
	    </div>
	    <div>
	        <label for='Text'>Texte :</label>
	        <textarea class='coolEditor' name='text' cols='40' rows='20'>".$text."</textarea>
	    </div>
	    <div class='button'>
	        <button type='submit'>".$btn_label."</button>
	    </div>
	</form>";
	echo "<a class='adminLink' href='?c=news&a=delete".$link."'>DELETE</a>";
?>
