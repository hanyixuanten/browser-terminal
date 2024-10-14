<?php
function func($commands)
{
    $pwd = file_get_contents("pwd.txt");
    if (sizeof($commands) > 2) {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    } else {
        if (!file_exists("fileroot" . $pwd . "/" . $commands[1])) {
            file_put_contents("recent.txt", "File not found.<br/>", FILE_APPEND);
        } else {
            $file = file_get_contents("fileroot" . $pwd . "/" . $commands[1]);
            file_put_contents("recent.txt", str_replace("\n", "<br/>", $file) . "<br/>", FILE_APPEND);
        }
    }
}
