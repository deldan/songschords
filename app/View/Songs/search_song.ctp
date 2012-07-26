<?php

header('Content-type: application/json');
header('X-JSON: ' . $this->Js->object($response));
// Convert the PHP array to JSON and echo it
echo $this->Js->object($response);

?>