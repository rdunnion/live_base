    <!--- includes contents of file header.html --->
    <?php include "header.html" ?>

    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) === TRUE) {
      header("location: login.php");
      exit;
    }
    ?>

    <!-- Enter Show Form -->
    <div class="wrapper left form-group">

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

      <body>
        <div class="wrapper">
          <h2>Enter Show</h2>
          <p>Please enter the show information.</p>

          <form action="enterConnect.php" method="post"><br>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"><br>
            <input type="text" class="form-control" id="band_name" name="band_name" placeholder="Band Name" size="50"><br>
            <input type="text" class="form-control" id="show_venue" name="show_venue" placeholder="Show Venue"><br>
            <input type="text" class="form-control" id="show_date" name="show_date" placeholder="Show Date YYYY-MM-DD"><br>
            <input type="text" class="form-control" id="recording_format" name="recording_format" placeholder="Recording Format"><br>
            <input type="text" class="form-control" id="show_length" name="show_length" placeholder="Show Length min:sec"><br>
            <input type="text" class="form-control" id="user_rating" name="user_rating" placeholder="User 5-star Rating *****"><br>
            <input type="text" class="form-control" id="notes" name="notes" placeholder="Notes"><br><br>
            <input type="submit" class="form-control" value="submit">
          </form>
      </body>
    </div>
    </div>
    <!--- includes contents of file footer.html --->
    <?php include "footer.html" ?>