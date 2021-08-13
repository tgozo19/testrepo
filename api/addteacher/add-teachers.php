<?php
    header('Content-Type: application/json');
    include("../db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $teacherRef = md5( rand() . time() . rand() );
        $cardNumber = $_POST['cardNumber'];
        $idNumber = $_POST['idNumber'];
        $nameOfTeacher = $_POST['nameOfTeacher'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        $age = $_POST['age'];
        $title = $_POST['title'];
        $className = "";
        $email = $_POST['email'];
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $password = substr(str_shuffle($permitted_chars), 0, 10);
        $img = $_FILES['img'];
        if(!empty($img)){
            $fileName = explode(".", $_FILES['img']['name']);
            $newname = $fileName[0] . time() . rand() . '.jpg';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../src/images/'.$newname);
            $picture = (file_exists('../../src/images/'.$newname)) ? $newname : "";
        }else {
            $picture = "";
        }
        $insertTeacher = $con->prepare("insert into teachers(teacherFrom,teacherRef,idNumber,name,address,phoneNumber,age,title,class,picture,email,password) 
        values('$school', '$teacherRef', '$idNumber', '$nameOfTeacher', '$address', '$phoneNumber', '$age', '$title', '', '$picture', '$email', '$password')");
        if($insertTeacher->execute())
        {
            //mail($email, "Account Confirmation", "Hi $nameOfTeacher. You have been successfully registered as an instructor on CAS. Your Pin is $password. We advise you change this from your account settings");
            $result = array('result' => 'success');
            echo json_encode($result, true);
        }
        else
        {
            $result = array('result' => 'failed');
            echo json_encode($result, true);
        }
    }
?>