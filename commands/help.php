<?php
function func($commands)
{
    $help = file_get_contents("static/terminal.php/help.txt");
    if (sizeof($commands) == 1) {
        file_put_contents("recent.txt", $help, FILE_APPEND);
    } else if (sizeof($commands) == 2 && file_get_contents("static/help/$commands[1].txt") != NULL) {
        file_put_contents("recent.txt", file_get_contents("static/help/$commands[1].txt"), FILE_APPEND);
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments or command not found.<br/>", FILE_APPEND);
    }
}
