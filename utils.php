<?php
require_once 'connect-db.php';

function registerUser($email, $password) {
    global $conn;  
    $query = "SELECT email FROM User WHERE email = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . mysqli_error($conn));
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        return "User already exists.";
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO User (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . mysqli_error($conn));
    }
    $stmt->bind_param('ss', $email, $hashedPassword);
    $executeSuccess = $stmt->execute();
    $stmt->close();
    if ($executeSuccess) {
        return "User registered successfully.";
    } else {
        return "Registration failed: " . mysqli_error($conn);
    }
}

function checkUser($email, $password) {
    global $conn;
    $query = "SELECT password FROM User WHERE email = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die('Prepare failed: ' . mysqli_error($conn));
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($db_password);
    if ($stmt->fetch()) {  
        if (password_verify($password, $db_password)) {
            $stmt->close();
            return true;
        }
    }
    $stmt->close();
    return false;
}

function createPost($email, $title, $description, $rating) {
    global $conn;  // Ensure that $conn is your database connection object
    $query = "INSERT INTO Review (email, title, description, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        return "Prepare failed: " . $conn->error;
    }

    $stmt->bind_param('ssss', $userEmail, $title, $description, $rating);
    if ($stmt->execute()) {
        return true;
    } else {
        return "Execute failed: " . $stmt->error;
    }
}

function getFavoriteSongs($email) {
    global $conn; 
    print_r($email);
    $query = "SELECT Song.songTitle, Song.Genre, Song.releaseYear 
              FROM User_favorites_song 
              JOIN Song ON User_favorites_song.songID = Song.songID
              WHERE User_favorites_song.email = ?";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        error_log("SQL prepare failed: " . $conn->error);
        return false;
    }

    $stmt->bind_param('s', $email);
    if (!$stmt->execute()) {
        error_log("SQL execute failed: " . $stmt->error);
        return false;
    }

    $result = $stmt->get_result();
    $songs = [];
    while ($row = $result->fetch_assoc()) {
        $songs[] = $row;
    }

    $stmt->close();
    return $songs;
}

function addFavoriteSong($email, $songTitle, $genre, $releaseYear) {
    global $conn;

    // Prepare and execute the query to get the songID
    $query = "SELECT songID FROM Song WHERE songTitle = ? AND genre = ? AND releaseYear = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        error_log("SQL prepare failed: " . $conn->error);
        return false;
    }
    $stmt->bind_param('ssi', $songTitle, $genre, $releaseYear);
    if (!$stmt->execute()) {
        error_log("SQL execute failed: " . $stmt->error);
        return false;
    }
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        error_log("Song not found with title: $songTitle, genre: $genre, year: $releaseYear");
        return "Song not found.";
    }
    $songId = $result->fetch_assoc()['songID'];
    $query = "INSERT INTO User_favorites_song (email, songId) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        error_log("SQL prepare failed: " . $conn->error);
        return false;
    }
    $stmt->bind_param('si', $email, $songId);
    if (!$stmt->execute()) {
        error_log("SQL execute failed: " . $stmt->error);
        return false;
    }
    return true; // Return true to indicate success
}
?>
