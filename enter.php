    <!--- includes contents of file header.html --->
    <?php include "header.html" ?>

    <div class="body d-flex flex-column">
        <br><br><br>

  <!-- Enter Show Form -->
    <div class="center">
        <form action="phpForm.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" size="50"><br>
            <input type="text" id="band_name" name="band_name" placeholder="Band Name"><br>
            <input type="text" id="show_venue" name="show_venue" placeholder="Show Venue"><br>
            <input type="text" id="show_date" name="show_date" placeholder="Show Date YYYY-MM-DD"><br>
            <input type="text" id="recording_format" name="recording_format" placeholder="Recording Format"><br>
            <input type="text" id="show_length" name="show_length" placeholder="Show Length min:sec"><br>
            <input type="text" id="user_rating" name="user_rating" placeholder="User 5-star Rating *****"><br>
            <input type="text" id="notes" name="notes" placeholder="Notes"><br><br>
            <input type="submit" value="submit">
      </form>

    </div>
</div>
    <!--- includes contents of file footer.html --->
    <?php include "footer.html" ?>
