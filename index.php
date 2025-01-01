<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/css/all.min.css"/>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css">
    
    <style>
      body{
        background-color:none;
        background-image:url('img/bgIMG.jpeg');
        background-repeat:repeat;

      }
        .btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}


.profile-image-pic{
  height: 100x;
  width: 100px;
  object-fit: cover;
}



.cardbody-color{
  background-color: rgb(218, 167, 72);
  border-radius:20px;

}

a{
  text-decoration: none;
}
.card_{
  margin:auto;
  width:400px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  transition:none;
  transform:none;
  
  
}
.btn-color{
  rgb(8, 10, 136)
  border-radius:5px;
  border:#EB8921;
  height:30px;
  width:100px;
  text-align:center;
  background:#268808;
}
.btn- :hover{
  background-color:none;
  color:white;
  
}
.image-fluid{
 margin-top:0;
}
form i {
    margin-left: -30px;
    cursor: pointer;
}
.button.btn :hover{
background-color:#EB8921;
}
.mb-3 input[type=text],
.mb-3 input[type=password]
{
  width:95%;
  margin:auto;
}
.button{
  width:95%;
  margin:auto;
 
.forgot-username-text{
  color:white;
  text-align:center;
}
.text-center img{
  margin-top:40px;
}
    </style>
</head>
<body>
<div class="text-center">
              <img src="img/logo4.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle"
                width="150px" alt="profile">
            </div>
        <div class="card_ my-5">

          <form class="card-body cardbody-color p-lg-5" name="form" action="index.php" method="POST">

          <style>


#Username, #password{
  width:300px !important;
}

          </style>

            <div class="mb-3 mt-3">
            <select class="form-select orm-control" aria-label="Default select example" name="username" id="Username">
  <option selected disabled>Username</option>
  <option value="admin">Admin</option>
  <option value="Farmer">Farmer</option>
  <option value="Agronomist">Agronomist</option>
</select>
              
            </div>
            <div class="mb-3">
              <input type="password" name="password"  class="form-control" id="password" placeholder="Password" required/>
             
            </div>
            <div class="text-center button">
        <button type="submit" name="login" class="btn-color px-4 mb-5 w-100" style="marin-bottom:20px">
           
       <span style="text-align:center;padding-top:20px;font-size:15px">Login</button>
      </div>
      <hr style="color:white">
      
      </form>
     
        </div>
        <div style="width:400px;margin:auto;font-weight:bold;font-size:20px;color:blue">
        <hr>
        </div>
    
 
<!----Authentication goes here--->

<?php
require 'connection.php';


// Collect data 
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $pass=$_POST['password'];
  //Secure
$username=mysqli_real_escape_string($conn,$username);
$pass=mysqli_real_escape_string($conn,$pass);

  $select="select username,password,level from user where username='$username' AND password='$pass'";
  $answer=mysqli_query($conn,$select);
  $row=mysqli_fetch_array($answer);
  $level=$row['level'];
  if($level==1)
  {
    session_start();
    $_SESSION['username']=$username;
   header("Location:user/user.php");
   
  }
  else if($level==2)
  {
    session_start();
    $_SESSION['username']=$username;
   header("Location:farmer/user.php");
   
  }
  else if($level==3)
  {
    session_start();
    $_SESSION['username']=$username;
   header("Location:officers/user.php");
   
  }
  else{
    header("Location:index.php");
  }
}

?>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("fa-eye");
        });

    
       
    </script>
</body>
</html>