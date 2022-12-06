<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My Assesments - MGMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>


<?php include 'view/header.php'; ?>

<div id="layoutSidenav_content">


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">My Assesments</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                <li class="breadcrumb-item page">My Assesments</li>
            </ol>





            <!DOCTYPE html>
            <html>

            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    .collapsible {
                        display: block;
                        text-transform: uppercase;
                        text-align: center;
                        padding: 1rem;
                        color: #fff;
                        background: #343a40;
                        cursor: pointer;
                        border-radius: 7px;
                        transition: all 0.25s ease-out;
                    }

                    .active,
                    .collapsible:hover {
                        background-color: #555;
                    }

                    .collapsible:hover .arrow {
                        -webkit-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);

                    }

                    .collapsible:active .arrow.left {
                        -webkit-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);

                    }

                    .content {
                        padding: 0 18px;
                        max-height: 0;
                        overflow: hidden;
                        transition: max-height 0.2s ease-out;
                        background-color: #f1f1f1;
                    }

                    .arrow {
                        border: solid black;
                        border-width: 0 3px 3px 0;
                        display: inline-block;
                        padding: 6px;
                        transform: rotate(135deg);
                        -webkit-transform: rotate(135deg);
                        transition: transform .2s ease-in-out;
                    }



                    .down {
                        border: solid black;
                        border-width: 0 3px 3px 0;
                        display: inline-block;
                        padding: 6px;
                        transform: rotate(45deg);
                        -webkit-transform: rotate(45deg);
                        transition: transform .2s ease-in-out;
                    }
                </style>
            </head>

            <body>

                
                <button class="collapsible">
                    <table>

                        <tr style="width: 2500px;">
                            <th style="width: 3000px; text-align:left; padding-left: 25px;">Assessment 1</th>
                            <th style="width: 1200px; text-align: center;">Weight 10%</th>
                            <th style="width: 1200px; text-align: center;">Grade 15/20</th>
                            <th class="arrow"></th>
                        </tr>
                    </table>
                </button>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat.</p>
                </div>

                <button class="collapsible">
                    <table>
                        <tr>
                            <th style="width: 3000px; text-align:left; padding-left: 25px;">Assessment 2</th>
                            <th style="width: 1200px; text-align: center;">Weight 10%</th>
                            <th style="width: 1200px; text-align: center;">Grade 25/30</th>
                            <th class="arrow"></th>
                        </tr>
                    </table>
                </button>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat.</p>
                </div>
                <button class="collapsible">
                    <table>
                        <tr>
                            <th style="width: 3000px;">Midterm</th>
                            <th style="width: 1200px; text-align: center;">Weight 30%</th>
                            <th style="width: 1200px; text-align: center;">Grade 28/40</th>
                            <th class="arrow"></th>
                        </tr>
                    </table>
                </button>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat.</p>
                </div>


                <script>
                    var coll = document.getElementsByClassName("collapsible", );
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.maxHeight) {
                                content.style.maxHeight = null;
                            } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                            }
                        });
                    }
                </script>

                <script>

                </script>


            </body>

            </html>


    </main>


    <?php include 'view/footer.php' ?>

</html>