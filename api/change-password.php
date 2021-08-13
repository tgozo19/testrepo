<?php
    header('Content-Type: application/json');
    include("db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $pass1 = trim($_POST['pass1']);
        $pass2 = trim($_POST['pass2']);
        $pass3 = trim($_POST['pass3']);
        if ($pass2 != $pass3) {
            $result = array('result' => 'passwords do not match');
            echo json_encode($result, true);
        } else {
            $salt = "ER";
            $password = md5($salt . $pass1);
            $checkCurrentPassword = $con->prepare("select * from schools where id='$school' and password='$password'");
            $checkCurrentPassword->setFetchMode(PDO:: FETCH_ASSOC);
            $checkCurrentPassword->execute();
            if ($checkCurrentPassword->rowCount() == 0) {
                $result = array('result' => 'wrong current password');
                echo json_encode($result, true);
            } else {
                $salt = "ER";
                $password = md5($salt . $pass3);
                $updatePassword = $con->prepare("update schools set password='$password' where id='$school'");
                if($updatePassword->execute())
                {
                    $result = array('result' => 'success');
                    echo json_encode($result, true);
                }
                else
                {
                    $result = array('result' => 'fail');
                    echo json_encode($result, true);
                }
            }
            
        }
    }
?>