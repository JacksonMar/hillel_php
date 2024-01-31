<?php

require_once "classes/BaseClass.php";
require_once "classes/SubClass.php";
$baseObject = new BaseClass();
$baseObject->printText();

$subObject = new SubClass();
$subObject->printText();