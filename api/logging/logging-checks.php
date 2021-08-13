<?php
    $errorsArray = [];
    function validateMethod()
    {
        if (!isset($_POST['method']) )
        {
            array_push($GLOBALS['errorsArray'], "method not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateEmail();
        }
    }

    function validateEmail()
    {
        if (!isset($_POST['providedValue']) )
        {
            array_push($GLOBALS['errorsArray'], "providedValue not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validatePassword();
        }
    }

    function validatePassword()
    {
        if (!isset($_POST['password']) )
        {
            array_push($GLOBALS['errorsArray'], "password not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            proccessLogin();
        }
    }

    validateMethod();

    function returnError($errorsArray)
    {
        $error = array('result' => $errorsArray[0]);
        echo json_encode($error, true);
    }
?>