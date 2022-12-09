<?php 
                        session_start();
                        if (isset($_SESSION['loggedInUser'])) {
                            if ($_SESSION['loggedInUser']['accessLevel'] == 1) {
                                echo "teacher";
                                header("Location: ../profdash.php");
                                }
                            elseif ($_SESSION['loggedInUser']['accessLevel'] == 0) {
                                echo "student";
                                header("Location: ../studentdash.php");
                            }
                        }
                        else {
                            echo "not logged in";
                            header("Location: ../index.php");
                        }
                        exit();
?>