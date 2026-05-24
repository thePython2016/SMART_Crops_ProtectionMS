<?php
/**
 * Register page markup.
 * Expects: app_asset(), $register_action, optional $register_error.
 */
$register_action = $register_action ?? '';
$register_error  = $register_error  ?? '';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('fonts/css/all.min.css')); ?>"/>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_asset('style.css')); ?>">
  <link rel="stylesheet" href="../css/login.css">

  <style>
    /* ── Confirm password mismatch hint ── */
    .hx-input.error { border-color: #e53935; box-shadow: 0 0 0 3px rgba(229,57,53,.12); }
    .hx-hint {
      font-size: 11px;
      margin-top: 4px;
      min-height: 16px;
      padding-left: 2px;
    }
    .hx-hint.bad  { color: #e53935; }
    .hx-hint.good { color: #268808; }
  </style>
</head>
<body>

<div class="hx-card">

  <div class="hx-logo">
    <img src="<?php echo htmlspecialchars(app_asset('img/logo4.png')); ?>" alt="Logo">
  </div>

  <h1 class="hx-title">CREATE AN ACCOUNT</h1>

  <form name="register_form" action="<?php echo htmlspecialchars($register_action); ?>" method="POST" onsubmit="return validateForm()">

    <?php if ($register_error !== ''): ?>
      <p class="login-error"><?php echo htmlspecialchars($register_error); ?></p>
    <?php endif; ?>

    <!-- 1. Username dropdown -->
    <div class="hx-field hx-select-wrap">
      <select class="hx-select empty" name="username" id="Username" required
              onchange="this.classList.remove('empty')">
        <option value="" selected disabled>Username</option>
        <option value="admin">Admin</option>
        <option value="Farmer">Farmer</option>
        <option value="Agronomist">Agronomist</option>
      </select>
    </div>

    <!-- 2. Phone number -->
    <div class="hx-field">
      <input type="tel" name="phone" class="hx-input" id="phone"
             placeholder="Phone Number"
             pattern="[0-9+\-\s]{7,15}"
             title="Enter a valid phone number"
             required autocomplete="tel"/>
    </div>

    <!-- 3. Password -->
    <div class="hx-field hx-pwd-wrap">
      <input type="password" name="password" class="hx-input" id="password"
             placeholder="Password" required autocomplete="new-password"
             oninput="checkMatch()"/>
      <button type="button" class="hx-pwd-toggle" aria-label="Toggle password"
              onclick="togglePwd('password', this)">
        <?php echo eye_icon_svg(); ?>
      </button>
    </div>

    <!-- 4. Confirm password -->
    <div class="hx-field hx-pwd-wrap">
      <input type="password" name="confirm_password" class="hx-input" id="confirm_password"
             placeholder="Confirm Password" required autocomplete="new-password"
             oninput="checkMatch()"/>
      <button type="button" class="hx-pwd-toggle" aria-label="Toggle confirm password"
              onclick="togglePwd('confirm_password', this)">
        <?php echo eye_icon_svg(); ?>
      </button>
    </div>
    <div class="hx-hint" id="match-hint"></div>

    <button type="submit" name="register" class="btn-login" style="margin-top:16px;">Register</button>

  </form>

  <p class="hx-register">Already have an Account ? <a href="login.php">Login</a></p>

</div>

<script>
  function eye_icon_svg() { /* placeholder — rendered via PHP below */ }

  function togglePwd(fieldId, btn) {
    var i = document.getElementById(fieldId);
    i.type = i.type === 'password' ? 'text' : 'password';
    btn.querySelector('svg').style.opacity = i.type === 'text' ? .5 : 1;
  }

  function checkMatch() {
    var p  = document.getElementById('password').value;
    var c  = document.getElementById('confirm_password').value;
    var h  = document.getElementById('match-hint');
    var ci = document.getElementById('confirm_password');
    if (c === '') { h.textContent = ''; h.className = 'hx-hint'; ci.classList.remove('error'); return; }
    if (p === c)  { h.textContent = '✓ Passwords match'; h.className = 'hx-hint good'; ci.classList.remove('error'); }
    else          { h.textContent = '✗ Passwords do not match'; h.className = 'hx-hint bad';  ci.classList.add('error'); }
  }

  function validateForm() {
    var p = document.getElementById('password').value;
    var c = document.getElementById('confirm_password').value;
    if (p !== c) { alert('Passwords do not match.'); return false; }
    return true;
  }
</script>

<?php
/* Helper — inline SVG eye icon so we can echo it in both PHP spots */
function eye_icon_svg() {
  return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
       stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
    <path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/>
    <circle cx="12" cy="12" r="3"/>
  </svg>';
}
?>

</body>
</html>