<?php
include 'utils.php';

$songs = [];
if (isset($_POST['search'])) {
    $title = $_POST['title'];
    $songs = searchSongsByTitle($title);
}

// Code to handle displaying the search results goes here
?>
