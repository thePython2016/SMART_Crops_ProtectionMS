<?php
/**
 * Shared login page markup (used by /index.php and /api/index.php).
 *
 * Expects: app_asset(), $login_action, optional $login_error.
 */
$login_action = $login_action ?? '';
$login_error  = $login_error  ?? '';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Original stylesheets kept intact -->
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('fonts/css/all.min.css')); ?>"/>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('style.css')); ?>">
    <link rel="stylesheet"  href="../css/login.css">

  
</head>
<body>

<div class="hx-card">

  <div class="hx-logo">
    <img src="<?php echo htmlspecialchars(app_asset('img/logo4.png')); ?>" alt="Logo">
  </div>

  <h1 class="hx-title">WELCOME TO SMART CROP PROTECTION SYSTEM</h1>

  <form name="form" action="<?php echo htmlspecialchars($login_action); ?>" method="POST">

    <?php if ($login_error !== ''): ?>
      <p class="login-error"><?php echo htmlspecialchars($login_error); ?></p>
    <?php endif; ?>

    <!-- Username dropdown — "Username" shown as placeholder inside field -->
    <div class="hx-field hx-select-wrap">
      <select class="hx-select empty" name="username" id="Username" required
              onchange="this.classList.remove('empty')">
        <option value="" selected disabled>Username</option>
        <option value="admin">Admin</option>
        <option value="Farmer">Farmer</option>
        <option value="Agronomist">Agronomist</option>
      </select>
    </div>

    <!-- Password — placeholder shown inside field -->
    <div class="hx-field hx-pwd-wrap">
      <input type="password" name="password" class="hx-input" id="password"
             placeholder="Password" required autocomplete="current-password"/>
      <button type="button" class="hx-pwd-toggle" aria-label="Toggle password"
              onclick="var i=document.getElementById('password');i.type=i.type==='password'?'text':'password';this.querySelector('svg').style.opacity=i.type==='text'?.5:1;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/>
          <circle cx="12" cy="12" r="3"/>
        </svg>
      </button>
    </div>

    <div class="hx-forgot"><a href="#">Forgot Password?</a></div>

    <button type="submit" name="login" class="btn-login">Login</button>

  </form>

  <p class="hx-register">Don't have an Account ? <a hrefg="#">Contact administrator</a></p>

</div>

</body>
</html>