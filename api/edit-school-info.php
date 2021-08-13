<?php
    header('Content-Type: application/json');
    include("db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $nameOfSchool = $_POST['nameOfSchool'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNumber'];
        $userName = $_POST['userName'];
        $address = $_POST['address'];
        $headName = $_POST['headName'];
        $gender = $_POST['gender'];
        $updateSchoolInfo = $con->prepare("update schools set nameOfSchool='$nameOfSchool', email='$email', phone='$phone', userName='$userName',address='$address',headName='$headName',gender='$gender' where id='$school'");
        if($updateSchoolInfo->execute())
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
?>