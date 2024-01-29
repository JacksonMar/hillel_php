<?php

//require_once "classes/TaskManager.php";
require_once "classes/TaskManager.php";

$taskManager = new TaskManager("task_manager.txt");

//$taskManager->addTask("Test task", 1);
//var_dump($taskManager);
$taskManager->getTasks();
//$taskManager->addTask("Test task_2", 4);
//$taskManager->addTask("Test task_3", 2);

$taskManager->completeTask('65b7f480c7f73');
$taskManager->completeTask('65b7f3d388764');
$taskManager->completeTask('65b7f3d389013');
$taskManager->deleteTask("65b7f3d38959c");
var_dump($taskManager->getTasks());