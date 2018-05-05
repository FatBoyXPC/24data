<?php

require '../vendor/autoload.php';

use App\People;

$peopleJson = 'https://x-24.io/DevTestData.json';
$people = (new People($peopleJson))->sortBy('FName', People::SORT_ORDER_ASCENDING);

include "../views/layout.php";
