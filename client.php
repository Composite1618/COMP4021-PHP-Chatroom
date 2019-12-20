<?php

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    return;
}

// get the name from cookie
$name = $_COOKIE["name"];

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Message Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
            .div-color {
                position: absolute;
                width: 50px;
                height: 50px;
            }
        </style>
        <script type="text/javascript">
        function load() {
            var name = "<?php print $name; ?>";

            setTimeout("document.getElementById('msg').focus()", 100);
        }

        function userlist(url) {
            newwindow=window.open(url,'name','height=600,width=800');
            if (window.focus) {
                newwindow.focus()
            }
            return false;
        }

        function select(color) {
            if (confirm('Are you sure to change your message color to ' + color + '?')) {
                document.getElementById("color").value = color;
            }
        }
        </script>
    </head>

    <body style="text-align: left" onload="load()">
        <form action="add_message.php" method="post">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td>What is your message?</td>
                </tr>
                <tr>
                    <td><input class="text" type="text" name="message" id="msg" style= "width: 780px" /></td>
                </tr>
                <tr>
                    <td>
                        <input class="button" type="submit" value="Send Your Message" style="width: 200px" />
                        
                        <div style="position:relative; height: 70px;">
                            Choose your color:
                            <div class="div-color" style="background-color:black;left:0px" onclick="select('black')"></div>
                            <div class="div-color" style="background-color:yellow;left:50px" onclick="select('yellow')"></div>
                            <div class="div-color" style="background-color:green;left:100px" onclick="select('green')"></div>
                            <div class="div-color" style="background-color:cyan;left:150px" onclick="select('cyan')"></div>
                            <div class="div-color" style="background-color:blue;left:200px" onclick="select('blue')"></div>
                            <div class="div-color" style="background-color:magenta;left:250px" onclick="select('magenta')"></div>
                        </div>
                        <input type="hidden" name="color" id="color" value="black" />
                    </td>
                </tr>
            </table>
        </form>
        
        <!--logout & user list-->
        <table border="0" cellspacing="5" cellpadding="0">
            <tr>
                <td>
                    <form action="logout.php" method="post">
                        <input class="button" type="submit" value="Click to Logout" style="position:relative; width: 200px;"/>
                    </form>
                </td>
                <td>
                    <button class="button" style="margin-left: 5px;width: 200px" onclick="userlist('userlist.html'); return false;">Online Users List</button>
                </td>
            </tr>
        </table>

    </body>
</html>
