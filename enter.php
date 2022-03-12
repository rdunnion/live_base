    <!--- includes contents of file header.html --->
    <?php include "header.html" ?>

    <!-- Restricts access untill user is logged in -->
    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) === TRUE) {
      header("location: login.php");
      exit;
    }
    ?>

    <!-- Enter Show HTML Form -->

      <div class="wrapper box_enter center">
        <h2>Enter Show</h2>
        <p>Please enter the show information.</p>

        <form action="enterConnect.php" method="post"><br>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username"><br>
          <input type="text" class="form-control" id="band_name" name="band_name" placeholder="Band Name"><br>
          <input type="text" class="form-control" id="show_venue" name="show_venue" placeholder="Show Venue"><br>
          <input type="text" class="form-control" id="show_date" name="show_date" placeholder="Show Date YYYY-MM-DD"><br>
          <input type="text" class="form-control" id="recording_format" name="recording_format" placeholder="Recording Format"><br>
          <input type="text" class="form-control" id="show_length" name="show_length" placeholder="Show Length min:sec"><br>
          <input type="text" class="form-control" id="user_rating" name="user_rating" placeholder="User 5-star Rating *****"><br>
          <input type="text" class="form-control" id="notes" name="notes" placeholder="Notes"><br><br>
          <input type="submit" class="form-control btn btn-primary ml-2" value="submit">
        </form>

    </div>

    <!--- includes contents of file footer.html --->
    <?php include "footer.html" ?>