<?php

$mysqli = new mysqli("remotemysql.com", "2ydtkFjzTV", "QeT0G5rjnV", "2ydtkFjzTV");
$result = $mysqli->query("SELECT * FROM categoria");

$obj = null;
for($i = 0; $i < $result->num_rows; $i++){
    $result->data_seek($i);
    $data = $result->fetch_assoc();
    $categoria[$i]->id = $data['id'];
    $categoria[$i]->descricao = $data['descricao'];
    $categoria[$i]->lucro_gasto = $data['lucro_gasto'];
    $obj[] = $categoria[$i];
}

$json = json_encode($obj);

echo $json;