<?php
    header('Content-Type: application/json');
    include("logging-checks.php");
    function proccessLogin()
    {
        include("../db.php");
        $detailsArray = [];
        array_push($detailsArray, $_POST['method'], $_POST['providedValue'], $_POST['password']);
        list($method, $providedValue, $pass) = $detailsArray;
        $salt ="ER";
        $password = md5($salt . $pass);
        $checkUser = $con->prepare("select * from schools where (userName='$providedValue' or email='$providedValue') and password='$password'");
        $checkUser->setFetchMode(PDO:: FETCH_ASSOC);
        $checkUser->execute();
        if ($checkUser->rowCount() == 1)
        {
            while ($row = $checkUser->fetch()) {
                $id = $row['id'];
            }
            if ($method == "web")
            {
                define("EXPIRE_AFTER", 24 * 540000); #expire time for cookie
                $str = $id;
                setcookie("loggedinatDeskApp", $str, (time() + EXPIRE_AFTER), "/");
                $response = array('result' => "Logged");
                echo json_encode($response, true);
            }
            elseif ($method == "mobile")
            {
                $response = array('result' => "Logged", 'id' => $id);
                echo json_encode($response, true);
            }
        }
        else
        {
            $checkIfTeacher = $con->prepare("select * from schools where email='$providedValue' and password='$password'");
            $checkIfTeacher->setFetchMode(pdo:: FETCH_ASSOC);
            $checkIfTeacher->execute();
            if ($checkIfTeacher->rowCount() == 1) {
                while ($row = $checkIfTeacher->fetch()) {
                    $id = $row['id'];
                }
                if ($method == "web")
                {
                    define("EXPIRE_AFTER", 24 * 540000); #expire time for cookie
                    $str = $id;
                    setcookie("DeskAppTeacher", $str, (time() + EXPIRE_AFTER), "/");
                    $response = array('result' => "Logged");
                    echo json_encode($response, true);
                }
                elseif ($method == "mobile")
                {
                    $response = array('result' => "Logged", 'id' => $id);
                    echo json_encode($response, true);
                }
            }else {
                $response = array('result' => "Wrong Username or password");
                echo json_encode($response, true);
            }
        }
    }
    // $response = array('result' => "Wrong Username or password");
    // echo json_encode($response, true);
?>