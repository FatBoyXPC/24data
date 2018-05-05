<?php

require '../vendor/autoload.php';

use App\People;
use App\MissingFieldException;

$errors = [];
$field = $_GET['sort_by'] ?? 'FName';
$sortOrder = $_GET['sort_order'] ?? People::SORT_ORDER_ASCENDING;
$availableSortOrders = People::SORT_ORDERS;

if (!in_array($sortOrder, $availableSortOrders)) {
    $errors[] = "Please choose a valid sort order.";
    $sortOrder = People::SORT_ORDER_ASCENDING;
}

$peopleJson = 'https://x-24.io/DevTestData.json';

try {
    $people = (new People($peopleJson))->sortBy($field, $sortOrder);
} catch (MissingFieldException $e) {
    $errors[] = $e->getMessage();
    $field = 'FName';

    $people = (new People($peopleJson))->sortBy($field, $sortOrder);
}

$availableFields = array_keys(get_object_vars($people[0]));
$selectedField = $field;

include "../views/layout.php";
