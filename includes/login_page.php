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

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    /* ── Background: your original bgIMG.jpeg ── */
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      font-family: 'Segoe UI', sans-serif;
      background-image: url('<?php echo htmlspecialchars(app_asset('img/bgIMG.jpeg')); ?>');
      background-repeat: repeat;
      background-size: auto;
    }

    /* ── Card — Hyperion-X style ── */
    .hx-card {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 40px rgba(0,0,0,.15);
      width: 100%;
      max-width: 400px;
      padding: 44px 40px 36px;
      animation: fadeUp .4s ease both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Logo ── */
    .hx-logo {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
      margin-bottom: 18px;
    }

    .hx-logo img {
      height: 56px;
      width: auto;
      object-fit: contain;
    }

    /* ── Headings ── */
    .hx-title {
      font-size: 20px;
      font-weight: 700;
      text-align: center;
      color: #111;
      margin-bottom: 4px;
      letter-spacing: .01em;
    }

    .hx-sub {
      font-size: 12px;
      color: #888;
      text-align: center;
      margin-bottom: 22px;
      line-height: 1.5;
    }

    /* ── Google button ── */
    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 10px 16px;
      border: 1.5px solid #e2e2e2;
      border-radius: 8px;
      background: #fff;
      font-size: 13.5px;
      font-weight: 500;
      color: #111;
      cursor: pointer;
      text-decoration: none;
      transition: background .15s, border-color .15s;
      margin-bottom: 0;
    }
    .btn-google:hover { background: #f7f7f7; border-color: #c8c8c8; color: #111; }

    /* ── Divider ── */
    .hx-divider {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 18px 0;
      font-size: 11.5px;
      color: #aaa;
    }
    .hx-divider::before,
    .hx-divider::after { content:''; flex:1; height:1px; background:#e2e2e2; }

    /* ── Field labels ── */
    .hx-label {
      display: block;
      font-size: 11.5px;
      font-weight: 600;
      color: #333;
      margin-bottom: 5px;
      letter-spacing: .03em;
    }

    /* ── Inputs & SELECT — keep your original select, restyle to match ── */
    .hx-input,
    .hx-select {
      width: 100%;
      padding: 10px 13px;
      border: 1.5px solid #e2e2e2;
      border-radius: 8px;
      background: #fafafa;
      font-size: 13.5px;
      color: #111;
      outline: none;
      transition: border-color .18s, box-shadow .18s;
      appearance: none;
      -webkit-appearance: none;
      font-family: inherit;
    }
    .hx-input::placeholder { color: #bbb; }
    .hx-input:focus,
    .hx-select:focus {
      border-color: #268808;
      box-shadow: 0 0 0 3px rgba(38,136,8,.12);
    }

    /* Custom chevron for select */
    .hx-select-wrap {
      position: relative;
      margin-bottom: 14px;
    }
    .hx-select-wrap::after {
      content: '';
      pointer-events: none;
      position: absolute;
      right: 13px;
      top: 50%;
      transform: translateY(-50%);
      border: 5px solid transparent;
      border-top-color: #888;
      margin-top: 3px;
    }

    /* Password row */
    .hx-pwd-wrap {
      position: relative;
      margin-bottom: 6px;
    }
    .hx-pwd-wrap .hx-input { padding-right: 42px; }
    .hx-pwd-toggle {
      position: absolute;
      right: 12px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none;
      cursor: pointer; color: #aaa; padding: 0;
      display: flex; align-items: center;
    }

    .hx-forgot {
      text-align: right;
      margin-bottom: 14px;
    }
    .hx-forgot a {
      font-size: 11.5px; color: #888;
      text-decoration: none;
      transition: color .15s;
    }
    .hx-forgot a:hover { color: #268808; }

    /* ── Error ── */
    .login-error {
      color: #b00020;
      font-weight: 600;
      text-align: center;
      font-size: 12.5px;
      margin-bottom: 14px;
      background: #fff0f0;
      border: 1px solid #f5c2c2;
      border-radius: 7px;
      padding: 8px 12px;
    }

    /* ── Login button ── */
    .btn-login {
      width: 100%;
      padding: 11px;
      background: #111;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: .05em;
      cursor: pointer;
      transition: opacity .18s, transform .12s;
      margin-bottom: 0;
    }
    .btn-login:hover  { opacity: .85; }
    .btn-login:active { transform: scale(.98); }

    /* ── Register line ── */
    .hx-register {
      text-align: center;
      margin-top: 18px;
      font-size: 12.5px;
      color: #888;
    }
    .hx-register a {
      color: #111;
      font-weight: 700;
      text-decoration: none;
      border-bottom: 2px solid #268808;
      padding-bottom: 1px;
      transition: color .15s;
    }
    .hx-register a:hover { color: #268808; }

    @media (max-width: 440px) {
      .hx-card { padding: 36px 22px 28px; }
    }
  </style>
</head>
<body>

<div class="hx-card">

  <!-- Your original logo -->
  <div class="hx-logo">
    <img src="<?php echo htmlspecialchars(app_asset('img/logo4.png')); ?>" alt="Logo">
  </div>

  <h1 class="hx-title">WELCOME TO SMART CROP PROTECTION SYSTEM</h1>


  <!-- Google SSO -->
 



  <form name="form" action="<?php echo htmlspecialchars($login_action); ?>" method="POST">

    <?php if ($login_error !== ''): ?>
      <p class="login-error"><?php echo htmlspecialchars($login_error); ?></p>
    <?php endif; ?>

    <!-- YOUR ORIGINAL SELECT dropdown — untouched -->
    <label class="hx-label" for="Username">Username</label>
    <div class="hx-select-wrap">
      <select class="hx-select" aria-label="Username" name="username" id="Username" required>
        <option value="" selected disabled>Username</option>
        <option value="admin">Admin</option>
        <option value="Farmer">Farmer</option>
        <option value="Agronomist">Agronomist</option>
      </select>
    </div>

    <!-- Password -->
    <label class="hx-label" for="password">Passwords</label>
    <div class="hx-pwd-wrap">
      <input type="password" name="password" class="hx-input" id="password"
             placeholder="Enter Your Passwords" required autocomplete="current-password"/>
      <button type="button" class="hx-pwd-toggle" aria-label="Toggle password"
              onclick="var i=document.getElementById('password');i.type=i.type==='password'?'text':'password';">
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

  <p class="hx-register">Don't have an Account ? <a href="register.php">Register</a></p>

</div>

</body>
</html>