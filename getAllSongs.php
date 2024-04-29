<?php
include 'utils.php';

$songs = getAllSongs();

// include this PHP script within a page that displays songs
// we can loop in HTML to list all songs
// do the same for getAllreviews();
foreach ($songs as $song) {
    echo "<div>";
    echo "<h4>" . htmlspecialchars($song['songTitle']) . "</h4>";
    echo "<p>Genre: " . htmlspecialchars($song['genre']) . "</p>";
    echo "<p>Released: " . htmlspecialchars($song['releaseYear']) . "</p>";
    echo "</div>";
}
?>
