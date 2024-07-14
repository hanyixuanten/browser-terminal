<!DOCTYPE html>
<html>

<head>
    <script src="https://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
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
        document.onkeydown = function(e) { //对整个页面监听  
            var keyNum = window.event ? e.keyCode : e.which; 
            if (keyNum == 13) {
                document.getElementById("fm").submit();
                document.getElementById("command").value = "";
            }
        }
    </script>
</head>

<body>
    <iframe src="./terminal.php" onload="changeFrameHeight()" height="" width="100%" scrolling="auto" frameborder="0" id="if" name="if"></iframe>
    <form method="post" action="./terminal.php" target="if" id="fm" onsubmit="return false">
        <input name="command" id="command" />
    </form>
</body>

</html>