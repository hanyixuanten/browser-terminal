<?php
function clear($commands)
{
    if (sizeof($commands) == 1) {
        file_put_contents("recent.txt", "");
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    }
}
