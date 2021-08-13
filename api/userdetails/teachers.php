<?php
    header('Content-Type: application/json');
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        include("../db.php");
        $school = $_COOKIE['loggedinatDeskApp'];
        $getTeachers = $con->prepare("select * from teachers where teacherFrom='$school'");
        $getTeachers->setFetchMode(PDO:: FETCH_ASSOC);
        $getTeachers->execute();
        if ($getTeachers->rowCount() != 0) {
            $teachers = [];
            while ($row = $getTeachers->fetch()) {
                $id =$row['id'];
                $teacherFrom =$row['teacherFrom'];
                $teacherRef = $row['teacherRef'];
                $name = $row['name'];
                $picture = $row['picture'];
                $teacher = array('name' => $name, 'ref' => $teacherRef, 'picture' => "src/images/$picture");
                array_push($teachers, $teacher);
            }
            $results = array('result' => 'success', 'teachers' => $teachers);
            echo json_encode($results, true);
        }else{
            $results = array('result' => 'no teachers');
            echo json_encode($results, true);
        }
    }
?>