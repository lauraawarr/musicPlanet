<!-- This is the entire side bar -->
<div id='side-bar' class='column'>

	<!-- This is the button that shows hidden bar -->
	<div id='show-hidden'>
		<a href='#'>
			Show Bar
		</a>
	</div>

	<!-- This is the hidden side bar -->
	<div id='hidden-bar' class='hidden'>

		<form method='GET' action='search.browse.php'>
			<?php 
			// This prints list of genres in database (available attributes: genre_id, genre_name)
				foreach($genreData as $genre){
					echo "<div class='genre'>";
					echo "<input name='genreID' type='radio' value='".$genre['genre_id']."''></input><label for='genre'>".$genre['genre_name']."</label>";
					echo "</div>";
				};
			?>
			<input type='submit'/>
		</form>

	</div>
	<!-- End of sidebar div -->
</div>