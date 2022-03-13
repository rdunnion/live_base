<!--- includes contents of file header.html --->
<?php include "header.html" ?>

<!-- Restricts access until user is logged in -->
<?php
session_start();
if (!isset($_SESSION["loggedin"]) === TRUE) {
	header("location: login.php");
	exit;
}
?>
<!-- HTML portion -->
<title>Live Base: Search</title>

<div class="wrapper form-group box center">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" method="GET" name="">
					<table>
						<input type="text" class="form-control" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Enter your search keyword" />
						<input type="submit" class="form-control btn btn-primary ml-2" name="" value="Search" />
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
require_once "config.php";

// get the search terms from the url
if (isset($_GET['k']) && $_GET['k'] != '') {

	$k = trim($_GET['k']);

	// define the search query
	$search_string =
		"SELECT * FROM users 
    	WHERE username LIKE '%$k%'
		OR band_name LIKE '%$k%'
    	OR show_venue LIKE '%$k%'
    	OR show_date LIKE '%$k%'
		OR recording_format LIKE '%$k%'
		OR show_length LIKE '%$k%'
		OR user_rating='$k'
		OR notes LIKE '%$k%'";
	$display_words = "$k";

	// query the database and count rows
	$query = mysqli_query($conn, $search_string);
	$result_count = mysqli_num_rows($query);

	// check to see if any results are found
	if ($result_count != 0) {
		// display search result count to user
		echo '<br><div class="box center"><u><br>' . $result_count . '</u> results found.<br><br>';
		echo 'Your search results for <i>' . $display_words . '</i><br><br></div><hr />';

		// display all the search results to the user
		while ($row = mysqli_fetch_assoc($query)) {
			echo '
			<div class="box center">
			<tr>
					<br><tr><td><div>Username: ' . $row['username'] . '</div></td></tr>
					<tr><td><div>Band Name: ' . $row['band_name'] . '</div></td></tr>
					<tr><td><div>Show Venue: ' . $row['show_venue'] . '</div></td></tr>
					<tr><td><div>Show Date: ' . $row['show_date'] . '</div></td></tr>
					<tr><td><div>Recording Format: ' . $row['recording_format'] . '</div></td></tr>
					<tr><td><div>Show Length: ' . $row['user_rating'] . '</div></td></tr>
					<tr><td><div>Notes: ' . $row['notes'] . '</div></td></tr>
					<tr><td><br></td></tr>
				</tr>
				</div>
				</div>';
		}
		echo '</table>';
	} else
		echo '<br><br><tr><td>No results found. Please search something else.</td></tr>';
}

?>

<!--- includes contents of file footer.html --->
<?php include "footer.html" ?>