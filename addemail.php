<?php  
include "db.php";
$email=$_POST['email'];
$q="insert into clients(`id`,`email`) values(null,'$email')";
$s=$dbpdo->prepare($q);
$s->execute();
?>