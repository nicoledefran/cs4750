<?php
$path = @parse_url($_SERVER['REQUEST_URI'])['path'];
switch ($path) {
    case '/':                   
        require 'login.php';
        break;
    case '/login.php':
        require 'login.php';
        break;
    case '/feed.php':
        require 'feed.php';
        break;
    case '/profile.php':
        require 'profile.php';
        break;
    case '/create_post.php':
        require 'create_post.php';
        break;
    case '/newaccount.php':
        require 'newaccount.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
    }
?>