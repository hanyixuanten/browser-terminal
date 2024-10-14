<?php
function func($commands)
{
    $pwd = file_get_contents("pwd.txt");
    if (sizeof($commands) == 2) {
        if (!opendir("fileroot" . $pwd . "/" . $commands[1])) {
            if (!mkdir("fileroot" . $pwd . "/" . $commands[1])) {
                file_put_contents("recent.txt", "Error creating directory.No permissions or already exists.<br/>", FILE_APPEND);
            }
        } else {
            file_put_contents("recent.txt", "Directory already exists.<br/>", FILE_APPEND);
        }
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    }
}
