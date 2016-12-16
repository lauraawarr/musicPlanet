<!-- This is the entire side bar -->
<div id='side-bar' class='column'>

	<!-- This is the button that shows hidden bar -->
	 <div id='show-hidden'>
		<a href='#'>
			<span class="navButton" style="font-size:30px;cursor:pointer">&#9776; Genre</span>
		</a>
	</div>
 

	<!-- This is the hidden side bar -->
	<div id='hidden-bar' class='hidden'>


			<?php 
			// This prints list of genres in database (available attributes: genre_id, genre_name)
				foreach($genreData as $genre){
					echo "<div class='genre'>";
					echo "<a href='search.browse.php?genreID=".$genre['genre_id']."'>".$genre['genre_name']."</a>";
					echo "</div>";
				};
			?>
			

	</div>
	<!-- End of sidebar div -->
</div>