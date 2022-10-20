<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Register</title>
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
        <h1>Register Form</h1>
        <br>
        <div id="Inside">
            <?php if (isset($_SESSION['Error'])) : ?>
                <div class="alert alert-danger fade in alert-dismissible show">
                    <h1 class=""><?php echo $_SESSION['Error']; ?></h1>
                </div>
            <?php endif; ?>
            <form action="../controller/registerUserController.php" method="post">
                <!-- PUT REGISTER CONTROLLER HERE -->
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>

                <label for="password">Passsword:</label><br>
                <input type="password" id="password" name="password"><br>

                <label for="confirmPassword">Confirm Passsword:</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword"><br>

                <label for="firstName">First Name:</label><br>
                <input type="text" id="firstName" name="firstName"><br>

                <label for="lastName">Last Name:</label><br>
                <input type="text" id="lastName" name="lastName"><br><br>

                <input type="submit" name="Register" value="Submit">
            </form>
            <hr>
            <a href="loginView.php">Login</a> <!-- PUT REGISTER PAGE IN HREF HERE -->
        </div>

    </div>

    <?php unset($_SESSION['Error']); ?>

</body>

</html>