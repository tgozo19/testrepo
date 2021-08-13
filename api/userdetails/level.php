<?php
    header('Content-Type: application/json');
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $userId = $_COOKIE['loggedinatDeskApp'];
        processRequest($userId);
    }else {
        if (isset($_POST['userId'])) {
            $userId = $_POST['userId'];
            processRequest($userId);
        } else {
            $result = array('result' => 'please pass userId');
            echo json_encode($result, true);
        }
    }
    function processRequest($userId)
    {
        include("../db.php");
        $getUserDetails = $con->prepare("select * from levels where levelFrom='$userId' ORDER BY levelName ASC");
        $getUserDetails->setFetchMode(PDO:: FETCH_ASSOC);
        $getUserDetails->execute();
        if ($getUserDetails->rowCount() != 0) {
            $levels = [];
            while ($row = $getUserDetails->fetch()) {
                $id =$row['id'];
                $levelRef = $row['levelRef'];
                $levelName = $row['levelName'];
                $picture = $row['picture'];
                $level = array('id' => $id, 'ref' => $levelRef, 'name' => $levelName, 'picture' => "src/images/$picture");
                array_push($levels, $level);
            }
            $data = array('level' => $levels);
            echo json_encode($data, true);
        }
    }
?>