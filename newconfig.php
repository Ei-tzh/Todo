<?php

$db=new PDO("mysql:dbhost=localhost:90;port=3307;dbname=todo","root","",[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
]);

$statement=$db->query("SELECT * FROM todo");
$result=$statement->fetchAll();
print_r($result);
