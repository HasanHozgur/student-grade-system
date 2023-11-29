<?php
session_start();
require 'config/database.php';

//DELETE START
if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Delete Failed";
        header("Location: index.php");
        exit(0);
    }
}
//DELETE END

//UPDATE START
if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $last_name = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "UPDATE students SET name='$name',last_name='$last_name',email='$email' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Update Failed";
        header("Location: index.php");
        exit(0);
    }
}
//UPDATE END

//SAVE START
if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $last_name = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "INSERT INTO students (name,last_name,email) VALUES ('$name','$last_name','$email')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Student Created";
        header("Location: student-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Fail to Add Student";
        header("Location: student-create.php");
        exit(0);
    }
}
//SAVE END
