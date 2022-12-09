<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student List - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>


<?php include 'view/header.php';

spl_autoload_register(function ($class) {
    include "model/{$class}Class.php";
});

$db = new DBManager();
?>

<div id="layoutSidenav_content">


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Student List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                <li class="breadcrumb-item active">Student List</li>
            </ol>




            <div class=" vertical-left">
                <div class="container" style="text-align: left;">

                    <?php
                    $students = $db->getAllStudents();
                    $assessments = $db -> getAllAssessment();
                    ?>

                    <div class="hello" id="accordionExample">
                        <?php for ($i = 0; $i < count($students); $i++) { ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                    <button class="accordion-button <?php echo ($i > 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i == 0) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                                        <?php echo $students[$i]['firstName'] . " " . $students[$i]['lastName'] ?>
                                        
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Overall Average: <?php echo "enter average here" ?></p>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>


    </main>


    <?php include 'view/footer.php' ?>

</html>