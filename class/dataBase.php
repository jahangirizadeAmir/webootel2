<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 1/10/2019
 * Time: 9:22 AM
 */

    class  dataBase
    {
        public static $dbName = 'webotel';
        public static $dbUserName = 'root';
        public static $dbPassword = '';
        public static $dbAddress = 'localHost';

        public static $RESULT_ARRAY =1;
        public static $NUM_ROW =2;

        public function __construct()
        {
            date_default_timezone_set
            ("Asia/Tehran");
        }

        public static function connection()
        {
            $connection = mysqli_connect(dataBase::$dbAddress,
                dataBase::$dbUserName,
                dataBase::$dbPassword,
                dataBase::$dbName
            );
            mysqli_set_charset($connection, "utf8");
            return $connection;
        }

        public static function  RealString($param)
        {
            $RealParams = array();

            foreach ($param as $name => $value) {
                $RealParams[$name] =
                    mysqli_real_escape_string
                    (dataBase::connection(), $value);
            }
            return $RealParams;
        }

        public static function issetParams($param, $array)
        {
            $isset = true;
            foreach ($array as $value) {
                if (isset($param[$value])) {

                } else {
                    $isset = false;
                }
            }

            return $isset;
        }
        public static function emptyParams($param, $array)
        {
            $empty = true;
            foreach ($array as $value) {
                if ($param[$value]!='') {

                } else {
                    $empty = false;
                }
            }
            return $empty;
        }
        public static function GetDate()
        {
            $date = date("Y/m/d");
            return $date;
        }
        public static function GetTime()
        {
            $date = date("H:i:s");
            return $date;
        }
        public static function GenerateId()
        {

            ini_alter('date.timezone', 'Asia/Tehran');
            $now = new DateTime();
            $now = $now->format('YmdHis');
            $microTime = microtime();
            $id = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microTime);
            $id = substr($id, 11, 1);
            $random = (rand(10000, 99999));
            $va_id = $now . $id . $random;
            return $va_id;

        }
        public static function Query($StringQuery,$result=null){

            $query =
                mysqli_query
                (dataBase::connection(),
                    "$StringQuery"
                );

            if($result==dataBase::$NUM_ROW){
                return mysqli_num_rows($query);
            }
            if($result==dataBase::$RESULT_ARRAY){
                return mysqli_fetch_assoc($query);
            }
            return $query;

        }
        public static function HashPassword($password){
            $hashedPassword = strtolower($password);
            $hashedPassword = hash("SHA512",$hashedPassword);
            $hashedPassword = hash("SHA512",$hashedPassword);
            $hashedPassword = hash("SHA512",$hashedPassword);
            return $hashedPassword;
        }
        public static function J2G($date){
            $year = substr($date,0,4);
            $month = substr($date,5,2);
            $day = substr($date,8,2);
            include_once ('../function/jdf.php');
            $persianDate = gregorian_to_jalali($year,$month,$day,'/');
            return $persianDate;
        }
       public static function G2J($date){

            $year = substr($date,0,4);
            $month = substr($date,5,2);
            $day = substr($date,8,2);
            include_once ('../function/jdf.php');
            $gregorianDate = gregorian_to_jalali($year,$month,$day,'/');
            return $gregorianDate;

        }
        public static function Gid(){
            try {
                $now = new DateTime();
                ini_alter('date.timezone','Asia/Tehran');
                $now  = $now->format('YmdHis');
                $microtime = microtime();
                $id      = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
                $id      = substr($id,11,1);
                $random  = (rand(10000,99999));
                $va_id   = $now.$id.$random;
                return $va_id;
            }
            catch (Exception $e) {
            }

        }
        public static function convertNumber($var){
            $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

            $num = range(0, 9);
            $convertedPersianNums = str_replace($persian, $num, $var);
            $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

            return $englishNumbersOnly;
        }
}
