<!-- <?php
// include "Api_Ops.php";
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script src="js/main.js"></script>

  <link rel="stylesheet" href="css/styles.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body class="scroll">
  <?php include 'header.php'; ?>

  <div class="login-box">
    <h2 style="font-size: 30px;">User Registration Form</h2>
    <span id="message"></span>
    <form action="DB_Ops.php" name="registrationForm" method="POST" id="myForm" enctype="multipart/form-data">
      <div class="form-inputs">
        <br />
        <div class="user-box">
          <input type="text" class="form-control" id="full_name" name="full_name" required />
          <label for="full_name">Full Name</label>
        </div>
        <div class="user-box">
          <input type="text" class="form-control" id="user_name" name="user_name" required oninput="checkUserName()"
            ; />
          <label for="user_name">User Name</label>
        </div>

        <div class="user-box">


          <label for="birthdate">Birthdate</label>
          <br />
          <br />
          <input type="date" class="form-control" id="birthdate" name="birthdate" required />


          <button class="login-box" type="button" name="get" onclick="getFamousPeople(birthdate.value)">
            <span></span>
            <span></span>
            <span></span>
            <span></span>Get
            actors</button>

        </div>
        <ul id="actorsname" style="color: white">
        </ul>



        <div class="user-box">
          <input type="tel" class="form-control" id="phone" name="phone" required />
          <label for="phone">Phone</label>
        </div>

        <div class="user-box">
          <input type="text" class="form-control" id="address" name="address" required />
          <label for="address">Address</label>
        </div>
        <div class="user-box">
          <input type="password" class="form-control" id="password" name="password" required />
          <label for="password">Password</label>
        </div>
        <div class="user-box">
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required />
          <label for="confirm_password">Confirm Password</label>
        </div>

        <div class="user-box">
          <label for="image">User Image</label>
          <br />
          <br />
          <input type="file" class="form-control-file" id="image" name="image" required />
        </div>
        <div class="user-box">
          <input type="text" class="form-control" id="email" name="email" required oninput="checkEmail()" />
          <label for="email">Email</label>
        </div>
      </div>
      <button id="submit-btn" href="#" type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </button>
    </form>
  </div>
  <?php include 'footer.php'; ?>

  <script src="js/main.js"></script>
  <script src="Api_Ops.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>


</body>

</html>