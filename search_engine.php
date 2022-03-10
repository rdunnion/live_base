<form action="" method="GET" name="">
	<table>
		<tr>
			<td><input type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Enter your search keywords" /></td>
			<td><input type="submit" name="" value="Search" /></td>
		</tr>
	</table>
</form>

<?php

require_once "config.php";

// get the search terms from the url
if (isset($_GET['k']) && $_GET['k'] != '') {

	$k = trim($_GET['k']);
	// create the base variables for building the search query
	$search_string = "SELECT * FROM users WHERE ";
	$display_words = "";

	// format each of search keywords into the db query to be run
	$keywords = explode(' ', $k);

	foreach ($keywords as $word) {
		$search_string .= "keywords LIKE '%" . $word . "%' OR ";
		$display_words .= $word . " ";
	}
	$search_string = substr($search_string, 0, strlen($search_string) - 3);

	// query the database and count rows
	$query = mysqli_query($conn, $search_string);
	$result_count = mysqli_num_rows($query);

	// check to see if any results are found
	if ($result_count != 0) {
		// display search result count to user
		echo '<br><div class="center"><b><u>' . $result_count . '</u></b> results found.</div>';
		echo 'Your search for <i>' . $display_words . '</i><hr /><br>';

		echo '<table>';

		// display all the search results to the user
		while ($row = mysqli_fetch_assoc($query)) {
			echo '<tr>
					<td>' . $row['username'] . '</td>
					<td>' . $row['band_name'] . '</td>
					<td>' . $row['show_venue'] . '</td>
					<td>' . $row['show_date'] . '</td>
					<td>' . $row['recording_format'] . '</td>
					<td>' . $row['show_length'] . '</td>
					<td>' . $row['user_rating'] . '</td>
					<td>' . $row['notes'] . '</td>
					</tr>';
		}
		echo '</table>';
	}
	 else
	echo 'No results found. Please search something else.';
}
// $display_words = "";

//$display_words = substr($display_words, 0, strlen($display_words) - 1);

// connect to the database
//$conn = new mysqli($servername, $MySQLusername, $password, $db);

// run the query in the db and search through each of the records returned
//
//

// display a message to the user to display the keywords
//echo '<div class="right"><b><u>' . number_format($result_count) . '</u></b> results found</div>';
//echo 'Your search for <i>"' . $display_words . '"</i><hr />';

// check if the search query returned any results
/* if ($result_count > 0) {

	// display the header for the display table
	echo '<table class="search">';

	// loop though each of the results from the database and display them to the user
	while ($row = mysqli_fetch_assoc($query)) {
		echo '<tr>
			<td><h3><a href="' . $row['url'] . '">' . $row['title'] . '</a></h3></td>
		</tr>
		<tr>
			<td>' . $row['blurb'] . '</td>
		</tr>
		<tr>
			<td><i>' . $row['url'] . '</i></td>
		</tr>';
	}

	// end the display of the table
	echo '</table>';
} else
	echo 'There were no results for your search. Try searching for something else.';
*/
?>