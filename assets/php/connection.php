<?php

    $host_name  = "sql203.epizy.com";
    $database   = "epiz_26306835_tb_contact";
    $user       = "epiz_26306835";
    $password   = "UbhJPEuKidW6tkb";

    try{
        $conn = new PDO('mysql:host='.$host_name.';dbname='.$database,$user,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch(PDOException $e){
        print "Error: ".$e->getMessage()."<br/>";
    }

?>