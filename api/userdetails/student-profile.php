<?php
    header('Content-Type: application/json');

    if (isset($_GET['q'])) {
        $cardNumber = $_GET['q'];
        if (isset($_COOKIE['loggedinatDeskApp'])) {
            $userId = $_COOKIE['loggedinatDeskApp'];
            processRequest($userId, $cardNumber);
        } else {
            if (isset($_GET['userId'])) {
                $userId = $_GET['userId'];
                processRequest($userId, $cardNumber);
            } else {
                $result = array('result' => 'please pass userId');
                echo json_encode($result, true);
            }
        }
    } else {
        $result = array('result' => 'please pass q (which should be the cardNumber)');
        echo json_encode($result, true);
    }

    function processRequest($school, $cardNumber)
    {
        include("../db.php");
        $getStudentDetails = $con->prepare("select * from students where studentFromSchool='$school' and cardNumber='$cardNumber'");
        $getStudentDetails->setFetchMode(PDO:: FETCH_ASSOC);
        $getStudentDetails->execute();
        if ($getStudentDetails->rowCount() == 1) {
            while ($row = $getStudentDetails->fetch()) {
                $studentInfo = array(
                    'id' => $row['id'],
                    'name' => $row['nameOfStudent'],
                    "idNumber" => $row['idNumber'],
                    "email" => $row['email'],
                    "phoneNumber" => $row['phoneNumber'],
                    "age" => $row['age'],
                    "gender" => $row['gender'],
                    "address" => $row['address'],
                    "picture" => "src/images/".$row['picture']."",
                    "nextOfKeen" => $row['nextOfKeen'],
                    "nextOfKeenNumber" => $row['nextOfKeenNumber'],
                    "relationToNextOfKeen" => $row['relationToNextOfKeen']
                );
            }
            $data = array($studentInfo);
            echo json_encode($data, true);
        }
    }
?>