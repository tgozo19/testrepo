<?php
    header('Content-Type: application/json');
    include("db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $fullName = $_POST['fullName'];
        $age = $_POST['age'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $idNumber = $_POST['idNumber'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $nextOfKeen = $_POST['nextOfKeen'];
        $nextOfKeenNumber = $_POST['nextOfKeenNumber'];
        $relationshipToNextOfKeen = $_POST['relationshipToNextOfKeen'];
        $updateStudent = $con->prepare("update students set nameOfStudent='$fullName',email='$email',phoneNumber='$phoneNumber',age='$age',gender='$gender',idNumber='$idNumber',address='$address',nextOfKeen='$nextOfKeen',nextOfKeenNumber='$nextOfKeenNumber',RelationToNextOfKeen='$relationshipToNextOfKeen' where studentFromSchool='$school'");
        if($updateStudent->execute())
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