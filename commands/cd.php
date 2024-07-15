<?php
function cd($commands)
{
    if (sizeof($commands) > 2) {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
        return;
    }
    $pwd = file_get_contents("pwd.txt");
    if ($commands[1] == ".." || $commands[1] == NULL) {
        $pwd = substr($pwd, 0, strrpos($pwd, "/"));
        file_put_contents("pwd.txt", $pwd);
    } else if (str_starts_with($commands[1], "/")) {
        file_put_contents("pwd.txt", $commands[1]);
    } else {
        if (opendir("fileroot" . $pwd . "/" . $commands[1])) {
            if ($pwd == "/")
                file_put_contents("pwd.txt", $pwd . $commands[1]);
            else {
                file_put_contents("pwd.txt", $pwd . "/" . $commands[1]);
            }
        } else {
            file_put_contents("recent.txt", "Directory does not exist.<br/>", FILE_APPEND);
        }
    }
}
