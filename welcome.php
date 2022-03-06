    <!-- This is the Welcome page after you login, provides password change or logout. -->

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

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                font: 14px sans-serif;
                text-align: center;
                color: white;
            }
        </style>
    </head>

    <body>
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to LiveBase.</h1>
        <p>
            <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </p>
    </body>

    </html>

    <!--- includes contents of file footer.html --->
    <?php include "footer.html" ?>