<?php
include 'utils.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $userID = $_POST['userID']; // Make sure the user ID is fetched securely

    addReview($title, $description, $rating, $userID);

    // Redirect to a confirmation page or back to the review page
    header("Location: reviews.php"); // Adjust the location as needed
    exit;
}
?>
