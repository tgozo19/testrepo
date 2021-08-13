<?php
    class tapStudent{

        public static function months($month){
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

        public static function getCard(){
            return define('CARD', $_GET['q']) ;
        }

        public static function checkParams(){
            return isset($_GET['q']) ? self::validateCard() : self::passParamsFirst();
        }

        public static function passParamsFirst(){
            print('Please pass params');
        }

        public static function validateCard(){
            self::getCard();
            include("db.php");
            $checkCard = $con->prepare("select * from students where cardNumber='".CARD."'");
            $checkCard->setFetchMode(PDO:: FETCH_ASSOC);
            $checkCard->execute();
            while ($row = $checkCard->fetch()) {
                $name = $row['nameOfStudent'];
            }
            return $checkCard->rowCount() == 1 ? self::logStudent($con, $name) : self::invalidCard(CARD);
        }

        public static function invalidCard($card){
            print("Card is invalid $card");
        }

        public static function logStudent($con, $name){
            $dateObject = new DateTime("", new DateTimeZone("Africa/Johannesburg"));
            $date = $dateObject->format('d') . ' ';
            $month = $dateObject->format('m');
            $year = ' ' . $dateObject->format('Y');
            $date = $date . self::months($month) . $year;
            $time = $dateObject->format('H:i');
            $checkLog = $con->prepare("select * from logs where logForStudent='".CARD."' and logForDate='$date'");
            $checkLog->setFetchMode(PDO:: FETCH_ASSOC);
            $checkLog->execute();
            if ($checkLog->rowCount() == 1) {
                $row = $checkLog->fetch();
                $arrivedAt = $row['arrivedAt'];
                $query = ($arrivedAt == '-') ? 'arrivedAt' : 'leftAt';
                $logStudent = $con->prepare("update logs set $query='$time', status='1' where logForStudent='".CARD."' and logForDate='$date'");
                return $logStudent->execute() ? self::success($name, $query, $time) : self::failed();
            }else {
                print("nothing");
            }
        }

        public static function success($name, $query, $time){
            $query = $query == 'arrivedAt' ? 'arrived at' : 'left at';
            include("../send-sms.php");
            $message = $twilio->messages
                  ->create("+263785991512", // to
                           [
                               "body" => "$name $query $time",
                               "from" => "+18565954432"
                           ]
                  );
            print("success");
        }

        public static function failed(){
            print('Please try again');
        }

    }
    tapStudent::checkParams();
?>