<?php
    header('Content-Type: application/json');
    include("registration-checks.php");
    function proccessRegistration()
    {
        include("../db.php");
        $detailsArray = [];
        array_push($detailsArray, $_POST['method'], $_POST['email'], $_POST['userName'], $_POST['pass1'], $_POST['pass2'], $_POST['fullName'], $_POST['title'], $_POST['headEmail'], $_POST['phoneNumber'], $_POST['schoolName'], $_POST['level'], $_POST['address']);
        list($method, $email, $username, $pass1, $pass2, $fullName, $gender, $headEmail, $phoneNumber, $schoolName, $level, $address) = $detailsArray;
        $checkEmail = $con->prepare("select * from schools where email='$email'");
        $checkEmail->setFetchMode(PDO:: FETCH_ASSOC);
        $checkEmail->execute();
        if ($checkEmail->rowCount() == 1)
        {
            $response = array('result' => "Email already in use");
            echo json_encode($response, true);
        }
        else
        {
            $checkUserName = $con->prepare("select * from schools where userName='$username'");
            $checkUserName->setFetchMode(PDO:: FETCH_ASSOC);
            $checkUserName->execute();
            if ($checkUserName->rowCount() == 1)
            {
                $response = array('result' => "Username already in use");
                echo json_encode($response, true);
            }
            else
            {
                if(trim($pass1) != trim($pass2))
                {
                    $response = array('result' => "Passwords do not match");
                    echo json_encode($response, true);
                }
                else
                {
                    $salt = "ER";
                    $password = md5($salt . $pass2);
                    $img = $_FILES['logo'];
                    if(!empty($img)){
                        $fileName = explode(".", $_FILES['logo']['name']);
                        $newname = $fileName[0] . time() . rand() . '.jpg';
                        move_uploaded_file($_FILES['logo']['tmp_name'], '../../src/images/school-logos/'.$newname);
                        $picture = (file_exists('../../src/images/school-logos/'.$newname)) ? $newname : "guest-user.jpg";
                    }else {
                        $picture = "guest-user.jpg";
                    }
                    $registerSchool = $con->prepare("insert into schools(nameOfSchool,picture,email,phone,userName,password,type,address,accStatus,headName,gender,headEmail) values('$schoolName', '$picture', '$email', '$phoneNumber', '$username', '$password', '$level', '$address', '0', '$fullName', '$gender', '$headEmail')");
                    if($registerSchool->execute())
                    {
                        $getId = $con->prepare("select * from schools where userName='$username'");
                        $getId->setFetchMode(PDO:: FETCH_ASSOC);
                        $getId->execute();
                        if($getId->rowCount() == 1)
                        {
                            while ($row = $getId->fetch()) {
                                $id = $row['id'];
                            }
                            $primaryData = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6', 'Grade 7'];
                            $secondaryData = ['Form 1', 'Form 2', 'Form 3', 'Form 4', 'Form 5', 'Form 6'];
                            $icons = ["1.png", "2.png", "3.png", "4.png", "5.png", "6.png", "7.png"];
                            if ($level == "Secondary") {
                                for ($i=0; $i < count($secondaryData); $i++) {
                                    $levelName = $secondaryData[$i];
                                    $levelRef = md5(rand() . time() . rand() . $i);
                                    $picture = $icons[$i];
                                    $preFillLevels = $con->prepare("insert into levels(levelFrom,levelRef,levelName,picture) values('$id', '$levelRef', '$levelName', '$picture')");
                                    $preFillLevels->execute();
                                }
                            }elseif ($level == "Primary") {
                                for ($i=0; $i < count($primaryData); $i++) {
                                    $levelName = $primaryData[$i];
                                    $levelRef = md5(rand() . time() . rand() . $i);
                                    $picture = $icons[$i];
                                    $preFillLevels = $con->prepare("insert into levels(levelFrom,levelRef,levelName,picture) values('$id', '$levelRef', '$levelName', '$picture')");
                                    $preFillLevels->execute();
                                }
                            }
                        }
                        if ($method == "web")
                        {
                            define("EXPIRE_AFTER", 24 * 540000000); #expire time for cookie
                            $str = $id;
                            setcookie("loggedinatDeskApp", $str, (time() + EXPIRE_AFTER), "/");
                            $response = array('result' => "Registered");
                            echo json_encode($response, true);
                        }
                        elseif ($method == "mobile")
                        {
                            $response = array('result' => "Registered", 'id' => $id);
                            echo json_encode($response, true);
                        }
                    }
                    else
                    {
                        $response = array('result' => "fail");
                        echo json_encode($response, true);
                    }
                }
            }
        }
    }
?>