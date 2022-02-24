<!--- includes contents of file header.html --->
<?php include "header.html" ?>

<?php
$username = $_POST['username'];
$band_name = $_POST['band_name'];
$show_venue = $_POST['show_venue'];
$show_date = $_POST['show_date'];
$recording_format = $_POST['recording_format'];
$show_length = $_POST['show_length'];
$user_rating = $_POST['user_rating'];
$notes = $_POST['notes'];

$servername = "localhost";
$MySQLusername = "PHP";
$password = "Password01";
$db = "live_base";

$conn = new mysqli($servername, $MySQLusername, $password, $db);

if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$sql = "insert into users(username,band_name,show_venue,show_date,recording_format,
show_length,user_rating,notes)
    values('$username','$band_name','$show_venue','$show_date','$recording_format',
    '$show_length','$user_rating','$notes')";

if ($conn->query($sql) === TRUE) {
    echo '<div class=center><br><br><br>
    <div class="container signin">
    <br>
    <h1>Database updated!</h1>
    </div></div>';
}
    else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
$conn->close();
?>

<!--- includes contents of file footer.html --->
<?php include "footer.html" ?>
