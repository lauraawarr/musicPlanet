<?php
//$db = new PDO('mysql:host=localhost;dbname=musicPlanet;charset=utf8','root','');
$db = new PDO('mysql:host=localhost;dbname=warrla_musicPlanet;charset=utf8','warrla_user','musicPlanetUser123');
$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = "SELECT * FROM genres ORDER BY genre_name";
	$query = $db->prepare( $sql );
	$query -> execute();
	$genreData = $query->fetchAll(PDO::FETCH_ASSOC);

// Redirects user back to search page if no genre ID or searchName are set
if((!isset($_GET['searchName']))&&(!isset($_GET['genreID']))){
	header('Location: search.php');
};

if( isset($_GET['searchName']) ) {
	$searchName = $_GET['searchName'];
	$sql = "SELECT * FROM singers WHERE singer_name LIKE :name";
	$query = $db->prepare( $sql );
	//$query->bindParam( ":twitter" , $_SESSION['twitter'] );
	$query -> execute( array(':name' => "%".$searchName."%"));
	$searchData = $query->fetchAll(PDO::FETCH_ASSOC);
	$header = "Results";
} else {
	$searchData = [];
};
if( isset($_GET['genreID']) ) {
	$genreID = $_GET['genreID'];
	$sql = "SELECT * FROM genres_to_singers 
			INNER JOIN singers 
			ON (singers.singer_id = genres_to_singers.singer_id)
			INNER JOIN genres
			ON (genres.genre_id = genres_to_singers.genre_id)
			WHERE genres.genre_id = :genreID";
	$query = $db->prepare( $sql );
	$query -> execute( array(':genreID' => $genreID));
	$genreSingers = $query->fetchAll(PDO::FETCH_ASSOC);
	$sql = "SELECT * FROM genres WHERE genre_id = :genreID";
	$query = $db->prepare( $sql );
	$query -> execute( array(':genreID' => $genreID));
	$results = $query->fetch(PDO::FETCH_ASSOC);
	$header = $results['genre_name'];
} else {
	$genreSingers = [];
};
?>

<!DOCTYPE html>
<html>
<head>
	<title>Music Planet</title>
	<link rel='stylesheet' href='_css/main.css' />
	<link rel='stylesheet' href='_css/browse.css' />
	<link href="https://fonts.googleapis.com/css?family=Raleway:900" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class='row'>

	<!-- This is the main browse div (put all browse content in here) -->

	<div id='main-browse' class='column'>
		<!-- navigation  -->
		<div class='nav'>
			<div><a href='search.php'><img src="_images/backbro.png"/></a></div>
		</div>
		<!-- genre_title -->
		<div class="genre_title">
			<?php  
				echo"<div class='titles'>";
 				echo strtoupper($header);
			 	echo"</div>";
			 ?>
		</div>
		<!-- singers -->
			<div class="container1">			
					 <div class="grid">  

					 		<?php
								$singerList = array_merge($searchData, $genreSingers);
								// This prints list of singers matching search values (available attributes: singer_id, singer_name)
								foreach ($singerList as $singer) {
									echo "<div class='singer'>";
									// Edit content of each singer div here
									echo "<a href='search.singer.php?searchID=".$singer['singer_id']."'>";
									echo "<figure><img class='pic' src='_images/_singers/".$singer["image"]."'width='200px' height='200px' /></figure>";
									echo "<figcaption>".$singer['singer_name']."</figcaption></a>";
									echo "</div>";
								};
							?>			
				   		     		
				  	</div>
			</div>
		
		

	</div>
	<!-- End of main browse div -->

<?php include('sidebar.php'); ?>
   

</body>
<script src='_scripts/main.js'></script>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Music Planet</title>
	<link rel='stylesheet' href='_css/main.css' />
</head>

<body class='row'>

	<!-- This is the main browse div (put all browse content in here) -->

	<div id='main-browse' class='column'>
		<div class='nav'>
			<a href='search.php'>BACK</a>
		</div>

		<?php

		echo $header;

		$singerList = array_merge($searchData, $genreSingers);

		// This prints list of singers matching search values (available attributes: singer_id, singer_name)
		foreach ($singerList as $singer) {
			echo "<div class='singer'>";

			// Edit content of each singer div here
			echo "<a href='search.singer.php?searchID=".$singer['singer_id']."'>".$singer['singer_name']."</a>";

			echo "</div>";
		};

		?>

	</div>
	<!-- End of main browse div -->


<?php include('sidebar.php'); ?>

</body>
<script src='_scripts/main.js'></script>
</html>
