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
  <title>Hyperion-X — Login</title>

  <!-- Google Font: Cormorant Garamond (display) + DM Sans (body) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

  <style>
    /* ── Reset & tokens ─────────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:        #f0f0f0;
      --card:      #ffffff;
      --border:    #e2e2e2;
      --text:      #111111;
      --muted:     #888888;
      --accent:    #b8935a;       /* warm gold — matches logo colour */
      --btn-dark:  #111111;
      --btn-text:  #ffffff;
      --input-bg:  #fafafa;
      --radius:    14px;
      --shadow:    0 8px 40px rgba(0,0,0,.10);
    }

    /* ── Grid background (like the screenshot) ──────────────────── */
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'DM Sans', sans-serif;
      background-color: var(--bg);
      background-image:
        linear-gradient(var(--border) 1px, transparent 1px),
        linear-gradient(90deg, var(--border) 1px, transparent 1px);
      background-size: 40px 40px;
      padding: 24px;
    }

    /* ── Card ───────────────────────────────────────────────────── */
    .card {
      background: var(--card);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      width: 100%;
      max-width: 400px;
      padding: 44px 40px 36px;
      animation: fadeUp .45s ease both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(18px); }
      to   { opacity: 1; transform: translateY(0);    }
    }

    /* ── Logo area ──────────────────────────────────────────────── */
    .logo-wrap {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      margin-bottom: 20px;
    }

    /* Snowflake / asterisk logo mark (SVG inline — replace with <img> if needed) */
    .logo-mark {
      width: 38px;
      height: 38px;
      color: var(--accent);
    }

    .logo-wordmark {
      font-family: 'DM Sans', sans-serif;
      font-size: 9px;
      font-weight: 500;
      letter-spacing: .25em;
      color: var(--muted);
      text-transform: uppercase;
    }

    /* If you have a real logo image, swap the SVG block with:
       <img src="<?php echo htmlspecialchars(app_asset('img/logo4.png')); ?>"
            alt="Hyperion-X" style="height:48px">
    */

    /* ── Headings ───────────────────────────────────────────────── */
    .card-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 22px;
      font-weight: 600;
      text-align: center;
      color: var(--text);
      letter-spacing: .01em;
      margin-bottom: 6px;
    }

    .card-sub {
      font-size: 12px;
      color: var(--muted);
      text-align: center;
      margin-bottom: 24px;
      line-height: 1.5;
    }

    /* ── Google button ──────────────────────────────────────────── */
    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 10px 16px;
      border: 1.5px solid var(--border);
      border-radius: 8px;
      background: #fff;
      font-family: 'DM Sans', sans-serif;
      font-size: 13.5px;
      font-weight: 500;
      color: var(--text);
      cursor: pointer;
      transition: background .18s, border-color .18s;
      text-decoration: none;
    }

    .btn-google:hover {
      background: #f7f7f7;
      border-color: #c8c8c8;
    }

    .btn-google svg { flex-shrink: 0; }

    /* ── Divider ────────────────────────────────────────────────── */
    .divider {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 20px 0;
      font-size: 11.5px;
      color: var(--muted);
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    /* ── Form fields ────────────────────────────────────────────── */
    .field { margin-bottom: 14px; }

    .field label {
      display: block;
      font-size: 11.5px;
      font-weight: 500;
      color: var(--text);
      margin-bottom: 5px;
      letter-spacing: .02em;
    }

    .field input,
    .field select {
      width: 100%;
      padding: 10px 13px;
      border: 1.5px solid var(--border);
      border-radius: 8px;
      background: var(--input-bg);
      font-family: 'DM Sans', sans-serif;
      font-size: 13.5px;
      color: var(--text);
      outline: none;
      transition: border-color .18s, box-shadow .18s;
      appearance: none;
      -webkit-appearance: none;
    }

    .field input::placeholder { color: #aaa; }

    .field input:focus,
    .field select:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(184,147,90,.13);
    }

    /* Password wrapper */
    .pwd-wrap { position: relative; }

    .pwd-wrap input { padding-right: 40px; }

    .pwd-toggle {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: var(--muted);
      padding: 0;
      display: flex;
      align-items: center;
    }

    .forgot {
      text-align: right;
      margin-top: 6px;
    }

    .forgot a {
      font-size: 11.5px;
      color: var(--muted);
      text-decoration: none;
      transition: color .15s;
    }

    .forgot a:hover { color: var(--accent); }

    /* ── Error ──────────────────────────────────────────────────── */
    .login-error {
      background: #fff0f0;
      border: 1px solid #f5c2c2;
      border-radius: 7px;
      color: #b00020;
      font-size: 12.5px;
      font-weight: 500;
      text-align: center;
      padding: 9px 12px;
      margin-bottom: 16px;
    }

    /* ── Submit ─────────────────────────────────────────────────── */
    .btn-login {
      width: 100%;
      padding: 11px;
      background: var(--btn-dark);
      color: var(--btn-text);
      border: none;
      border-radius: 8px;
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: .04em;
      cursor: pointer;
      margin-top: 18px;
      transition: opacity .18s, transform .12s;
    }

    .btn-login:hover   { opacity: .88; }
    .btn-login:active  { transform: scale(.98); }

    /* ── Register link ──────────────────────────────────────────── */
    .register-line {
      text-align: center;
      margin-top: 18px;
      font-size: 12.5px;
      color: var(--muted);
    }

    .register-line a {
      color: var(--text);
      font-weight: 600;
      text-decoration: none;
      border-bottom: 1.5px solid var(--accent);
      padding-bottom: 1px;
      transition: color .15s;
    }

    .register-line a:hover { color: var(--accent); }

    /* ── Responsive ─────────────────────────────────────────────── */
    @media (max-width: 440px) {
      .card { padding: 36px 24px 28px; }
    }
  </style>
</head>
<body>

<div class="card">

  <!-- Logo -->
  <div class="logo-wrap">
    <!--
      OPTION A — Use your actual logo image (recommended):
      <img src="<?php echo htmlspecialchars(app_asset('img/logo4.png')); ?>"
           alt="Hyperion-X logo" style="height:48px; width:auto;">

      OPTION B — Inline SVG snowflake placeholder (shown when logo file isn't available):
    -->
    <svg class="logo-mark" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <line x1="19" y1="2"  x2="19" y2="36" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
      <line x1="2"  y1="19" x2="36" y2="19" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
      <line x1="6.1"  y1="6.1"  x2="31.9" y2="31.9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
      <line x1="31.9" y1="6.1"  x2="6.1"  y2="31.9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
      <line x1="19" y1="2"  x2="14" y2="8"  stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="19" y1="2"  x2="24" y2="8"  stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="19" y1="36" x2="14" y2="30" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="19" y1="36" x2="24" y2="30" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="2"  y1="19" x2="8"  y2="14" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="2"  y1="19" x2="8"  y2="24" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="36" y1="19" x2="30" y2="14" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="36" y1="19" x2="30" y2="24" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
    </svg>
    <span class="logo-wordmark">HYPERION-X</span>
  </div>

  <h1 class="card-title">Welcome to Hyperion-X</h1>
  <p class="card-sub">Access your dashboard and unleash the full<br>power of HYPERION-X</p>

  <!-- Google SSO -->
  <a href="#" class="btn-google" role="button">
    <!-- Google colour logo -->
    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
      <path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.874 2.684-6.615z"/>
      <path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.184l-2.908-2.258c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18z"/>
      <path fill="#FBBC05" d="M3.964 10.707A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.707V4.961H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.039l3.007-2.332z"/>
      <path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.961L3.964 7.293C4.672 5.163 6.656 3.58 9 3.58z"/>
    </svg>
    Continue with Google
  </a>

  <div class="divider">Or, sign in with your email</div>

  <!-- Login form -->
  <form name="form" action="<?php echo htmlspecialchars($login_action); ?>" method="POST">

    <?php if ($login_error !== ''): ?>
      <p class="login-error"><?php echo htmlspecialchars($login_error); ?></p>
    <?php endif; ?>

    <!-- Email / Username -->
    <div class="field">
      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="username"
        placeholder="Enter Your Email"
        autocomplete="email"
        required>
    </div>

    <!-- Password -->
    <div class="field">
      <label for="password">Passwords</label>
      <div class="pwd-wrap">
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Enter Your Passwords"
          autocomplete="current-password"
          required>
        <button type="button" class="pwd-toggle" aria-label="Toggle password visibility"
                onclick="(function(b){var i=document.getElementById('password');i.type=i.type==='password'?'text':'password';b.innerHTML=i.type==='password'?eyeIcon:eyeOffIcon;})(this)">
          <!-- eye icon -->
          <svg id="eye-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
        </button>
      </div>
      <div class="forgot"><a href="#">Forgot Password?</a></div>
    </div>

    <button type="submit" name="login" class="btn-login">Login</button>

  </form>

  <p class="register-line">Don't have an Account ? <a href="register.php">Register</a></p>

</div>

<script>
  // Inline SVG strings for the toggle (avoids inline onclick complexity)
  var eyeIcon    = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>';
  var eyeOffIcon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07A3 3 0 1 1 9.88 9.88"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
</script>

</body>
</html>