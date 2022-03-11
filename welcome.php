    <!-- This is the Welcome page after you login, provides password change or logout. -->

    <!-- includes contents of file header.html -->
    <?php include "header.html" ?>

    <!-- Restricts access until user is logged in -->
    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) === TRUE) {
        header("location: login.php");
        exit;
    }
    ?>
    <!-- Welome page HTML section -->

    <div class="left padding-left">
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to LiveBase.</h1>
        <p>
            Please use the icons above to navigate the website.
            <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </p>
    </div>


    <!-- includes contents of file footer.html -->
    <?php include "footer.html" ?>