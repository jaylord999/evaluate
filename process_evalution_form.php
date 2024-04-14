<?php
require_once 'db_connection.php';

// Retrieve form data
$teachingEffectiveness = $_POST['teachingEffectiveness'];
$subjectMatterExpertise = $_POST['subjectMatterExpertise'];
$courseOrganization = $_POST['courseOrganization'];
$studentSupport = $_POST['studentSupport'];
$researchDevelopment = $_POST['researchDevelopment'];
$classroomManagement = $_POST['classroomManagement'];
$technologyUse = $_POST['technologyUse'];
$overallRating = $_POST['overallRating'];
$overallComments = $_POST['overallComments'];
$provideFeedback = isset($_POST['provideFeedback']) ? 1 : 0;
$staffEvaluationId = $_POST['staffEvaluationId'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO staff_evaluation_responses (staff_evaluation_id, teaching_effectiveness, subject_matter_expertise, course_organization, student_support, research_development, classroom_management, technology_use, overall_rating, overall_comments, provide_feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssssiss", $staffEvaluationId, $teachingEffectiveness, $subjectMatterExpertise, $courseOrganization, $studentSupport, $researchDevelopment, $classroomManagement, $technologyUse, $overallRating, $overallComments, $provideFeedback);

if ($stmt->execute()) {
  // Redirect to a success page or display a success message
  header("Location: success.php");
  exit;
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>