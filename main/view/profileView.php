<?php
spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

include "dashboardHeaderView.php";

$db = new DBManager();
?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <div class="vertical-center">
        <div class="container" style="text-align: center;">

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
            <form action="../controller/editUserController.php" method="POST" id="myForm">
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
            <form action="../controller/editUserController.php" method="POST">
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

    <?php
    unset($_SESSION['Error']);
    unset($_SESSION['passwordError']);
    ?>

    <script>
        var edit = document.getElementById('edit');
        var save = document.getElementById('save');
        var cancel = document.getElementById('cancel');
        var form = document.getElementById('myForm');

        edit.addEventListener('click', function() {
            for (var i = 0; i < form.length; i++) {
                form.elements[i].disabled = false;
            }
            form.elements[0].focus();
            edit.hidden = true;
            save.hidden = false;
            cancel.hidden = false;
        });

        cancel.addEventListener('click', function() {
            for (var i = 0; i < form.length; i++) {
                form.elements[i].disabled = true;
            }
            form.elements[0].focus();
            edit.hidden = false;
            edit.disabled = false;
            save.hidden = true;
            cancel.hidden = true;
        });
    </script>

</body>

</html>