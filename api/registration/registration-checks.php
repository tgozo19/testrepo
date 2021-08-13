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
        if (!isset($_POST['email']) )
        {
            array_push($GLOBALS['errorsArray'], "email not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateUserName();
        }
    }

    function validateUserName()
    {
        if (!isset($_POST['userName']))
        {
            array_push($GLOBALS['errorsArray'], "userName not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validatePass1();
        }
    }

    function validatePass1()
    {
        if (!isset($_POST['pass1']))
        {
            array_push($GLOBALS['errorsArray'], "pass1 not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validatePass2();
        }
    }

    function validatePass2()
    {
        if (!isset($_POST['pass2']))
        {
            array_push($GLOBALS['errorsArray'], "pass2 not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateFullName();
        }
    }

    function validateFullName()
    {
        if (!isset($_POST['fullName']))
        {
            array_push($GLOBALS['errorsArray'], "fullName not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateGender();
        }
    }

    function validateGender()
    {
        if (!isset($_POST['title']))
        {
            array_push($GLOBALS['errorsArray'], "title not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateHeadEmail();
        }
    }

    function validateHeadEmail()
    {
        if (!isset($_POST['headEmail']))
        {
            array_push($GLOBALS['errorsArray'], "headEmail not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validatePhoneNumber();
        }
    }

    function validatePhoneNumber()
    {
        if (!isset($_POST['phoneNumber']))
        {
            array_push($GLOBALS['errorsArray'], "phoneNumber not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateSchoolName();
        }
    }

    function validateSchoolName()
    {
        if (!isset($_POST['schoolName']))
        {
            array_push($GLOBALS['errorsArray'], "schoolName not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateLevel();
        }
    }

    function validateLevel()
    {
        if (!isset($_POST['level']))
        {
            array_push($GLOBALS['errorsArray'], "level not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            validateAddress();
        }
    }

    function validateAddress()
    {
        if (!isset($_POST['address']))
        {
            array_push($GLOBALS['errorsArray'], "address not passed");
            returnError($GLOBALS['errorsArray']);
        }
        else
        {
            proccessRegistration();
        }
    }

    validateMethod();

    function returnError($errorsArray)
    {
        $error = array('result' => $errorsArray[0]);
        echo json_encode($error, true);
    }
?>