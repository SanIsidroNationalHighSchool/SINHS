<?php

// Get the form data
$lrn = $_POST['lrn'];
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$sy = $_POST['sy'];
$strand = $_POST['strand'];
$gradelevel = $_POST['gradelevel'];


$host = "localhost";
$dbname = "enrol";
$username = "root";
$password = " ";

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

                       // Check connection
if (mysqli_connect_errno) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `registration` (`lrn`, `fullname`, `gender`, `birthdate`, `sy`, `strand`, `gradelevel`) VALUES (NULL, '', '', '', '', '', '') ";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "isiisss",
                       $lrn,
                       $fullname,
                       $gender,
                       $birthdate,
                       $sy,
                       $strand,
                       $gradelevel);

mysqli_stmt_execute($stmt);

echo "Record Saved.";