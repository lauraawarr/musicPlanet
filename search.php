<?php 
	$db = new PDO('mysql:host=localhost;dbname=musicPlanet;charset=utf8','root','root');
	//set error mode, which allows errors to be thrown, rather than silently ignored
	$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	$sql = "SELECT * FROM genres";
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
	<link rel='stylesheet' href='_css/main.css' />
</head>

<body class='row'>

<!-- This is the main div (put all content in here) -->
<div id='main'>

	<form method='GET'>
		<input name='searchName' type='text'></input>
		<input type='submit'/>
	</form>

</div>
<!-- End of main div -->

<?php include('sidebar.php'); ?>

</body>
<script src='_scripts/main.js'></script>
</html>