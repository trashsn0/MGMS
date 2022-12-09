<?php
spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

include "view/header.php";

$db = new DBManager();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Create Assesment - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGMS - Grade Management System </title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <style>
        input[type=text] {
            padding: 6px 10px;
        }

        input[type=password] {
            padding: 6px 10px;
        }

        input[type=date] {
            padding: 6px 10px;
        }
    </style>

</head>



<body>



    <div id="layoutSidenav_content">

        <div class="container-fluid px-4">





            <div class="container" style="text-align: center; margin-top: 5%;">





                <h1>View Profile</h1>
                <hr>
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
                        </button><strong>Success!</strong> User Has Been Updated
                    </div>
                <?php endif; ?>
                <form action="controller/profileController.php" method="POST" id="myForm">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext border border-dark" id="username" name="username" disabled value=<?php echo $_SESSION['loggedInUser']['username'] ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">First Name: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext border border-dark" id="firstName" name="firstName" disabled value=<?php echo $_SESSION['loggedInUser']['firstName'] ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastName" class="col-sm-2 col-form-label">Last Name: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext border border-dark" id="lastName" name="lastName" disabled value=<?php echo $_SESSION['loggedInUser']['lastName'] ?>>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <input class="btn btn-primary" style="width: 20%;" id="edit" type="button" value="Edit Account Information">
                            <input class="btn btn-success" style="width: 20%;" hidden id="save" name="save" type="submit" value="Save">
                            <input class="btn btn-danger" style="width: 20%;" hidden id="cancel" type="button" value="Cancel">
                        </div>
                    </div>
                </form>

                <br>
                <hr>
                <br>
                <h3>Change Passwrod</h3>
                <?php if (isset($_SESSION['passwordError'])) : ?>
                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                        </button><strong>Error! </strong> <?php echo $_SESSION['passwordError']; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['passwordChanged'])) : ?>
                    <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                        </button><strong>Success!</strong> Password Has Been Updated
                    </div>
                <?php endif; ?>
                <form action="controller/profileController.php" method="POST">
                    <div class="form-group row">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Old Password: </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control-plaintext border border-dark" id="oldPassword" name="oldPassword">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newPassword" class="col-sm-2 col-form-label">New Password: </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control-plaintext border border-dark" id="newPassword" name="newPassword">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newPasswordConfirmation" class="col-sm-2 col-form-label">New Password Confirmation: </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control-plaintext border border-dark" id="newPasswordConfirmation" name="newPasswordConfirmation">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <input class="btn btn-primary" style="width: 20%;" id="changePassword" name="changePassword" type="submit" value="Change Password">
                        </div>
                    </div>
                </form>


            </div>

        </div>

        <?php include 'view/footer.php'; ?>

    </div>
</body>



<?php
// include 'view/footer.php';
unset($_SESSION['Error']);
unset($_SESSION['passwordError']);
?>
<script src="js/profileView.js" type="text/javascript"></script>

</body>

</html>