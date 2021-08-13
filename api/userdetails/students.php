<?php
    header('Content-Type: application/json');
    if (isset($_GET['q'])) {
        $class = $_GET['q'];
        if (isset($_COOKIE['loggedinatDeskApp'])) {
            $userId = $_COOKIE['loggedinatDeskApp'];
            processRequest($userId, $class);
        } else {
            if (isset($_GET['userId'])) {
                $userId = $_GET['userId'];
                processRequest($userId,$class);
            } else {
                $result = array('result' => 'please pass userId');
                echo json_encode($result, true);
            }
        }
    } else {
        $result = array('result' => 'please pass q (which should be the classRef)');
        echo json_encode($result, true);
    }

    function getClassName($class){
        include("../db.php");
        $getClassName = $con->prepare("select * from classes where classRef='$class'");
        $getClassName->setFetchMode(PDO:: FETCH_ASSOC);
        $getClassName->execute();
        if ($getClassName->rowCount() == 1) {
            while ($row = $getClassName->fetch()) {
                $className = $row['className'];
            }
        } else {
            $className = "";
        }
        return $className;
    }

    function getLevelName($class){
        include("../db.php");
        $getClassName = $con->prepare("select * from classes where classRef='$class'");
        $getClassName->setFetchMode(PDO:: FETCH_ASSOC);
        $getClassName->execute();
        if ($getClassName->rowCount() == 1) {
            while ($row = $getClassName->fetch()) {
                $levelRef = $row['classFromLevel'];
            }
            $getLevelName = $con->prepare("select * from levels where levelRef='$levelRef'");
            $getLevelName->setFetchMode(PDO:: FETCH_ASSOC);
            $getLevelName->execute();
            if ($getLevelName->rowCount() == 1) {
                while ($rowLevel = $getLevelName->fetch()) {
                    $levelName = $rowLevel['levelName'];
                }
            }
        }
        return $levelName == '' ? '' : $levelName;
    }

    function getLevelRef($class){
        include("../db.php");
        $getClassName = $con->prepare("select * from classes where classRef='$class'");
        $getClassName->setFetchMode(PDO:: FETCH_ASSOC);
        $getClassName->execute();
        if ($getClassName->rowCount() == 1) {
            while ($row = $getClassName->fetch()) {
                $levelRef = $row['classFromLevel'];
            }
        }
        return $levelRef == '' ? '' : $levelRef;
    }
    
    function processRequest($userId, $class)
    {
        include("../db.php");
        $getclassStudents = $con->prepare("select * from students where studentFromSchool='$userId' and studentFromClass='$class'");
        $getclassStudents->setFetchMode(PDO:: FETCH_ASSOC);
        $getclassStudents->execute();
        if ($getclassStudents->rowCount() != 0) {
            $levels = [];
            while ($row = $getclassStudents->fetch()) {
                $id = $row['id'];
                $ref = $row['cardNumber'];
                $nameOfStudent = $row['nameOfStudent'];
                $picture = $row['picture'];
                $level = array('id' => $id, 'ref' => $ref, 'name' => $nameOfStudent, 'picture' => "src/images/students/$picture");
                array_push($levels, $level);
            }
            $data = array('result' => 'success', 'className' => getClassName($class), 'levelName' => getLevelName($class), 'levelRef' => getLevelRef($class), 'students' => $levels);
            echo json_encode($data, true);
        }else{
            $data = array('result' => 'no students', 'className' => getClassName($class), 'levelName' => getLevelName($class), 'levelRef' => getLevelRef($class),);
            echo json_encode($data, true);
        }
    }
?>