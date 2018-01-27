<form action="?c=news&a=add" method="post" enctype="multipart/form-data">
	<input type="file" name="image">
    <div>
        <label for="title">Nom :</label>
        <input name="title" type="text" />
    </div>
    <div>
        <label for="courriel">Text :</label>
        <textarea name="text" cols="40" rows="20"></textarea>
    </div>
    <div class="button">
        <button type="submit">ADD</button>
    </div>
</form>