<?php
require("connect-db.php");
require("utils.php");
if(isset($_POST['profileBtn'])){
    header("Location: profile.php");
    exit;
}
if (isset($_POST['addBtn'])) {
  session_start();  // Make sure session is started at the beginning of the script
  $userEmail = $_SESSION['email']; // Retrieve email from session
  $title = $_POST['title'];
  $description = $_POST['description'];
  $rating = $_POST['rating'];

  $result = createPost($userEmail, $title, $description, $rating);
  if ($result === true) {
      header("Location: feed.php");  // Redirect to feed page on success
      exit;
  } else {
      $error = $result;  // Display the error returned by createPost
  }
}
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
  <title>Create Post</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="maintenance-system.css">  
</head>

<body>  
<div class="container">
  <div class="row g-3 mt-2">
    <div class="col">
      <h2>Create Your Post</h2>
    </div>  
  </div>
  
  <!---------------->

  <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return validateInput()">
    <table style="width:98%">
      <tr>
        <td width="50%">
          <div class='mb-3'>
            Title
            <input type='text' class='form-control' 
                   id='title' name='title' 
                   value="" />
          </div>
        </td>
        <td>
          <div class='mb-3'>
            Description
            <input type='text' class='form-control' id='description' name='description' 
                   value="" />
          </div>
          <div class='mb-3'>
            Rating
            <input type='text' class='form-control' id='rating' name='rating' 
                   value="" />
          </div>
        </td>
      </tr>
    </table>

    <div class="row g-3 mx-auto">    
      <div class="col-4 d-grid ">
      <input type="submit" value="Post" id="addBtn" name="addBtn" class="btn btn-dark"
           title="Submit a post" />                  
      </div>	
      <div class="col-4 d-grid ">
      <input type="submit" value="Delete Post" id="delBtn" name="delBtn" class="btn btn-primary"
           title="Delete a post" />                 
      </div>
      <div class="col-4 d-grid ">
      <input type="submit" value="My Profile" id="profileBtn" name="profileBtn" class="btn btn-dark"
           title="Go to user profile" />    	      
    </div>  
  </div>  
  </form>

</div>

<hr/>

<br/><br/>

<?php // include('footer.html') ?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>