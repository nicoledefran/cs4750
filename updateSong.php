<?php
include 'utils.php';

if (isset($_POST['submit'])) {
    $songID = $_POST['songID'];
    $songTitle = $_POST['songTitle'];
    $genre = $_POST['genre'];
    $releaseYear = $_POST['releaseYear'];

    updateSong($songID, $songTitle, $genre, $releaseYear);

    header("Location: songs.php"); // Change the location
    exit;
}
?>
