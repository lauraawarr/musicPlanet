<?php 
	$db = new PDO('mysql:host=localhost;dbname=warrla_musicPlanet;charset=utf8','warrla_user','musicPlanetUser123');
	// $db = new PDO('mysql:host=localhost;dbname=musicPlanet;charset=utf8','root','root');
	//set error mode, which allows errors to be thrown, rather than silently ignored
	$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	$sql = "SELECT * FROM genres
			ORDER BY genre_name";
		$query = $db->prepare( $sql );
		$query -> execute();
		$genreData = $query->fetchAll(PDO::FETCH_ASSOC);

	if(isset($_GET['searchName'])){
		$searchName = $_GET['searchName'];

		$sql = "SELECT * FROM singers WHERE singer_name LIKE :name";
		$query = $db->prepare( $sql );
		$query -> execute( array(':name' => "%".$searchName."%"));
		$searchData = $query->fetchAll(PDO::FETCH_ASSOC);

		if (count($searchData) == 1){

			$searchID = $searchData[0]['singer_id'];
			//go directly to singer page
			header("Location: search.singer.php?searchID=".$searchID);

		} else if (count($searchData) > 1){

			//display search results
			header("Location: search.browse.php?searchName=".$searchName);

		} else {

			//no results to display

		}; //end if/else
	};// end isset GET searchName

?>
<!DOCTYPE html>
<html>
<head>
	<title>Music Planet</title>
	<link rel='stylesheet' href='_css/browse.css' />
	<link rel='stylesheet' href='_css/main.css' />
	<link href="https://fonts.googleapis.com/css?family=Raleway:900" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class='row'>

<!-- This is the main div (put all content in here) -->
<div class='main'>
   <div class="container">
   		<div id="stars">
	   		<div class='orbit'></div>
	   		<div class='orbit-two'></div>
	   		<div class='orbit-three'></div>
	   		<div class='orbit' style='left: 40%; top: 20%'></div>
	   		<div class='orbit-two' style='left: 60%; top: 60%'></div>
	   		<div class='orbit-three' style='left: 70%; top: 20%'></div>
	   	</div>
		<div class="wrap-head">
		  <h1 class='pulse'>MUSIC PLANET</h1>
		</div>

		<div class="search-form">
			<form method='GET' id="search">
				<input name='searchName' type='text' placeholder="Search a singer...">
				<input type='submit' name='submit' value="Search">
			</form>
		</div>
    </div>
</div>

<!-- End of main div -->
<?php include('sidebar.php'); ?>

</body>
<script src='_scripts/main.js'></script>
<script src='_scripts/animate.js'></script>
</html>