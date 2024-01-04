<?php
session_start();
include "includes/functions.php";
login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ObatKu</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        #loginbox {
            margin-top: 50px;
        }

        .panel-heading {
            background-color: #5bc0de;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }

        #loginform {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        #btn-login {
            width: 100%;
        }

        .alert-danger {
            margin-top: 10px;
        }

        .signup-link {
            font-size: 85%;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="loginbox" class="mainbox col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
            </div>

            <div class="panel-body">
                <?php message(); ?>
                <form id="loginform" class="form-horizontal" role="form" method="post" action="login.php">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="userEmail" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <button id="btn-login" class="btn btn-success" type="submit" name="login">Login</button>
                    </div>

                    <div class="form-group signup-link">
                        Belum punya akun? <a href="signUp.php">Sign Up disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
