<?php
require('config.php');

$pdostatement=$db->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
$pdostatement->execute();

header('location:index.php?sms="Delected Successfully!"');