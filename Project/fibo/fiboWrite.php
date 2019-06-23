<?php
define('ROOT', dirname(__FILE__));


include(ROOT.'/config/dbConnect.php');

$dbData = dbConnect::getDB();

$contains = false;
$arrKey = $_POST['fibInput'];
//$arrVal = $_POST['fibAns']; //   ----> NULL at the beginning of method
/*
//checks if DB has such key if has, response with needed value
if (isset($dbData[$arrKey])){
    echo $dbData[$arrKey];
} else {  //If there no such key, we have to send "signal" in response, 
          //if "signal" already send, we got our value to add to DB
    if (isset($arrVal)){
        dbConnect::addToDB($arrKey, $arrVal);
        echo $dbData[$arrKey];
    }else {
        echo "signal";
    }
}*/


foreach ($dbData as $dbItem){
    if ($dbItem['index'] == $arrKey){
        $contains = true;
        echo $dbItem['f_value'];
        break;
    } 
}

if (!$contains){
    $arrVal = fibo($arrKey);
    dbConnect::addToDB($arrKey, $arrVal);
    echo $arrVal;
    //print_r($dbData);
}

function fibo($index){
    $n1 = 1;
    $n2 = 1;
    $result = 0;
    for ($i = 2; $i <= $index; $i++){
        $result = $n1 + $n2;
        $n1 = $n2;
        $n2 = $result;
    }
    return $result;
}
    
