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
                processRequest($userId, $class);
            } else {
                $result = array('result' => 'please pass userId');
                echo json_encode($result, true);
            }
        }
    } else {
        $result = array('result' => 'please pass q (which should be the classRef)');
        echo json_encode($result, true);
    }

    function processRequest($school, $class){
        include("../db.php");
        $class = $_GET['q'];
        $getDate = $con->prepare("select * from logs where logForSchool='$school' and logForClass='$class' ORDER BY logForDate DESC");
        $getDate->setFetchMode(PDO:: FETCH_ASSOC);
        $getDate->execute();
        $done = [];
        $registeredData = [];
        if($getDate->rowCount() != 0){
            while ($row = $getDate->fetch()) {
                $date = $row['logForDate'];
                $pos = in_array($date, $done);
                if ($pos != 1) {
                    $students = [];
                    $getLogsForDate = $con->prepare("select * from logs where logForDate='$date'");
                    $getLogsForDate->setFetchMode(PDO:: FETCH_ASSOC);
                    $getLogsForDate->execute();
                    while ($rowLog = $getLogsForDate->fetch()) {
                        $cardNumber = $rowLog['logForStudent'];
                        $getName = $con->prepare("select * from students where cardNumber='$cardNumber'");
                        $getName->setFetchMode(PDO:: FETCH_ASSOC);
                        $getName->execute();
                        while ($rowName = $getName->fetch()) {
                            $name = $rowName['nameOfStudent'];
                        }
                        $student = [
                            "name" => $name,
                            "class" => "1 South",
                            "status" => ($rowLog['status']) == 0 ? "Absent" : "Present",
                            "arrivedAt" => $rowLog['arrivedAt'],
                            "leftAt" => $rowLog['leftAt'],
                        ];
                        array_push($students, $student);
                    }
                    $log = array('date' => $date, 'students' => $students);
                    array_push($registeredData, $log);
                }
                array_push($done, $date);
            }
            $result = array('result' => 'success', 'registerData' => $registeredData);
            echo json_encode($result, true);
        }else {
            $result = array('result' => 'no register');
            echo json_encode($result, true);
        }
    }
?>
