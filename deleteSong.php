<?php
include 'utils.php';

if (isset($_POST['submit'])) {
    $songID = $_POST['songID'];

    deleteSong($songID);

    header("Location: songs.php"); // Change the location
    exit;
}
?>
