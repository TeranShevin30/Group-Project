<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();
    session_destroy();
    header("Location: login.php");
?>