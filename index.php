<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Terminal</title>
    <style>
        body {
            background-color: black;
        }
    </style>
    <script>
        function changeFrameHeight() {
            var iframe = document.getElementById("if");
            iframe.height = document.documentElement.clientHeight - 50;
        }
        window.onresize = function() {
            changeFrameHeight();
        }
    </script>

</head>

<body>
    <iframe src="./terminal.php" onload="changeFrameHeight()" height="" width="100%" scrolling="auto" frameborder="0" id="if" name="if"></iframe>
    <form method="post" action="./terminal.php" target="if">
        <input name="command" required />
        <input type="submit" value="Submit" />
    </form>
</body>

</html>