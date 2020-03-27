<?php
header("Content-Type: application/json; charset=UTF-8");

$myObject = json_decode($_POST["a"], true);
$myObject["firstName"]  = 'Peter';


echo(json_encode($myObject));