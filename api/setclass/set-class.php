<?php
    header('Content-Type: application/json');
    include("../db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $levelName = $_POST['levelName'];
        $className = $_POST['className'];
        $classTeacher = $_POST['classTeacher'];
        $classRef = md5($levelName . time());
        $img = $_FILES['img'];
        if(!empty($img)){
            $fileName = explode(".", $_FILES['img']['name']);
            $newname = $fileName[0] . time() . rand() . '.jpg';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../src/images/classes/'.$newname);
            $picture = (file_exists('../../src/images/classes/'.$newname)) ? $newname : "";
        }else {
            $picture = "";
        }
        $insertClass = $con->prepare("insert into classes(classRef,classFromSchool,classFromLevel,className,picture,classTeacher) 
        values('$classRef', '$school', '$levelName', '$className', '$picture', '$classTeacher')");
        if($insertClass->execute())
        {
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