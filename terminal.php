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
if (!opendir("fileroot" . $pwd)) {
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
    if(file_get_contents("commands/$commands[0].php") != NULL){
        include "commands/$commands[0].php";
        func($commands);
    }
    else{
        file_put_contents("recent.txt", "Unknown command.<br/>try 'help' or 'help [command]'<br/>", FILE_APPEND);
    }
    echo "<script>window.location.href=\"terminal.php\";</script>"; 
    ?>
</body>

</html>