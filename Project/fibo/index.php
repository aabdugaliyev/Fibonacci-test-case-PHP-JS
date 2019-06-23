<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('ROOT', dirname(__FILE__));

include(ROOT.'/config/dbConnect.php');

dbConnect::getDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a id="showpop" onclick="createPop()">test</a>
        
        <div id="fibDiv">
            <button id="hidepop">X</button>
            <h2>Enter Fibonacci number</h2>
            <input id="fibInput" type="text"><br>
            <button id="btn">OK</button>
        </div>

        <p id="output"></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="/js/popup.js"></script>
    
    
    
</body>
</html>
