<?php
require("connect-db.php");
require("utils.php");
if(isset($_POST['createPost'])){
    header("Location: create_post.php");
    exit;
}
if(isset($_POST['profileBtn'])){
    header("Location: profile.php");
    exit;
}
$review= 'SELECT * FROM Review'; // select from review table
// make query and get result 
$result = mysqli_query($conn, $review); 
// fetch resulting rows as an array
$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Nicole DeFrancesco, Jordan Burton, Kaitlyn Wee">
  <meta name="description" content="Music Database">
  <meta name="keywords" content="CS 4750">
  <title>My Feed</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="maintenance-system.css">  
</head>

<body>  
<div class="container">
  <div class="row g-3 mt-2">
    <div class="col">
      <h2>My Feed</h2>
    </div>  
  </div>

<div class = "container">
  <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return validateInput()">
    <table style="width:98%">
      <tr>
      <div class="topnav">
        <input type="text" placeholder="Search songs by title">
        </div>
      </tr>
    </table>
</div>

    <div class="row g-3 mx-auto">    
      <div class="col-4 d-grid ">
     <form action="create_post.php" method="post">
        <input type="submit" value="Create Post" name="createPost" class="btn btn-danger"/>
     </form>       
      </div>	
      <div class="col-4 d-grid ">
      <form action="profile.php" method="post">
        <input type="submit" value="Go to Profile" name="profilebtn" class="btn btn-danger"/>
     </form>   
        </div>  
  </div>  
  </form>
</div>

<hr/>
<div class="container">
<h3>Posts</h3>
<div class="row justify-content-center">  
<table class="w3-table w3-bordered w3-card-4 center" style="width:100%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="30%"><b>Review</b></th>
    <th width="30%"><b>Title</b></th>        
    <th width="30%"><b>Description</b></th> 
    <th width="30%"><b>Rating</b></th>
    <th width="30%"><b>User</b></th>
  </tr>
  </thead>
  <?php foreach ($reviews as $user_review): ?>
  <tr>
  <td><?php echo $user_review['reviewID']; ?></td>
     <td><?php echo $user_review['title']; ?></td>
     <td><?php echo $user_review['description']; ?></td>        
     <td><?php echo $user_review['rating']; ?></td>  
     <td><?php echo $user_review['userID']; ?></td>   
     <td>
  </tr>
  <?php endforeach; ?>
</table>
</div>   

<hr/>

<br/><br/>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>