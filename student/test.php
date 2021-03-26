<?php

// This is the data you want to pass to Python
$data = 'Arrays sdsfasdf';

// Execute the python script with the JSON data
$result = shell_exec('python py/keyword.py ' . escapeshellarg(json_encode($data)));
print_r($result);

// Decode the result
$resultData = json_decode($result, true);

// This will contain: array('status' => 'Yes!')
var_dump($resultData);