<?php


class dbConnect{

    private $dbReqs;

    private function createPDO(){
        $dbReqPath = ROOT.'/config/dbReq.php';
        $dbReqs = include($dbReqPath);
        $host = $dbReqs['serverName'];
        $db = $dbReqs['dbName'];
        $user = $dbReqs['userName'];
        $pass = $dbReqs['password'];
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host; dbname=$db; charset=$charset";
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    }

    public static function getDB(){
        $pdo = (new self)->createPDO();
        $sql = "SELECT * from fibos";
        $state = $pdo->prepare($sql);

        try{
            $rows = array();
            $result = $pdo->query($sql);
            while( $row = $result->fetch(PDO::FETCH_ASSOC) ) {
                $rows[] = $row;
            }
            
            return $rows;

        } catch (PDOException $e){
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public static function addToDB($pos, $num){
        $pdo = (new self)->createPDO();
        $sql = "INSERT INTO `fibos` (`index`, `f_value`) VALUES(:idx, :num)";

        try{
            $state = $pdo->prepare($sql);
            $state->execute(['idx' => $pos, 'num' => $num]);
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }


}