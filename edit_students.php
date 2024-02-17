<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - English Classes</title>
</head>
<body>
    <h1>Edit Student</h1>
    <?php
    include '../PHP_dbinclude_EM/db_connect.php';

    // Check if student ID is provided
    if(isset($_GET['id'])) {
        // Sanitize the student ID
        $student_id = $_GET['id'];
        $student_id = filter_var($student_id, FILTER_SANITIZE_NUMBER_INT);

        // Prepare and execute the SQL query using a prepared statement
        $sql = "SELECT * FROM Register WHERE register_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if student record exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="process_edit_student.php" method="POST">
                <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                <label for="first_name">First Name:</label><br>
                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>"><br>
                <label for="last_name">Last Name:</label><br>
                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>"><br>
                <label for="reason">Why they want to learn the language:</label><br>
                <input type="text" id="reason" name="reason" value="<?php echo htmlspecialchars($row['description']); ?>"><br>
                <label for="level">Level:</label><br>
                <input type="text" id="level" name="level" value="<?php echo htmlspecialchars($row['level']); ?>"><br>
                <label for="lessons_balance">Lessons Balance:</label><br>
                <input type="number" id="lessons_balance" name="lessons_balance" value="<?php echo htmlspecialchars($row['lessons_balance']); ?>"><br>
                <input type="submit" value="Update Student">
            </form>
    <?php
        } else {
            echo "Student not found";
        }

        // Close prepared statement
        $stmt->close();
    } else {
        echo "Student ID is not provided";
    }

    // Close database connection
    $conn->close(); 
    ?>
</body>
</html>
