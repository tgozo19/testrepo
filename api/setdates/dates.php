<?php
    header('Content-Type: application/json');
    function months($month){
        switch ($month){
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
            default:
                return "";
                break;
        }
    }
    include("../db.php");
    $term = $_POST['term'];
    $year = $_POST['year'];
    $school = $_COOKIE['loggedinatDeskApp'];
    $insertTerm = $con->prepare("insert into terms(termFor,name,year,begins,ends) values('$school', '$term', '$year', '".$_POST['begins']."', '".$_POST['ends']."')");
    $insertTerm->execute();
    $begin = explode(" ", $_POST['begins']);
    $a = ($begin[0][0] == "0" ? $begin[0][1] : $begin[0]);
    $date = $begin[2] . " ". $begin[1] . " " . $a;
    $finish = explode(" ", $_POST['ends']);
    $ends = $finish[2] . " " . $finish[1] . " ". $finish[0];
    $firstDate = new DateTime($_POST['begins']);
    $endDate = new DateTime($_POST['ends']);
    $fullDate = $date;
    while ($firstDate <= $endDate) {
        $interval = new DateInterval('P1D');
        $lastDay = $firstDate->add($interval);
        $formatedLastDay = $lastDay->format('D d m Y');
        $dayString = $lastDay->format('D');
        if (($dayString != "Sat") && ($dayString != "Sun") ) {
            $day = $lastDay->format('j');
            $month = $lastDay->format('m');
            $year = $lastDay->format('Y');
            $firstDate = new DateTime($lastDay->format('Y-m-d'));
            $getStudentDetails = $con->prepare("select * from students where studentFromSchool='$school'");
            $getStudentDetails->setFetchMode(PDO:: FETCH_ASSOC);
            $getStudentDetails->execute();
            while ($row = $getStudentDetails->fetch()) {
                $cardNumber = $row['cardNumber'];
                $class = $row['studentFromClass'];
                $insert = $con->prepare("insert into logs(logForSchool,logForClass,logForStudent,logForDate,status,arrivedAt,leftAt)
                values('$school', '$class', '$cardNumber', '$fullDate', '0', '-', '-')");
                $insert->execute();
            }
            $fullDate = $year . " " . months($month) . " " . $day;
        }
    }
    echo json_encode(array('result' => 'done'), true);
?>