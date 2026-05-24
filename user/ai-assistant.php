<?php
require_once __DIR__ . '/includes/auth_guard.php';
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <?php require_once __DIR__ . '/includes/early_page_surface.php'; ?>

    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Message</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="description" content="" />

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
      /* ── Footer fix: full-height flex column ── */
      html, body { height: 100%; }

      .layout-wrapper,
      .layout-container,
      .layout-page {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      .content-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
      }

      .container-xxl.flex-grow-1 { flex: 1; }

      /* ── Coming Soon ── */
      .coming-soon-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        text-align: center;
      }

      .coming-soon-icon {
        font-size: 72px;
        color: #375E97;
        margin-bottom: 24px;
        opacity: 0.75;
      }

      .coming-soon-title {
        font-size: 48px;
        font-weight: 700;
        letter-spacing: 6px;
        color: #375E97;
        margin: 0 0 12px;
        text-transform: uppercase;
      }

      .coming-soon-sub {
        font-size: 16px;
        color: #6c757d;
        margin: 0;
      }
    </style>

  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu -->
        <?php require 'mainMenu.php' ?>
        <!-- / Menu -->

        <div class="layout-page">

          <!-- Navbar -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center topbar" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center"></div>
              </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <?php require "profile.php"; ?>
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- ================================================ -->
            <!-- API KEY EXPIRY NOTIFICATION BANNER               -->
            <!-- ================================================ -->
            <div id="apiKeyAlert" role="alert" style="
              display: flex;
              align-items: flex-start;
              gap: 12px;
              background: #FCEBEB;
              border: 1px solid #F09595;
              border-left: 4px solid #A32D2D;
              border-radius: 8px;
              padding: 14px 16px;
              margin: 20px 24px 0 24px;
            ">
              <span style="font-size:20px; color:#A32D2D; flex-shrink:0; margin-top:1px;">&#9888;</span>
              <div style="flex:1;">
                <p style="margin:0 0 4px; font-size:14px; font-weight:600; color:#791F1F;">
                  API keys have expired
                </p>
                <p style="margin:0; font-size:13px; color:#A32D2D; line-height:1.5;">
                  Your API keys are no longer active. Check your
                  <a href="dashboard_settings.php" style="color:#A32D2D; font-weight:600; text-decoration:underline;">
                    dashboard settings
                  </a>
                  to renew or replace them.
                </p>
              </div>
              <button
                type="button"
                onclick="document.getElementById('apiKeyAlert').style.display='none'"
                aria-label="Dismiss notification"
                style="background:none; border:none; cursor:pointer; padding:0; color:#A32D2D; font-size:18px; line-height:1; flex-shrink:0; opacity:0.7;"
              >&#x2715;</button>
            </div>
            <!-- ================================================ -->
            <!-- END NOTIFICATION BANNER                          -->
            <!-- ================================================ -->

            <!-- Coming Soon content area -->
            <div class="coming-soon-wrapper">
              <div class="coming-soon-icon">
                <i class="bx bx-time-five"></i>
              </div>
              <h1 class="coming-soon-title">Coming Soon</h1>
              <p class="coming-soon-sub">This feature is currently under development. Check back later.</p>
            </div>

            <!-- Footer — stays at bottom -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  CRPMS &copy;
                  <script>document.write(new Date().getFullYear());</script>
                  . All Rights Reserved
                </div>
                <div>
                  <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                     target="_blank" class="footer-link me-4">Support</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- / Content wrapper -->

        </div>
        <!-- / Layout page -->
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>