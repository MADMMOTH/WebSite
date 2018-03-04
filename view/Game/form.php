<?php
$link ="";
$title = "";
$text = "";
$btn_label = "ADD";
if($data != null){
    echo "<h1>EDIT GAME</h1>";
    $link = "&id=".$data->gam_id;
    $title = $data->gam_title;
    $text = $data->gam_desc;
    $btn_label = "MODIFY";
}else{
    echo "<h1>ADD GAME</h1>";
}

echo "
    <form action='?c=Game&a=add".$link."' method='post' enctype='multipart/form-data'>
        <div>
            <label for='title'>Titre :</label>
            <input name='title' type='text' value ='".$title."'/> 
        </div>
        <div>
            <label for='jacket'>Jacket cover :</label>
            <input type='file' name='jacket'>
        </div>
        <div>
            <label for='banner'>Banner :</label>
            <input type='file' name='banner'>
        </div>
        <div>
            <label for='Text'>Texte :</label>
            <textarea class='coolEditor' name='text' cols='40' rows='20'>".$text."</textarea>
        </div>
        <div class='button'>
            <button type='submit'>".$btn_label."</button>
        </div>
    </form>";
    echo "<a class='adminLink' href='?c=game&a=delete".$link."'>DELETE</a>";
?>
