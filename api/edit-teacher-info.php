<?php
    header('Content-Type: application/json');
    include("db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $teacherRef = $_POST['teacherRef'];
        $fullName = $_POST['fullName'];
        $age = $_POST['age'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $idNumber = $_POST['idNumber'];
        $title = $_POST['title'];
        $class = $_POST['class'];
        $updateTeacher = $con->prepare("update teachers set  idNumber='$idNumber', name='$fullName', age='$age', phoneNumber='$phoneNumber', address='$address', title='$title', class='$class' where teacherRef='$teacherRef'");
        if($updateTeacher->execute())
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