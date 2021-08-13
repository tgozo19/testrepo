<?php
    header('Content-Type: application/json');
    define("EXPIRE_AFTER", 24 * 0);
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        setcookie("loggedinatDeskApp", "", (time() + EXPIRE_AFTER), "/");
        echo json_encode(array('result' => 'done'), true);
    }else {
        echo json_encode(array('result' => 'done'), true);
    }
?>