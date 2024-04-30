SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS music_platform;
USE music_platform;


CREATE TABLE `User` (
`userID` INT AUTO_INCREMENT PRIMARY KEY,
`firstName` VARCHAR(255),
`lastName` VARCHAR(255), 
'email' VARCHAR(255), 
'password' VARCHAR(255) 
);

-- CREATE TABLE 'Account'(
--     'email' PRIMARY KEY VARCHAR(255),
--      'password' VARCHAR(255)
-- )

INSERT INTO `User` VALUES
(1, 'Kaitlyn', 'Wee', 'kait@gmail.com'),
(2, 'Jordan', 'Burton', 'jordan@gmail.com'),
(3, 'Nicole', 'DeFrancesco', 'nicole@gmail.com'),
(4, 'Joe', 'Smith', 'musiclove@yahoo.com'),
(5, 'Molly', 'Marcus', 'mm17@aol.com'),
(6, 'Mickey', 'Mouse', 'mickey@mouse.com'),
(7, 'Sally', 'Seashell', 'sallysea@yahoo.com'),
(8, 'Polly', 'Pocket', 'pollypocket@virginia.edu'),
(9, 'Humpty', 'Dumpty', 'humptydumpty17@gmail.com'),
(10, 'Calvin', 'Klein', 'ck@yahoo.com'),
(11, 'Marc', 'Jacobs', 'marcjacobs@marcjacobs.com'),
(12, 'Ariel', 'Mermaid', 'ariel@gmail.com'),
(13, 'Jane', 'Doe', 'janedoe10@gmail.com'),
(14, 'John', 'Doe', 'johndoe10@gmail.com'),
(15, 'Olivia', 'Suchocki', 'liv@virginia.edu');


CREATE TABLE `Profile` (
`profileID` INT PRIMARY KEY,
`userID` INT,
FOREIGN KEY (`userID`) REFERENCES `User`(`userID`)
);

INSERT INTO `Profile` VALUES
(1, 1),
(2, 2),
(3, 3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11),
(12,12),
(13,13),
(14,14),
(15,15);

CREATE TABLE `Artist` (
`artistID` INT PRIMARY KEY,
`artistName` VARCHAR(255),
`firstName` VARCHAR(255),
`lastName` VARCHAR(255),
`genre` VARCHAR(255)
);

INSERT INTO `Artist` VALUES
(1, 'Kenny Chesney', 'Kenny', 'Chesney', 'Country'),
(2, 'Taylor Swift', 'Taylor', 'Swift', 'Pop'),
(3, 'Camila Cabello', 'Camila', 'Cabello', 'Electronic'),
(4, 'Jennifer Lopez', 'Jennifer', 'Lopez', 'Pop'),
(5, 'Zach Bryan', 'Zach', 'Bryan', 'Country'),
(6, 'Mac Miller', 'Mac', 'Miller', 'Rap'),
(7, 'Johnny Cash', 'Johnny', 'Cash', 'Rock'),
(8, 'Harry Styles', 'Harry', 'Styles', 'Indie'),
(9, 'Noah Kahan', 'Noah', 'Kahan', 'Folk'),
(10, '21 Savage', '21', 'Savage', 'Rap'),
(11, 'Keith Urban', 'Keith', 'Urban', 'Country'),
(12, 'Sam Hunt', 'Sam', 'Hunt', 'Country'),
(13, 'Bad Bunny', 'Bad', 'Bunny', 'Latin Pop'),
(14, 'Katy Perry', 'Katy', 'Perry', 'Pop'),
(15, 'Dom Dolla', 'Dom', 'Dolla', 'Electronic'),
(16, 'Fred Again...', 'Fred', 'Again', 'Electronic'),
(17, 'Justin Bieber', 'Justin', 'Bieber', 'Pop'),
(18, 'David Guetta', 'David', 'Guetta', 'Electronic'),
(19, 'Sean Kingston', 'Sean', 'Kingston', 'Pop'),
(20, 'Bob Marley', 'Bob', 'Marley', 'Reggae');


CREATE TABLE `Song` (
`songID` INT PRIMARY KEY,
`songTitle` VARCHAR(255),
`genre` VARCHAR(255)
);

INSERT INTO `Song` VALUES
(1, 'American Kids', 'Country'),
(2, 'Style', 'Pop'),
(3, 'Bam Bam', 'Electronic'),
(4, 'The Floor', 'Pop'),
(5, 'Dawns', 'Country'),
(6, 'Ladders', 'Rap'),
(7, 'Ring of Fire', 'Rock'),
(8, 'Kiwi', 'Pop'),
(9, 'Orange Juice', 'Folk'),
(10, 'a lot', 'Rap'),
(11, 'The Fighter', 'Country'),
(12, 'Make You Miss Me', 'Country'),
(13, 'Titi Me Pregunto', 'Latin Pop'),
(14, 'Firework', 'Pop'),
(15, 'Rhyme Dust', 'Electronic');

