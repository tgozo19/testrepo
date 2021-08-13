<?php
    header('Content-Type: application/json');
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        include("../db.php");
        $id = $_COOKIE['loggedinatDeskApp'];
        $getUserDetails = $con->prepare("select * from schools where id='$id'");
        $getUserDetails->setFetchMode(PDO:: FETCH_ASSOC);
        $getUserDetails->execute();
        if ($getUserDetails->rowCount() != 0) {
            while ($row = $getUserDetails->fetch()) {
                $name = $row['nameOfSchool'];
                $picture = $row['picture'];
                $email = $row['email'];
                $phone = $row['phone'];
                $userName = $row['userName'];
                $password = $row['password'];
                $address = $row['address'];
                $headName = $row['headName'];
                $gender = $row['gender'];
                $headEmail = $row['headEmail'];
            }
            $data = [
                "id"=> $id,
                "name" => $name,
                "picture" => "src/images/school-logos/$picture",
                "email" => $email,
                "phone" => $phone,
                "userName" => $userName,
                "password" => $password,
                "address" => $address,
                "headName" => $headName,
                "gender" => $gender,
                "headEmail" => $headEmail,
            ];
            echo json_encode($data, true);
        }
    }
?>