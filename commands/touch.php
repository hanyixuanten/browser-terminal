<?php
function touc($commands)
{
    $pwd = file_get_contents("pwd.txt");
    if (sizeof($commands) == 2) {
        if (!touch("fileroot" . $pwd . "/" . $commands[1])) {
            file_put_contents("recent.txt", "Error touchting.No permissions?<br/>", FILE_APPEND);
        }
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    }
}
