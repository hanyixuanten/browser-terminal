<!DOCTYPE html>
<?php
ini_set("display_errors", "Off");
if (file_get_contents("recent.txt") == NULL) {
    file_put_contents("recent.txt", "Welcome to the terminal!<br/>Type 'help' to see a list of commands.<br/>");
}
if (file_get_contents("pwd.txt") == NULL) {
    file_put_contents("pwd.txt", "/");
}
$pwd = file_get_contents("pwd.txt");
if(!opendir("fileroot" . $pwd)){
    !file_put_contents("pwd.txt", "/");
}
if (!opendir("fileroot")) {
    if (!mkdir("fileroot")) {
        echo "Error creating directory.No permissions?";
        exit(0);
    }
}
?>
<html>

<head>
    <link rel="preload" href="static/terminal.php/style.css" as="style" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>frame</title>
    <link rel="stylesheet" type="text/css" href="static/terminal.php/style.css" />
</head>

<body>
    <?php
    $pwd = file_get_contents("pwd.txt");
    $commands = explode(" ", $_POST['command']);
    file_put_contents("recent.txt", $pwd . " $ " . $_POST['command'] . "<br/>", FILE_APPEND);
    $output_str = file_get_contents("recent.txt");
    echo $output_str;
    if ($commands[0] == NULL) {
        echo "<script>window.scrollTo(0,document.body.scrollHeight)</script>";
        exit(0);
    }
    if ($commands[0] == "pwd" & sizeof($commands) == 1) {
        file_put_contents("recent.txt", $pwd . "<br/>", FILE_APPEND);
    } else if ($commands[0] == "mkdir" && sizeof($commands) == 2) {
        if (!opendir("fileroot" . $pwd . "/" . $commands[1])) {
            if (!mkdir("fileroot" . $pwd . "/" . $commands[1])) {
                file_put_contents("recent.txt", "Error creating directory.No permissions?<br/>", FILE_APPEND);
            }
        } else {
            file_put_contents("recent.txt", "Directory already exists.<br/>", FILE_APPEND);
        }
    } else if ($commands[0] == "clear" & sizeof($commands) == 1) {
        file_put_contents("recent.txt", "");
    } else if ($commands[0] == "cd" & sizeof($commands) == 2) {
        if ($commands[1] == "..") {
            $pwd = substr($pwd, 0, strrpos($pwd, "/"));
            file_put_contents("pwd.txt", $pwd);
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
    } else if ($commands[0] == "help") {
        $help = file_get_contents("static/terminal.php/help.txt");
        if (sizeof($commands) == 1) {
            file_put_contents("recent.txt", $help, FILE_APPEND);
        } else if (sizeof($commands) == 2 && file_get_contents("static/help/$commands[1].txt") != NULL) {
            file_put_contents("recent.txt", file_get_contents("static/help/$commands[1].txt"), FILE_APPEND);
        } else {
            file_put_contents("recent.txt", "Unknown command.<br/>", FILE_APPEND);
        }
    } else {
        file_put_contents("recent.txt", "Unknown command.<br/>", FILE_APPEND);
    }
    echo "<script>window.location.href=\"terminal.php\";</script>";
    ?>
</body>

</html>