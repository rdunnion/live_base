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
<div class="wrapper">
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
        </div>

        <!--- includes contents of file footer.html --->
        <?php include "footer.html" ?>