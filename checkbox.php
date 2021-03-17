<?php

var_dump($_POST);

$jsonfile = file_get_contents('tasks.json');
$jsonarray = json_decode($jsonfile, true);

$task = $_POST['task_name'];
$jsonarray[$task]['completed'] = !$jsonarray[$task]['completed'];

file_put_contents('tasks.json', json_encode($jsonarray, JSON_PRETTY_PRINT));

header('Location: index.php');

?>