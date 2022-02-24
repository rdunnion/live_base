    <!--- includes contents of file header.html --->
    <?php include "header.html" ?>

<form action="reg.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <button type="submit" class="registerbtn">Register</button>

    <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
</div>
</form>

    <!--- includes contents of file footer.html --->
    <?php include "footer.html" ?>
