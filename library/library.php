<?php
function filter_pass($input){
    $output = str_replace("`", "", $input );
    $output = str_replace("'", "", $output);
    $output = str_replace("$", "", $output);
    $output = str_replace("#", "", $output);
    $output = str_replace("&", "", $output);
    $output = str_replace(";", "", $output);
    return $output;
};
?>