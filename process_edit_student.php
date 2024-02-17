<?php
// Include the database
include '../PHP_dbinclude_EM/db_connect.php'; 

// Get form data
$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$reason = $_POST['reason'];
$level = $_POST['level'];
$lessons_balance = $_POST['lessons_balance'];

// Prepare SQL update stateme
$sql = "UPDATE Register SET first_name=?, last_name=?, description=?, level=?, lessons_balance=? WHERE register_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssii", $first_name, $last_name, $reason, $level, $lessons_balance, $student_id);

// Execute SQL update statement
if ($stmt->execute()) {
    echo "Student information updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Clos statement and conntion
$stmt->close();
$conn->close();
?>

