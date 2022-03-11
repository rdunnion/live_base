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
<div class="wrapper form-group">
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

	// format each of search keywords into the db query to be run
	/*$keywords = explode(' ', $k);

	foreach ($keywords as $word) {
		$search_string .= "keywords LIKE '%" . $word . "%' OR ";
		$display_words .= $word . " ";
	}
	$search_string = substr($search_string, 0, strlen($search_string) - 3);*/

	// query the database and count rows
	$query = mysqli_query($conn, $search_string);
	$result_count = mysqli_num_rows($query);

	// check to see if any results are found
	if ($result_count != 0) {
		// display search result count to user
		echo '<br><div class="left padding-left"><u>' . $result_count . '</u> results found.</div><br>';
		echo '<div class="left padding-left">Your search results for <i>' . $display_words . '</i></div><hr /><br>';

		echo '<table>';

		// display all the search results to the user
		while ($row = mysqli_fetch_assoc($query)) {
			echo '
			<tr>
					<tr><td><div class="left padding-left">Username: ' . $row['username'] . '</div></td></tr>
					<tr><td><div class="left padding-left">Band Name: ' . $row['band_name'] . '</div></td></tr>
					<tr><td><div class="left padding-left">Show Venue: ' . $row['show_venue'] . '</div></td></tr>
					<tr><td><div class="left padding-left">Show Date: ' . $row['show_date'] . '</div></td></tr>
					<tr><td><div class="left padding-left">Recording Format: ' . $row['recording_format'] . '</div></td></tr>
					<tr><td><div class="left padding-left">Show Length: ' . $row['user_rating'] . '</div></td></tr>
					<tr><td><div class="left padding-left">Notes: ' . $row['notes'] . '</div></td></tr>
					<tr><td><br></td></tr>
				</tr>
				</div>';
		}
		echo '</table>';
	} else
		echo '<tr><td>No results found. Please search something else.</td></tr>';
}

?>

<!--- includes contents of file footer.html --->
<?php include "footer.html" ?>