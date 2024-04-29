<?php
include 'utils.php';

if (isset($_POST['add_favorite'])) {
    $userID = $_POST['userID'];
    $songID = $_POST['songID'];

    addFavoriteSong($userID, $songID);
}

if (isset($_POST['remove_favorite'])) {
    $userID = $_POST['userID'];
    $songID = $_POST['songID'];

    removeFavoriteSong($userID, $songID);
}

header("Location: favorites.php"); // Change Location
exit;
?>
