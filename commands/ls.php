<?php
function ls($commands)
{
    $pwd = file_get_contents("pwd.txt");
    if (sizeof($commands) == 1) {
        $files = scandir("fileroot" . $pwd);
        foreach ($files as $file) {
            file_put_contents("recent.txt", $file . "<br/>", FILE_APPEND);
        }
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    }
}
