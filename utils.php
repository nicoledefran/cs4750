<?php
require_once 'connect-db.php';

function addSong($songTitle, $genre, $releaseYear) {
    global $db;

    try {
        $sql = "INSERT INTO Song (songTitle, genre, releaseYear) VALUES (:songTitle, :genre, :releaseYear)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':songTitle', $songTitle);
        $statement->bindValue(':genre', $genre);
        $statement->bindValue(':releaseYear', $releaseYear);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error adding song: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
        }
    }
}

function updateSong($songID, $songTitle, $genre, $releaseYear) {
    global $db;

    try {
        $query = "UPDATE Song SET songTitle = :songTitle, genre = :genre, releaseYear = :releaseYear WHERE songID = :songID";
        $statement = $db->prepare($query);
        $statement->bindValue(':songID', $songID);
        $statement->bindValue(':songTitle', $songTitle);
        $statement->bindValue(':genre', $genre);
        $statement->bindValue(':releaseYear', $releaseYear);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error updating song: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
        }
    }
}

function deleteSong($songID) {
    global $db;

    try {
        $query = "DELETE FROM Song WHERE songID = :songID";
        $statement = $db->prepare($query);
        $statement->bindValue(':songID', $songID);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error deleting song: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
        }
    }
}

function addFavoriteSong($email, $songID) {
    global $db;

    try {
        $query = "INSERT INTO User_Favorites_Song (email, songID) VALUES (:email, :songID)";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':songID', $songID);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error adding favorite song: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
        }
    }
}

function removeFavoriteSong($email, $songID) {
    global $db;

    try {
        $query = "DELETE FROM User_Favorites_Song WHERE email = :email AND songID = :songID";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':songID', $songID);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error removing favorite song: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
        }
    }
}

function addReview($title, $description, $rating, $email) {
    global $db;

    try {
        $query = "INSERT INTO Review (title, description, rating, email) VALUES (:title, :description, :rating, :email)";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':email', $email);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error adding review: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
        }
    }
}

function getAllSongs() {
    global $db;

    try {
        $query = "SELECT * FROM Song";
        $statement = $db->prepare($query);
        $statement->execute();
        $songs = $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error getting all songs: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
            return $songs;
        }
    }
}

function getAllReviews() {
    global $db;

    try {
        $query = "SELECT * FROM Review";
        $statement = $db->prepare($query);
        $statement->execute();
        $reviews = $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error getting all reviews: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
            return $reviews;
        }
    }
}

function searchSongsByTitle($title) {
    global $db;

    try {
        $query = "SELECT * FROM Song WHERE songTitle LIKE :title";
        $title = "%".$title."%";
        $statement = $db->prepare($query);
        $statement->execute([':title' => $title]);
        $songs = $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error searching song: " . $e->getMessage();
    } finally {
        if (isset($statement)) {
            $statement->closeCursor();
            return $songs;
        }
    }
}

function createUser($email, $first, $last, $pass){
    global $db;

    $query = "INSERT INTO Users VALUES (:email, :first, :last, :pass);
    INSERT INTO email_addresses VALUES (:username, :email);
    ";
    $statement = $db->prepare($query);
    $statement->bindValue(':first', $first);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':last', $last);
    $statement->bindValue(':pass', $pass);
    
    $statement->execute();

    $statement->closeCursor();

}

function getUserInfo($email){
    global $db;

    $email = "'". $email . "'";

    $query = "SELECT * FROM Users WHERE username = $email;";
    $statement = $db->prepare($query);
    $statement->execute();

    $userinfo = $statement->fetchAll();

    $statement->closeCursor();

    return $userinfo;
}



/*
function getAllUsers($email){
    global $db;

    $query = "SELECT email, is_admin FROM account where username <> :username ";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();

    return $users;
}*/

/*
function getUserAdmin($uname){
    global $db;

    $query = "SELECT is_admin FROM account where username = :username ";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $uname);
    $statement->execute();
    $user = $statement->fetch();
    $user = $user['is_admin'];
    $statement->closeCursor();

    return $user;
}
*/


?>
