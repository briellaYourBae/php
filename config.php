<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','faqih');

/*connect to MYSQL*/

$connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if ($connect === false){
    die("ERROR: Miris." . mysqli_connect_error());
}
?>