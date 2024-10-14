<?php
function func($commands)
{
    $now_v = "v1.5.1";
    if (sizeof($commands) == 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/hanyixuanten/browser-terminal/releases/latest');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: PHP']);
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $latest_v = $response['tag_name'];
        if ($latest_v == $now_v) {
            file_put_contents("recent.txt", "This is the latest version.<br/>", FILE_APPEND);
        } else {
            file_put_contents("recent.txt", "There is a new version $latest_v, you are using $now_v <br/>", FILE_APPEND);
            file_put_contents("recent.txt", "<a href='https://api.github.com/repos/hanyixuanten/browser-terminal/zipball/$latest_v' style='color: white;'>Download zip</a> <br/>", FILE_APPEND);
            file_put_contents("recent.txt", "<a href='https://api.github.com/repos/hanyixuanten/browser-terminal/tarball/$latest_v' style='color: white;'>tar.gz</a> <br/>", FILE_APPEND);
        }
    } else {
        file_put_contents("recent.txt", "Invalid number of arguments.<br/>", FILE_APPEND);
    }
}