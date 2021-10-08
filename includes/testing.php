<?php
$random=random_bytes(32);
$hased=password_hash($random, PASSWORD_DEFAULT);
$hexed=bin2hex($random);
$binned=hex2bin($hexed);
echo $hased;
echo nl2br("\r\n") ;
echo $random;
$password="\$2y\$10\$WhsfEel8mZj5.HRcdGfWke5Ws4umhTkXIDanZbwQOiuWG7W9umixO";
$hashed="d3a51a2defe19b8a0344fcb51d1bd0e281c074768430f8104bd03332a74cfeb0 ";
if(password_verify($random,$hased)){
    echo "hello";
}
if(password_verify($binned,$hased)){
    echo "please";
}



?>