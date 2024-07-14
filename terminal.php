<!DOCTYPE html>
<?php
ini_set("display_errors", "Off");
if (file_get_contents("recent.txt") == NULL) {
    file_put_contents("recent.txt", "Welcome to the terminal!<br/>Type 'help' to see a list of commands.<br/>");
}
if (file_get_contents("pwd.txt") == NULL) {
    file_put_contents("pwd.txt", "/");
}
?>
<html>

<head>
    <link rel="preload" href="style.css" as="style" />
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="refresh" content="2"> -->
    <title>frame</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php
    $pwd = file_get_contents("pwd.txt");
    file_put_contents("recent.txt", $pwd . " $ " . $_POST['command'] . "<br/>", FILE_APPEND);
    $output_str = file_get_contents("recent.txt");
    echo $output_str;
    if ($_POST['command'] == NULL) {
        echo "<script>window.scrollTo(0,document.body.scrollHeight)</script>";
        exit(0);
    } else if ($_POST['command'] == "clear") {
        file_put_contents("recent.txt", "");
    } else if ($_POST['command'] == "help") {
        $help = file_get_contents("help.txt");
        file_put_contents("recent.txt", $help, FILE_APPEND);
    } else {
        file_put_contents("recent.txt", "Unknown command.<br/>", FILE_APPEND);
    }
    echo "<script>window.location.href=\"terminal.php\";</script>";
    ?>
</body>

</html>