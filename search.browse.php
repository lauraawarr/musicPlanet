<?php

$db = new PDO('mysql:host=localhost;dbname=musicPlanet;charset=utf8','root','root');
$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = "SELECT * FROM genres";
	$query = $db->prepare( $sql );
	$query -> execute();
	$genreData = $query->fetchAll(PDO::FETCH_ASSOC);

if( isset($_GET['searchName']) ) {
	$searchName = $_GET['searchName'];

	$sql = "SELECT * FROM singers WHERE singer_name LIKE :name";
	$query = $db->prepare( $sql );
	//$query->bindParam( ":twitter" , $_SESSION['twitter'] );
	$query -> execute( array(':name' => "%".$searchName."%"));
	$searchData = $query->fetchAll(PDO::FETCH_ASSOC);

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
	//$query->bindParam( ":twitter" , $_SESSION['twitter'] );
	$query -> execute( array(':genreID' => $genreID));
	$genreSingers = $query->fetchAll(PDO::FETCH_ASSOC);

} else {
	$genreSingers = [];
};

?>

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