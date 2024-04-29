<?php
include 'utils.php';

$songs = getAllSongs();

// You can include this PHP script within a page that displays songs
// For example, a loop in your HTML to list all songs
foreach ($songs as $song) {
    echo "<div>";
    echo "<h4>" . htmlspecialchars($song['songTitle']) . "</h4>";
    echo "<p>Genre: " . htmlspecialchars($song['genre']) . "</p>";
    echo "<p>Released: " . htmlspecialchars($song['releaseYear']) . "</p>";
    echo "</div>";
}
?>
