<?php
    session_start();
    if(isset($_SESSION['admin'])){
        header("location: homepage.php");
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Prime login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.css" type="text/css" media="all">
    
</head>

<body>

    <div class="content-w3ls">
        <div class="content-bottom" style="margin-top: 35%;">
        <center><span style="color: white;font-size:35px;"> Admin Login</span></center>
            <form action="php/login.php" method="post" >
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="adminName" id="text1" type="text" value="" placeholder="username" required>
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-lock" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="password" id="myInput" type="Password" placeholder="password">
                    </div>
                </div>
                <div class="field-group">
                    <div class="check">
                        <label class="checkbox w3l">
                            <input type="checkbox" onclick="myFunction()">
                            <i> </i>show password</label>
                    </div>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </div>
                <div class="wthree-field">
                    <input id="saveForm" name="saveForm" type="submit" value="sign in" />
                </div>
            </form>
        </div>
    </div>
 
</body>
<!-- //Body -->
</html>