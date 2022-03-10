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

<!-- Search Bar -->
<!--<div class="wrapper">
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">

        <head>
          <meta charset="UTF-8">
          <title>Login</title>
          <style>
            body {
              font: 14px sans-serif;
              color: white;
            }

            .wrapper {
              width: 360px;
              padding: 20px;
            }
          </style>
        </head>

        <div class="wrapper">
          <h2>Search Shows</h2>
          <p>Please enter a item to search for.</p>

          <div class="d-flex justify-content-center text-align: center">
            <form action="search.php" method="post">
              <input type="search" id="search" name="search" placeholder="Search" size="50"><br><br>
              <input type="submit" value="submit">
            </form>
          </div>
        </div> -->

<form action="" method="GET" name="">
  <table>
    <tr>
      <td><input type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Enter your search keywords" /></td>
      <td><input type="submit" name="" value="Search" /></td>
    </tr>
  </table>
</form>

<?php
// get the search terms from the url
$k = isset($_GET['k']) ? $_GET['k'] : '');

// create the base variables for building the search query
$search_string = "SELECT * FROM users WHERE ";
$display_words = "";

// format each of search keywords into the db query to be run
$keywords = explode(' ', $k);
foreach ($keywords as $word) {
  $search_string .= "id LIKE '%" . $word . "%' OR ";
  $display_words .= $word . ' ';
}
$search_string = substr($search_string, 0, strlen($search_string) - 4);
$display_words = substr($display_words, 0, strlen($display_words) - 1);

// connect to the database
$conn = mysqli_connect("localhost", "PHP", "Password01", "live_base");

// run the query in the db and search through each of the records returned
$query = mysqli_query($conn, $search_string);
$result_count = mysqli_num_rows($query);

// display a message to the user to display the keywords
echo '<div class="right"><b><u>' . number_format($result_count) . '</u></b> results found</div>';
echo 'Your search for <i>"' . $display_words . '"</i><hr />';

// check if the search query returned any results
if ($result_count > 0) {

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

?>

<!--- includes contents of file footer.html --->
<?php include "footer.html" ?>