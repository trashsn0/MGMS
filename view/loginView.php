<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGMS - Grade Management System </title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>

    <div class="class= jumbotron vertical-center">

        <div class="container" style="text-align: center;">
            <h1>Login Form</h1>
            <br>
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Error!</strong> Invalid Credentials
                </div>

            <?php endif; ?>
            <form action="../controller/loginController.php" method="post">

                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext border border-dark" id="username" name="username">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lname" class="col-sm-2 col-form-label">Passsword: </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control-plaintext border border-dark" id="password" name="password">
                    </div>
                </div>

                <input type="submit" name="Login" value="Submit" class="btn-lg btn-primary">
            </form>
            <hr>
            <a class="btn-lg btn-secondary" href="registerUserView.php">Register</a>
        </div>

    </div>
</body>

</html>