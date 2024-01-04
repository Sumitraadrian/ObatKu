<?php
session_start();
include "includes/functions.php";
singUp();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ObatKu</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="container">
    <div id="signupbox" style="margin-top:50px" class="mainbox col-xs-12 col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
            </div>
            <?php
            message();
            ?>
            <div class="panel-body">
                <form id="signupform" class="form-horizontal" role="form" method="post" action="signUp.php">
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Alamat Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Nama Awal</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Fname" placeholder="Name Awal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Nama Akhir</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Lname" placeholder="Name Akhir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-3 control-label">Alamat</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwd" placeholder="Password">
                        </div>
                    </div>
                    <div style=" margin-left: 39px;">
                        <b> Kata sandi harus berisi hal-hal berikut:</b>
                        <ul>
                            <li>minimal 1 angka dan 1 huruf</li>
                            <li>Harus 8-30 karakter</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-xs-12 controls">
                            <input id="btn-login" class="btn btn-success" type="submit" value="Sign Up" name="singUp" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 control">
                            <div style="border-top: 1px solid #888; padding-top:15px; font-size:85%">
                                Anda sudah punya akun?!
                                <a href="login.php">
                                    Sign In Disini
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
