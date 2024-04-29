<?php
include 'utils.php';

if (isset($_POST['submit'])) {
    $songTitle = $_POST['songTitle'];
    $genre = $_POST['genre'];
    $releaseYear = $_POST['releaseYear'];

    addSong($songTitle, $genre, $releaseYear);

    // Redirect to a confirmation page or back to the form
    header("Location: songs.php"); // Change the location
    exit;
}
?>
