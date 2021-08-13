<?php
    header('Content-Type: application/json');
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        include("../db.php");
        $school = $_COOKIE['loggedinatDeskApp'];
        $getClasses = $con->prepare("select * from classes where classFromSchool='$school'");
        $getClasses->setFetchMode(PDO:: FETCH_ASSOC);
        $getClasses->execute();
        if ($getClasses->rowCount() != 0) {
            $classes = [];
            while ($row = $getClasses->fetch()) {
                $id =$row['id'];
                $classRef = $row['classRef'];
                $className = $row['className'];
                $picture = $row['picture'];
                $classTeacher = $row['classTeacher'];
                $class = array('ref' => $classRef, 'name' => $className, 'picture' => "src/images/$picture", 'classTeacher' => $classTeacher);
                array_push($classes, $class);
            }
            echo json_encode($classes, true);
        }
    }
?>