<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body>

    <!-- EVENTUALLY MOVE THIS CSS TO STYLESHEET CAN RENAME IDS IF YOU WANT-->
    <style>
        #Outside {
            text-align: center;
            margin-top: 10%;
            outline: 2px solid black;
            width: 40%;
            padding: 2%;
            position: fixed;
            right: 0;
            left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        #Inside {
            display: inline-block;
        }
    </style>

    <?php session_start(); ?>

    <div id="Outside">
        <h1>Login Form</h1>
        <br>
        <div id="Inside">
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Error!</strong> Invalid Credentials
                </div>

            <?php endif; ?>
            <form action="../controller/loginController.php" method="post">
                <label for="fname">Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="lname">Passsword:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" name="Login" value="Submit">
            </form>
            <hr>
            <a href="registerUserView.php">Register</a>
        </div>

    </div>

</body>

</html>