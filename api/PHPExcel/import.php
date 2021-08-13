<?php
    header('Content-Type: application/json');
    include("../db.php");

    function getSchoolMail($id){
        include("../db.php");
        $getSchoolMail = $con->prepare("select * from schools where id='$id'");
        $getSchoolMail->setFetchMode(PDO:: FETCH_ASSOC);
        $getSchoolMail->execute();
        if ($getSchoolMail->rowCount() == 1) {
            while ($rowMail = $getSchoolMail->fetch()) {
                $email = $rowMail['email'];
            }
        } else {
            $email = '';
        }
        return $email == '' ? '' : $email;
    }

    if(!isset($_COOKIE['loggedinatDeskApp'])) echo json_encode(array('result' => 'not logged in'));
    if (isset($_COOKIE['loggedinatDeskApp'])) {
        $school = $_COOKIE['loggedinatDeskApp'];
        $schoolEmail = getSchoolMail($school);

        $fileName = explode(".", $_FILES['excelfile']['name']);
        $newname = $fileName[0] . time() . rand() . '.' . end($fileName);
        move_uploaded_file($_FILES['excelfile']['tmp_name'], 'excelfiles/'.$newname);
        $file = (file_exists('excelfiles/'.$newname)) ? 'excelfiles/'.$newname : "";
    
        require("Classes/PHPExcel.php");
        require_once("Classes/PHPExcel/IOFactory.php");
    
        $objExcel = PHPExcel_IOFactory::load($file);
        $notification = 0;
        foreach ($objExcel->getWorksheetIterator() as $worksheet) {
            if
            (
                ($worksheet->getCellByColumnAndRow(0, 1)->getValue() == "Card Number")  &&
                ($worksheet->getCellByColumnAndRow(1, 1)->getValue() == "ID Number")  &&
                ($worksheet->getCellByColumnAndRow(2, 1)->getValue() == "Full Name")  &&
                ($worksheet->getCellByColumnAndRow(3, 1)->getValue() == "Phone Number")  &&
                ($worksheet->getCellByColumnAndRow(4, 1)->getValue() == "D.O.B")  &&
                ($worksheet->getCellByColumnAndRow(5, 1)->getValue() == "Gender")  &&
                ($worksheet->getCellByColumnAndRow(6, 1)->getValue() == "Class")  &&
                ($worksheet->getCellByColumnAndRow(7, 1)->getValue() == "Picture")
            )
            {
                $highestRow = $worksheet->getHighestRow();
                for ($row=2; $row <= $highestRow; $row++) {
                    $cardNumber = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $idNumber = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $fullName = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $phoneNumber = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $DOB = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $class = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $picture = 
                        ($worksheet->getCellByColumnAndRow(7, $row)->getValue() != "")
                        ?
                        $worksheet->getCellByColumnAndRow(7, $row)->getValue() . ".jpg"
                        :
                        "guest-user.jpg";
                    
                    if(file_exists("../../src/images/schools/$schoolEmail/$picture")){
                        if ($picture != "guest-user.jpg") {
                            $picNewName = $worksheet->getCellByColumnAndRow(7, $row)->getValue() . time() . rand() . '.jpg';
                            if (copy("../../src/images/schools/$schoolEmail/$picture", "../../src/images/students/$picNewName")) {
                                //unlink("../../src/images/schools/$schoolEmail/$picture");
                                $picture = $picNewName;
                            }
                        }
                    }
                    $getLevel = $con->prepare("select * from classes where className='$class' and classFromSchool='$school'");
                    $getLevel->setFetchMode(PDO:: FETCH_ASSOC);
                    $getLevel->execute();
                    if($getLevel->rowCount() == 0) $notification += 1;
                    if($getLevel->rowCount() != 0){
                        while ($rowClass = $getLevel->fetch()) {
                            $level = $rowClass['classFromLevel'];
                            $classRef = $rowClass['classRef'];
                        }
                        $checkIfStudentExists = $con->prepare("select * from students where cardNumber='$cardNumber'");
                        $checkIfStudentExists->setFetchMode(PDO:: FETCH_ASSOC);
                        $checkIfStudentExists->execute();
                        if ($checkIfStudentExists->rowCount() == 1) {
                            $updateStudent = $con->prepare("update students set picture='$picture', nameOfStudent='$fullName',phoneNumber='$phoneNumber',age='$DOB',gender='$gender',idNumber='$idNumber' where cardNumber='$cardNumber'");
                            $updateStudent->execute();
                        } else {
                            $insertStudent = $con->prepare("insert into students(cardNumber,studentFromSchool,studentFromLevel,studentFromClass,nameOfStudent,picture,email,phoneNumber,age,gender,idNumber,address,nextOfKeen,nextOfKeenNumber,RelationToNextOfKeen) 
                            values('$cardNumber', '$school', '$level', '$classRef', '$fullName', '$picture', '', '$phoneNumber', '$DOB', '$gender', '$idNumber', '', '', '', '')");
                            $insertStudent->execute();
                        }
                    }
                }
                if ($notification == 0) {
                    echo json_encode(array('result' => 'success'));
                } else {
                    echo json_encode(array('result' => " Information for $notification student(s) was not recorded because either there classes are not specified correctly or their classes have not yet been added into the system"));
                }
            }
            else
            {
                echo json_encode(array('result' => 'wrong format'));
            }
        }
    }

?>