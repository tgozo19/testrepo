<?php
    function months($month){
        switch ($month){
            case "January":
                return "01";
                break;
            case "February":
                return "02";
                break;
            case "March":
                return "03";
                break;
            case "April":
                return "04";
                break;
            case "May":
                return "05";
                break;
            case "June":
                return "06";
                break;
            case "July":
                return "07";
                break;
            case "August":
                return "08";
                break;
            case "September":
                return "09";
                break;
            case "October":
                return 10;
                break;
            case "November":
                return 11;
                break;
            case "December":
                return 12;
                break;
            default:
                return "";
                break;
        }
    }
    header('Content-Type: application/json');
    include("db.php");
    $school = $_COOKIE['loggedinatDeskApp'];
    $dateObject = new DateTime();
    $currentDate = $dateObject->format("Y-m-d");
    $getTermDates = $con->prepare("select * from terms where termFor='$school' ORDER BY id ASC");
    $getTermDates->setFetchMode(PDO:: FETCH_ASSOC);
    $getTermDates->execute();
    if($getTermDates->rowCount() != 0){
        while ($row = $getTermDates->fetch()) {
            $termBegins = $row['begins'];
            $termEnds = $row['ends'];
        }
        $beginArray = explode(" ", $termBegins);
        $beginDate = $beginArray[2] . "-" . months($beginArray[1]) . "-" . $beginArray[0];
        $endArray = explode(" ", $termEnds);
        $endDate = $endArray[2] . "-" . months($endArray[1]) . "-" . $endArray[0];
        if (($currentDate >= $beginDate) && ($currentDate < $endDate) ) {
            $result = array('result' => 'current term');
            echo json_encode($result, true);
        } else {
            $result = array('result' => 'term expired');
            echo json_encode($result, true);
        }
    }
    else
    {
        $result = array('result' => 'no term');
        echo json_encode($result, true);
    }
?>