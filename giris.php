<?php session_start();
ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Topluluk Yönetim Paneli - Giriş</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="login-form">

        <form action="giris.php" method="post">
            <h2 class="text-center">Giriş</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="kadi" placeholder="Kullanıcı Adı" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="sifre" placeholder="Parola" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
            </div>
            <div class="clearfix"><?php
                                    if (isset($_POST["kadi"]) && $_POST["kadi"] == "root" && $_POST["sifre"] == "root") {
                                        echo "test";
                                        $_SESSION["kadi"] = $_POST["kadi"];
                                        header("Location: index.php");
                                    } else if (isset($_POST["kadi"])) {
                                        echo '<p style="color: red;text-align: center;font-weight: bold;">Kullanıcı adı veya şifre yanlıştı!</p>';
                                    }
                                    ?>
            </div>
        </form>
    </div>
</body>

</html>
