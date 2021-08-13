<?php
    header('Content-Type: application/json');
    include("../db.php");
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $levelName = $_POST['levelName'];
        $levelRef = md5($levelName . time());
        $img = $_FILES['img'];
        if(!empty($img)){
            $fileName = explode(".", $_FILES['img']['name']);
            $newname = $fileName[0] . time() . rand() . '.jpg';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../src/images/'.$newname);
            $picture = (file_exists('../../src/images/'.$newname)) ? $newname : "nothing";
        }else {
            $picture = "";
        }
        $insertLevel = $con->prepare("insert into levels(levelFrom,levelRef,levelName,picture) values('$school', '$levelRef', '$levelName', '$picture')");
        if($insertLevel->execute())
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