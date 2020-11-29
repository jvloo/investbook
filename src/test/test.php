<?php

// $root = FCPATH;

// This is the data you want to pass to Python
$data = [
  'videoId'   => 2,
  'commentId' => 1
];

// Encode the JSON data
$data = base64_encode(json_encode($data));

// Execute the python script with the JSON data
$result = shell_exec("python test.py " . $data);

echo $result;

// Decode the result
// $resultData = json_decode($result, true);

// This will contain: array('status' => 'Yes!')
// var_dump($resultData);


?>
