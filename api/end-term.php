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
    include("db.php");
    $school = $_COOKIE['loggedinatDeskApp'];
    $begin = explode(" ", $_POST['ends']);
    $a = ($begin[0][0] == "0" ? $begin[0][1] : $begin[0]);
    $date = $begin[2] . " ". $begin[1] . " " . $a;
    $year = $begin[2];
    $firstDate = new DateTime($_POST['ends']);
    $datesArray = [];
    for ($i=0; $i < 370; $i++) { 
        $interval = new DateInterval('P1D');
        $lastDay = $firstDate->add($interval);
        $day = $lastDay->format('j'); 
        $month = $lastDay->format('m');
        $year = $lastDay->format('Y');

        $day1 = $year . " " . months($month) . " " . $day;
        $firstDate = new DateTime($lastDay->format('Y-m-d'));
        array_push($datesArray, $day1);
    }
    for ($i=0; $i < count($datesArray); $i++) {
        //echo $datesArray[$i] . "<br>";
        $deleteDate = $datesArray[$i];
        $deleteLogs = $con->prepare("delete from logs where logForDate='$deleteDate' and logForSchool='$school'");
        $deleteLogs->execute();
    }
    $getTermDates = $con->prepare("select * from terms where termFor='$school' ORDER BY id ASC");
    $getTermDates->setFetchMode(PDO:: FETCH_ASSOC);
    $getTermDates->execute();
    while ($row = $getTermDates->fetch()) {
        $id = $row['id'];
    }
    $updateTerm = $con->prepare("update terms set ends='".$_POST['ends']."' where id='$id'");
    if ($updateTerm->execute()) {
        echo json_encode(array('result' => 'done'), true);
    } else {
        echo json_encode(array('result' => 'fail'), true);
    }
?>