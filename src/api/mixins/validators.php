<?php

// display error function
function display_error($entryName){
    global $errorCount;
    ++$errorCount;
    echo "the field \"$entryName\" is required. Error count: \"$errorCount\"<br>";
}
// validate input function
function validate_input($data, $entryName):String{
    global $errorCount;
    if(empty($data)){
        display_error($entryName);
        $data = "";
    }
    return $data;
}