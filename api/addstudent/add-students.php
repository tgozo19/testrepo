<?php
    header('Content-Type: application/json');
    include("../db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) { 
        $school = $_COOKIE['loggedinatDeskApp'];
        $cardNumber = $_POST['cardNumber'];
        $idNumber = $_POST['idNumber'];
        $nameOfStudent = $_POST['nameOfStudent'];
        $email = '';
        $phoneNumber = $_POST['phoneNumber'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $class = $_POST['className'];
        $address = '';
        $nextOfKeen = '';
        $nextOfKeenNumber = '';
        $RelationshipToNextOfKeen = '';
        $getLevel = $con->prepare("select * from classes where classRef='$class'");
        $getLevel->setFetchMode(PDO:: FETCH_ASSOC);
        $getLevel->execute();
        while ($row = $getLevel->fetch()) {
            $level = $row['classFromLevel'];
        }
        $img = $_FILES['img'];
        if(!empty($img)){
            $fileName = explode(".", $_FILES['img']['name']);
            $newname = $fileName[0] . time() . rand() . '.jpg';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../src/images/'.$newname);
            $picture = (file_exists('../../src/images/'.$newname)) ? $newname : "";
        }else {
            $picture = "";
        }
        $insertStudent = $con->prepare("insert into students(cardNumber,studentFromSchool,studentFromLevel,studentFromClass,nameOfStudent,picture,email,phoneNumber,age,gender,idNumber,address,nextOfKeen,nextOfKeenNumber,relationToNextOfKeen)
        values('$cardNumber', '$school', '$level', '$class', '$nameOfStudent', '$picture', '', '$phoneNumber', '$age', '$gender', '$idNumber', '', '', '', '')");
        if($insertStudent->execute())
        {
            $getRandomStudent = $con->prepare("select * from students where studentFromClass='$class' and cardNumber!='$cardNumber' LIMIT 1");
            $getRandomStudent->setFetchMode(PDO:: FETCH_ASSOC);
            $getRandomStudent->execute();
            if($getRandomStudent->rowCount() != 0){
                while ($row = $getRandomStudent->fetch()) {
                    $rcardNumber = $row['cardNumber'];
                }
                $getLogsForSelectedStudent = $con->prepare("select * from logs where logForStudent='$rcardNumber'");
                $getLogsForSelectedStudent->setFetchMode(PDO:: FETCH_ASSOC);
                $getLogsForSelectedStudent->execute();
                while ($row = $getLogsForSelectedStudent->fetch()) {
                    $date = $row['logForDate'];
                    $insertLogs = $con->prepare("insert into logs(logForSchool,logForClass,logForStudent,logForDate,status,arrivedAt,leftAt) values('$school', '$class', '$cardNumber', '$date', '0', '-', '-')");
                    $insertLogs->execute();
                }
            }
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