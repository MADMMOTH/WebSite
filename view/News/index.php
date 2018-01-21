<body>
	<main>
		<h1>News</h1>
		<?php
			foreach ($data as $news) {
				echo "<div><h2>".$news->new_title."</h2><p>".$news->new_text."</p></div>";
			}
		?>
	</main>
</body>