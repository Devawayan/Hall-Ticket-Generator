<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="signin.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>


    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="home.php" class="sign-in-form" method="post">
            <u><h2 class="title">Sign in</h2></u>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>


          <form action="signin.php" class="sign-up-form" method="post">
           <u><h2 class="title" >Sign up</h2></u>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Full Name" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>


      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Hii Good to See You <br>
              Please Join Us and Get your Hall Ticket Ready for the Examination<br>
              Best Of Luck!!!
            </p>
            <button class="btn transparent" id="sign-up-btn" >
              Sign up
            </button>
          </div>
          <img src="log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              We are Very Pleased To see you <br>
              Please show us Your Identity and Get Ready for the Examination.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

  
    <script src="app.js"></script>
    
    <?php 
    //session_start();
    include('data.php');
    include('index.php');
    include("functions.php");
    $user_data = check_login($conn);
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $Email = $_POST['Email'];
      $Password = $_POST['Password'];
      if(!empty($Email)&& !empty($Password) && !is_numeric($Email))
      {
        //save to database
        $FULL_NAME = $_POST['Full Name'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
    
        // SQL query to insert data into the database
        $sql = "INSERT INTO database1 (FULL_NAME, Email, Password) VALUES (:FULL_NAME, :Email, :Password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':FULL_NAME', $FULL_NAME);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Password', $Password);
        $stmt->execute();
    
        echo "Data inserted successfully.";
      }
      else
      {
        echo "Please enter valid email address";
      }
    }
    ?>
  </body>
</html>
