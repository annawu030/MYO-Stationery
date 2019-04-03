<?php
    session_start();

    if (count($_SESSION) > 0) {
        foreach ($_SESSION as $key => $value) {
            unset($SESSION[$key]);
        }
    }

    session_destroy();

    header("Location: index.php");
?>
