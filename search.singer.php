<?php
//$db = new PDO('mysql:host=localhost;dbname=musicPlanet;charset=utf8','root','root');
$db = new PDO('mysql:host=localhost;dbname=warrla_musicPlanet;charset=utf8','warrla_user','musicPlanetUser123');
$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//if no singer is set, redirect to search page
if( !isset($_GET['searchID']) ) {
	header('Location: search.php');
} else {
	$searchID = $_GET['searchID'];
	// Inserts user input into database 
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// Checks if comment is already in databse
		if(!empty($_POST['newComment'])){
			$newComment = $_POST['newComment'];
			$sql = "SELECT * FROM comments
					WHERE comment = :newComment
					AND singer_id = :singer_id";
			$query = $db->prepare( $sql );
			$query -> execute( array(':newComment' => $newComment, ':singer_id'=> $searchID));
			$duplicate = $query->fetchAll(PDO::FETCH_ASSOC);
			// Does not insert into table if duplicate
			if (empty($duplicate)){
				$sql = "INSERT INTO comments (singer_id, comment) VALUES (:searchID, :newComment)";
				$query = $db->prepare( $sql );
				$query -> execute([':searchID' => $searchID, ':newComment' => $newComment]);
			}; // end duplicate
		}; //end isset newComment
	};
	$sql = "SELECT * FROM singers
			INNER JOIN comments
			ON (singers.singer_id = comments.singer_id) 
			WHERE singers.singer_id = :id";
	$query = $db->prepare( $sql );
	//$query->bindParam( ":twitter" , $_SESSION['twitter'] );
	$query -> execute( array(':id' => $searchID ));
	$searchComments = $query->fetchAll(PDO::FETCH_ASSOC);
	if (empty($searchComments)){
		$sql = "SELECT * FROM singers WHERE singer_id = :id";
		$query = $db->prepare( $sql );
		//$query->bindParam( ":twitter" , $_SESSION['twitter'] );
		$query -> execute( array(':id' => $searchID ));
		$searchSinger = $query->fetch(PDO::FETCH_ASSOC);
		$searchComments = [];
		$obj = ['comment' => 'No comments yet...'];
		array_push($searchComments, $obj);
	} else {
		$searchSinger = $searchComments[0];
	}; //end if searchComments empty
}; //end if searchID set
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Music Planet</title>
	<link rel='stylesheet' href='_css/singer.css' />
	<script src='_scripts/myJs1.js'></script>
</head>

<body>

	<!-- Main nav bar -->
	<div class='nav'>
		<a href='search.php'><img src="_images/backbro.png"></a>
	</div>
	<!-- End main nav bar -->

	<div id="main">


	<!-- This is the main content -->

	<?php 
		// Prints all comments about singer ($searchComments is array of comments about $searchSinger)
			// $searchSinger['singer_name'] is singer's name
			// each row in $searchComments has attributes: singer_id, comment
		
		echo "<div class = 'img'>"."<img height='300px' src='_images/_singers/".$searchSinger["image"]."'/>"."<h1>".$searchSinger['singer_name']."</h1>"."</div>";
		echo "<div class='comment'>";
		foreach ($searchComments as $row){
			echo "<p>".$row['comment']."</p>";
		};
		echo "</div>";
	?>

	<!-- Takes in user input comments -->
	<div class="form">
	<form method='POST' action='search.singer.php?searchID=<?php echo $searchSinger["singer_id"]?>'>
		<input name='newComment' type='text' maxlength='18' placeholder="Add your comment here.." required></input>
		<input name='commentSubmit' type='submit' value='Post' class='submit' required />
	</form>
	</div>
	</div>

	<!-- End of main content -->

</body>
</html>