CREATE TABLE `Review` (
`reviewID` INT PRIMARY KEY,
`title` VARCHAR(255),
`description` TEXT,
`userID` INT,
FOREIGN KEY (`userID`) REFERENCES `User`(`userID`)
);

INSERT INTO `Review` VALUES
(1, 'Best Country Song', 'Listen to this song everyday!', 1, 1),
(2, 'Favorite Taylor Swift Song', 'I memorize every single word.', 2, 2),
(3, 'So catchy', 'Song plays in my head 24/7.', 3, 3),
(4, 'On repeat', 'I cant stop listening', 4, 4),
(5, 'So sad','Such a sad song but I love it', 5, 5),
(6, 'Underrated', 'This song needs more love!', 6, 6),
(7, 'SUCH a classic', 'I love it, it will never get old', 7, 7),
(8, 'Not my favorite', 'Its so good but I feel like the album has besster songs', 8, 8),
(9, 'LOVE', 'My newest song and artist obsession!', 9, 9),
(10, 'Re-discovered', 'Foudn this song again and I forgot how good it is', 10, 10);

CREATE TABLE `Feed` (
`feedID` INT PRIMARY KEY
);

INSERT INTO `Feed` VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15);

CREATE TABLE `User_Favorites_Song` (
`userID` INT,
`songID` INT,
PRIMARY KEY (`userID`, `songID`),
FOREIGN KEY (`userID`) REFERENCES `User`(`userID`),
FOREIGN KEY (`songID`) REFERENCES `Song`(`songID`)
);

INSERT INTO `User_Favorites_Song` VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 15),
(5, 14),
(6, 13),
(7, 12),
(8, 11),
(9, 10),
(10, 9),
(11, 8),
(12, 7),
(13, 6),
(14, 5),
(15, 4);

CREATE TABLE `User_Creates_Review` (
`userID` INT,
`reviewID` INT,
PRIMARY KEY (`userID`, `reviewID`),
FOREIGN KEY (`userID`) REFERENCES `User`(`userID`),
FOREIGN KEY (`reviewID`) REFERENCES `Review`(`reviewID`)
);

INSERT INTO `User_Creates_Review` VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11),
(12,12),
(13,13),
(14,14),
(15, 15);

CREATE TABLE `Review_Posts_To_Feed` (
`reviewID` INT,
`feedID` INT,
`time` DATETIME,
PRIMARY KEY (`reviewID`, `feedID`),
FOREIGN KEY (`reviewID`) REFERENCES `Review`(`reviewID`),
FOREIGN KEY (`feedID`) REFERENCES `Feed`(`feedID`)
);

INSERT INTO `Review_Posts_To_Feed` VALUES
(1, 1, '2024-03-25 12:00:00'),
(2, 2, '2024-03-26 12:00:00'),
(3, 3, '2024-03-27 12:00:00'),
(4, 4, '2024-03-28 12:00:00'),
(5, 5, '2024-03-29 12:00:00'),
(6, 6, '2024-03-30 12:00:00'),
(7, 7, '2024-03-10 12:00:00'),
(8, 8, '2024-03-11 12:00:00'),
(9, 9, '2024-03-12 12:00:00'),
(10, 10, '2024-03-13 12:00:00'),
(11, 11, '2024-03-14 12:00:00'),
(12, 12, '2024-03-15 12:00:00'),
(13, 13, '2024-03-16 12:00:00'),
(14, 14, '2024-03-17 12:00:00'),
(15, 15, '2024-03-18 12:00:00');

CREATE TABLE `Artist_Song` (
`artistID` INT,
`songID` INT,
PRIMARY KEY (`artistID`, `songID`),
FOREIGN KEY (`artistID`) REFERENCES `Artist`(`artistID`),
FOREIGN KEY (`songID`) REFERENCES `Song`(`songID`)
);

