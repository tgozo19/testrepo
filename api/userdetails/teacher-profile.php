<?php
    header('Content-Type: application/json');
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        include("../db.php");
        $id = $_COOKIE['loggedinatDeskApp'];
        $teacherRef = $_GET['q'];
        $getTeacherDetails = $con->prepare("select * from teachers where teacherFrom='$id' and teacherRef='$teacherRef'");
        $getTeacherDetails->setFetchMode(PDO:: FETCH_ASSOC);
        $getTeacherDetails->execute();
        if ($getTeacherDetails->rowCount() == 1) {
            while ($row = $getTeacherDetails->fetch()) {
                $studentInfo = array(
                    'id' => $row['id'],
                    "teacherRef" => $row['teacherRef'],
                    "idNumber" => $row['idNumber'],
                    'name' => $row['name'],
                    "address" => $row['address'],
                    "phoneNumber" => $row['phoneNumber'],
                    "age" => $row['age'],
                    "title" => $row['title'],
                    "class" => $row['class'],
                    "picture" => "src/images/".$row['picture']."",
                );
            }
            $data = array($studentInfo);
            echo json_encode($data, true);
        }
    }
?>