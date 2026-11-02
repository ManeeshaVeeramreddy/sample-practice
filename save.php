
<?php

$conn = mysqli_connect("db", "root", "root123", "student_db");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$roll = $_POST['roll'];
$department = $_POST['department'];

$sql = "INSERT INTO students (name, roll, department)
        VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "sss", $name, $roll, $department);

if (mysqli_stmt_execute($stmt)) {
    echo "Student details saved successfully!";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>

