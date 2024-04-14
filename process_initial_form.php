<?php
require_once 'db_connection.php';

// Retrieve form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$role = $_POST['role'];
$instructorName = $_POST['instructorName'];
$department = $_POST['department'];
$courses = $_POST['courses'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO staff_evaluations (full_name, email, role, instructor_name, department, courses) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $fullName, $email, $role, $instructorName, $department, $courses);

if ($stmt->execute()) {
  // Get the generated staff evaluation ID
  $staffEvaluationId = $stmt->insert_id;

  // Redirect to the main evaluation form with the staff evaluation ID
  header("Location: evaluation_form.php?staffEvaluationId=$staffEvaluationId");
  exit;
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>