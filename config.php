<?php

define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_HOST','localhost:90');
define('MYSQL_DATABASE','todo');
define('MYSQL_PORT','3307');
$options=[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
];

$db=new PDO('mysql:dhost='.MYSQL_HOST.';port='.MYSQL_PORT.';dbname='.MYSQL_DATABASE,MYSQL_USER,MYSQL_PASSWORD,$options);

// $statement=$db->query("SELECT * FROM todo");
// $result=$statement->fetchAll();
// print_r($result);