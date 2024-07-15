<?php
function deleteDirectory($dir)
{
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? deleteDirectory("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}
function rm($commands)
{
    $pwd = file_get_contents("pwd.txt");
    if ($commands[1] == "-r") {
        if (is_dir("fileroot" . $pwd . "/" . $commands[2])) {
            if (deleteDirectory("fileroot" . $pwd . "/" . $commands[2])) {
                file_put_contents("recent.txt", "Directory deleted.<br/>", FILE_APPEND);
            } else {
                file_put_contents("recent.txt", "Error deleting.<br/>", FILE_APPEND);
            }
        } else {
            file_put_contents("recent.txt", "Not a directory.<br/>", FILE_APPEND);
        }
    } else {
        if (is_dir("fileroot" . $pwd . "/" . $commands[1])) {
            file_put_contents("recent.txt", "Is a directory.<br/>Try rm -r<br/>", FILE_APPEND);
        } else {
            if (unlink("fileroot" . $pwd . "/" . $commands[1])) {
                file_put_contents("recent.txt", "File deleted.<br/>", FILE_APPEND);
            } else {
                file_put_contents("recent.txt", "Error deleting.<br/>", FILE_APPEND);
            }
        }
    }
}
?>