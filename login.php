<!--- includes contents of file header.html --->
<?php include "header.html" ?>

<div class="body d-flex flex-column">
<br><br><br>
<!-- Icon Image -->
    <div class="d-flex justify-content-center">
        <img src="LiveBaseLogo-sm.png" id="icon" alt="LiveBase Icon">
    </div>

  <!-- Login Form -->
    <div class="d-flex justify-content-center center">
      <form action="login.php" method="post">
        <input type="text" id="login" name="login" placeholder="login">
        <input type="password" id="password" name="password" placeholder="password">
        <input type="submit" value="submit"><br>
        <p>Register here.&nbsp&nbsp<a href="reg.php">Create Account</a></p>
      </form>
    </div>
</div>
  
<!--- includes contents of file footer.html --->
  <?php include "footer.html" ?>