  
<?php

function base_url($fileNames)
{
    // $_SERVER['DOCUMENT_ROOT'] = C:/xampp/htdocs
    return  "http://localhost/jobportal/" . $fileNames;
}

function file_path($path)
{
    return $_SERVER['DOCUMENT_ROOT'] . "/jobportal/" . $path;
}
?>