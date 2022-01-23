<?php

define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_HOST','localhost');
define('MYSQL_DATABASE','todo');

$options=[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
];

$db=new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE,MYSQL_USER,MYSQL_PASSWORD,$options);

// $statement=$db->query("SELECT * FROM todo");
// $result=$statement->fetchAll();
// print_r($result);