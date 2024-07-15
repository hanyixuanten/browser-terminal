<?php
function pwd($commands)
{
    $pwd = file_get_contents("pwd.txt");
    if (sizeof($commands) == 1) {
        file_put_contents("recent.txt", $pwd . "<br/>", FILE_APPEND);
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    }
}
