<?php
$connection = new mysqli("host", "user" , "password" , "database");

$query = "SELECT descricao FROM {$_POST['table']}";

if(!$data = $connection->query($query)){  
    $array = [null, $connection->error];

    echo json_encode($array);
}else{
    $array = [];

    for($i = 0 ; $i < $data->num_rows; $i++){
        $array[] = $data->fetch_assoc();
    }
    
    echo json_encode($array);
}

