<?php

/**
 * Shared login page markup (used by /index.php and /api/index.php).
 *
 * Expects: app_asset(), $login_action, optional $login_error.
 */
$login_action = $login_action ?? '';
$login_error = $login_error ?? '';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('fonts/css/all.min.css')); ?>"/>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('style.css')); ?>">

    <style>
      body{
        background-color:none;
        background-image:url('<?php echo htmlspecialchars(app_asset('img/bgIMG.jpeg')); ?>');
        background-repeat:repeat;
      }
      .btn-color{
        background-color: #268808;
        color: #fff;
        border-radius:5px;
        border:#EB8921;
      }
      .profile-image-pic{
        height: 100px;
        width: 100px;
        object-fit: cover;
      }
      .cardbody-color{
        background-color: rgb(218, 167, 72);
        border-radius:20px;
      }
      a{ text-decoration: none; }
      .card_{
        margin:auto;
        width:400px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      .mb-3 input[type=text],
      .mb-3 input[type=password]{ width:95%; margin:auto; }
      .button{ width:95%; margin:auto; }
      .text-center img{ margin-top:40px; }
      #Username, #password{ width:300px !important; }
      .login-error{
        color:#b00020;
        font-weight:bold;
        text-align:center;
        margin-bottom:1rem;
      }
    </style>
  </head>
  <body>
    <div class="text-center">
      <img src="<?php echo htmlspecialchars(app_asset('img/logo4.png')); ?>"
           class="img-fluid profile-image-pic img-thumbnail rounded-circle"
           width="150" alt="profile">
    </div>
    <div class="card_ my-5">
      <form class="card-body cardbody-color p-lg-5" name="form" action="<?php echo htmlspecialchars($login_action); ?>" method="POST">
        <?php if ($login_error !== ''): ?>
          <p class="login-error"><?php echo htmlspecialchars($login_error); ?></p>
        <?php endif; ?>

        <div class="mb-3 mt-3">
          <select class="form-select" aria-label="Username" name="username" id="Username" required>
            <option value="" selected disabled>Username</option>
            <option value="admin">Admin</option>
            <option value="Farmer">Farmer</option>
            <option value="Agronomist">Agronomist</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required/>
        </div>
        <div class="text-center button">
          <button type="submit" name="login" class="btn-color px-4 mb-5 w-100">Login</button>
        </div>
        <hr style="color:white">
      </form>
    </div>
  </body>
</html>
