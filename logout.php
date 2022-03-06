    <!-- Restricts access until user is logged in -->
    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) === TRUE) {
        header("location: login.php");
        exit;
    }

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();

    // Redirect to login page
    header("location: login.php");
    exit;
    ?>