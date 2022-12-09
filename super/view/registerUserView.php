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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="../index.html">MGMS</a>
        </div>
    </nav>

    <div class="vertical-center">
        <div class="container" style="text-align: center;">
            <h1>Register Form</h1>
            <br>
            <?php if (isset($_SESSION['Error'])) : ?>
                <div class="alert alert-danger fade in alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Error! </strong> <?php echo $_SESSION['Error']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])) : ?>
                <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button><strong>Success!</strong> User Has Been Created
                </div>
            <?php endif; ?>
            <form action="../controller/registerUserController.php" method="post">

                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext border border-dark" id="username" name="username" value=<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : '' ?>>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Passsword: </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control-plaintext border border-dark" id="password" name="password" value=<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : '' ?>>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Passsword: </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control-plaintext border border-dark" id="confirmPassword" name="confirmPassword" value=<?php echo (isset($_SESSION['confirmPassword'])) ? $_SESSION['confirmPassword'] : '' ?>>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="firstName" class="col-sm-2 col-form-label">First Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext border border-dark" id="firstName" name="firstName" value=<?php echo (isset($_SESSION['firstName'])) ? $_SESSION['firstName'] : '' ?>>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="firstName" class="col-sm-2 col-form-label">Last Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext border border-dark" id="lastName" name="lastName" value=<?php echo (isset($_SESSION['lastName'])) ? $_SESSION['lastName'] : '' ?>>
                    </div>
                </div>

                <input class="btn btn-block btn-primary" style="width: 20%;" type="submit" name="Register" value="Submit">
            </form>
            <hr>
            <a class="btn btn-block btn-secondary" style="width: 20%;" href="loginView.php">Login</a>
        </div>

    </div>

    <?php
    session_destroy();
    unset($_SESSION['Error']);
    ?>

</body>

</html>