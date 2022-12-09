<?php
include "dashboardHeaderView.php";

spl_autoload_register(function ($class) {
    include "../model/{$class}Class.php";
});

$db = new DBManager();
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <div class="vertical-center">
        <div class="container" style="text-align: center;">
            <h1>Create Assessment</h1>
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
                    </button><strong>Success!</strong> Assessment Has Been Created
                </div>
            <?php endif; ?>
            <form action="../controller/createAssessmentController.php" method="post">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext border border-dark" id="name" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="weight" class="col-sm-2 col-form-label">Weight: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control-plaintext border border-dark" id="weight" name="weight">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="numberOfQuestions" class="col-sm-2 col-form-label">Number Of Questions: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control-plaintext border border-dark" id="numberOfQuestions" name="numberOfQuestions" min="1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dueDate" class="col-sm-2 col-form-label">Due Date: </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control-plaintext border border-dark" id="dueDate" name="dueDate">
                    </div>
                </div>


                <input class="btn btn-block btn-primary" style="width: 20%;" type="submit" name="createAssessment" value="Submit">
            </form>
        </div>

    </div>

    <?php
    unset($_SESSION['Error']);
    ?>

</body>

</html>