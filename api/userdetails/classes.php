<?php
    header('Content-Type: application/json');
    if (isset($_GET['q'])) {
        $level = $_GET['q'];
        if (isset($_COOKIE['loggedinatDeskApp'])) {
            $userId = $_COOKIE['loggedinatDeskApp'];
            processRequest($userId, $level);
        } else {
            if (isset($_GET['userId'])) {
                $userId = $_GET['userId'];
                processRequest($userId,$level);
            } else {
                $result = array('result' => 'please pass userId');
                echo json_encode($result, true);
            }
        }
    } else {
        $result = array('result' => 'please pass q (which should be the levelRef)');
        echo json_encode($result, true);
    }

    function levelName($level){
        include("../db.php");
        $getLevel = $con->prepare("select * from levels where levelRef='$level'");
        $getLevel->setFetchMode(PDO:: FETCH_ASSOC);
        $getLevel->execute();
        while ($row = $getLevel->fetch()) {
            $levelName = $row['levelName'];
        }
        return $levelName;
    }

    function processRequest($userId, $level){
        include("../db.php");
        $levelName = levelName($level);
        $getUserClasses = $con->prepare("select * from classes where classFromSchool='$userId' and classFromLevel='$level'");
        $getUserClasses->setFetchMode(PDO:: FETCH_ASSOC);
        $getUserClasses->execute();
        if ($getUserClasses->rowCount() != 0) {
            $classes = [];
            while ($row = $getUserClasses->fetch()) {
                $id = $row['id'];
                $classRef = $row['classRef'];
                $className = $row['className'];
                $picture = $row['picture'];
                $classTeacher = $row['classTeacher'];
                $class = array('id' => $id, 'ref' => $classRef, 'name' => $className, 'classTeacher' => $classTeacher, 'picture' => "src/images/classes/$picture");
                array_push($classes, $class);
            }
            $data = array('result' => 'success', 'levelName' => $levelName, 'classes' => $classes);
        }else {
            $data = array('result' => 'no classes found for this level', 'levelName' => levelName($level));
        }
        echo json_encode($data, true);
    }
?>