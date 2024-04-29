<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Songs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1>All Songs</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Release Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'utils.php'; // Ensure the path to utils.php is correct
                        $songs = getAllSongs();
                        foreach ($songs as $song) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($song['songTitle']) . "</td>";
                            echo "<td>" . htmlspecialchars($song['genre']) . "</td>";
                            echo "<td>" . htmlspecialchars($song['releaseYear']) . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery are included for the Bootstrap components to function properly -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