INSERT INTO `Artist_Song` VALUES
(1, 1),
(2, 2),
(3, 3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(1, 11),
(2, 12);

ALTER TABLE `User` ADD COLUMN `email` VARCHAR(255) AFTER `lastName`;

UPDATE `User` SET `email` = 'kaitlynwee@gmail.com' WHERE `userID` = 1;
UPDATE `User` SET `email` = 'jordan@virginia.com' WHERE `userID` = 2;
UPDATE `User` SET `email` = 'nicole@yahoo.com' WHERE `userID` = 3;
UPDATE `User` SET `email` = 'musicluv@gmail.com' WHERE `userID` = 4;
UPDATE `User` SET `email` = 'spamemail@yahoo.com' WHERE `userID` = 5;
UPDATE `User` SET `email` = 'coolsongs@alo.net' WHERE `userID` = 6;
UPDATE `User` SET `email` = 'taylorSwiftFan@gmail.com' WHERE `userID` = 7;
UPDATE `User` SET `email` = 'CalCal@yahoo.com' WHERE `userID` = 10;
UPDATE `User` SET `email` = 'MrDumpty@yahoo.com' WHERE `userID` = 9;
UPDATE `User` SET `email` = 'MissPolly@yahoo.com' WHERE `userID` = 8;
UPDATE `User` SET `email` = 'Calvin@yahoo.com' WHERE `userID` = 10;
UPDATE `User` SET `email` = 'MJacobs@gmail.com' WHERE `userID` = 11;
UPDATE `User` SET `email` = 'littlemermaid@gmail.com' WHERE `userID` = 12;
UPDATE `User` SET `email` = 'msdoe@alo.net' WHERE `userID` = 13;
UPDATE `User` SET `email` = 'johndoe@gmail.com' WHERE `userID` = 14;
UPDATE `User` SET `email` = 'liv@virginia.edu' WHERE `userID` = 15;



ALTER TABLE `Song` ADD COLUMN `releaseYear` INT AFTER `genre`;

UPDATE `Song` SET `releaseYear` = 2014 WHERE `songID` = 1;
UPDATE `Song` SET `releaseYear` = 2023 WHERE `songID` = 2;
UPDATE `Song` SET `releaseYear` = 2022 WHERE `songID` = 3;
UPDATE `Song` SET `releaseYear` = 2011 WHERE `songID` = 4;
UPDATE `Song` SET `releaseYear` = 2023 WHERE `songID` = 5;
UPDATE `Song` SET `releaseYear` = 2018 WHERE `songID` = 6;


ALTER TABLE `Review` ADD COLUMN `rating` INT AFTER `description`;

UPDATE `Review` SET `rating` = 5 WHERE `reviewID` = 1;
UPDATE `Review` SET `rating` = 4 WHERE `reviewID` = 2;
UPDATE `Review` SET `rating` = 4 WHERE `reviewID` = 3;

DELETE FROM `Review_Posts_To_Feed`
WHERE reviewID = 1;

DELETE FROM `User_Creates_Review`
WHERE reviewID = 1;

DELETE FROM `Review`
WHERE reviewID = 1;

DELIMITER //
CREATE PROCEDURE GetUserReviews(IN p_userID INT)
BEGIN
   SELECT * FROM Review WHERE userID = p_userID;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER UpdateFeedAfterReviewInsert
AFTER INSERT ON Review
FOR EACH ROW
BEGIN
   INSERT INTO Feed (feedID) VALUES (NEW.reviewID);
END//
DELIMITER ;

COMMIT;

SELECT COUNT(*) FROM `User`;
SELECT COUNT(*) FROM `Profile`;
SELECT COUNT(*) FROM `Artist`;
SELECT COUNT(*) FROM `Song`;
SELECT COUNT(*) FROM `Feed`;
SELECT COUNT(*) FROM `Review`;
SELECT COUNT(*) FROM `User_Favorites_Song`;
SELECT COUNT(*) FROM `User_Creates_Review`;
SELECT COUNT(*) FROM `Review_Posts_To_Feed`;
SELECT COUNT(*) FROM `Artist_Song`;


SELECT * FROM `User`;
SELECT * FROM `Profile`;
SELECT * FROM `Artist`;
SELECT * FROM `Song`;
SELECT * FROM `Feed`;
SELECT * FROM `Review`;
SELECT * FROM `User_Favorites_Song`;
SELECT * FROM `User_Creates_Review`;
SELECT * FROM `Review_Posts_To_Feed`;
SELECT * FROM `Artist_Song`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Sort songs in Song table by releaseYear -- 
SELECT * FROM `Song` ORDER BY `releaseYear` DESC;

-- Filter + show songs based on the number of times they are favorited -- 
SELECT 
  s.songTitle,
  s.genre,
  COUNT(ufs.songID) AS favorite_count
FROM 
  Song s
  INNER JOIN User_Favorites_Song ufs ON s.songID = ufs.songID
GROUP BY 
  s.songID, s.songTitle, s.genre
ORDER BY 
  favorite_count DESC
LIMIT 10;  -- Adjust the limit to show the top 10 most popular songs


-- export to CSV format
SELECT `userID`, `firstName`, `lastName`, `email`
INTO OUTFILE '/tmp/users.csv'
FIELDS TERMINATED BY ',' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
FROM `User`;

-- Commit the transaction
COMMIT;

USE music_platform; 
CREATE ROLE IF NOT EXISTS `admin_user_role`;  

GRANT UPDATE, DELETE, SELECT ON music_platform.User TO 'admin_user_role';  
GRANT UPDATE, DELETE, SELECT ON music_platform.Artist TO 'admin_user_role';  
GRANT UPDATE, DELETE, SELECT ON music_platform.Artist_Song TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.Feed TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.Profile TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.Review TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.Review_Posts_To_Feed TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.Song TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.User_Creates_Review TO 'admin_user_role';
GRANT UPDATE, DELETE, SELECT ON music_platform.User_Favorites_Song TO 'admin_user_role';


CREATE USER (http://localhost/phpmyadmin/url.php?url=https://dev.mysql.com/doc/refman/8.0/en/information-functions.html%23function_user) 'music_platform_admin'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT USAGE ON *.* TO 'music_platform_admin'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HO
UR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `music\_platform`.* TO 'music_platform_admin'@'%'

GRANT 'admin_user_role' TO 'music_platform_admin'@'%'; 