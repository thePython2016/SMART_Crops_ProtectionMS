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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <script>
      $(document).ready(function() {
        $('.accordion-header').click(function() {
          $(this).next('.accordion-content').slideToggle();
          $('.accordion-content').not($(this).next()).slideUp();
        });
      });
    </script>

    <style>
      /* ── Footer fix: full-height flex column layout ── */
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

      .container-xxl.flex-grow-1 {
        flex: 1;
      }

      /* ── Accordion ── */
      .accordion {
        width: 100%;
        max-width: 600px;
        margin: auto;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .accordion-item  { border-top: 1px solid #ddd; }
      .accordion-header {
        padding: 15px;
        cursor: pointer;
        font-weight: bold;
        background-color: #f2f2f2;
      }
      .accordion-content {
        display: none;
        padding: 15px;
        background-color: #fff;
      }

      /* ── Left / Right panel (kept from original) ── */
      .left-panel {
        width: 200px;
        background-color: #333;
        color: #fff;
        padding: 20px;
        box-sizing: border-box;
      }
      .left-panel h2 { margin-top: 0; }
      .left-panel .menu-item {
        cursor: pointer;
        padding: 10px 5px;
        border-bottom: 1px solid #444;
      }
      .left-panel .menu-item:hover { background-color: #444; }
      .right-panel {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #f4f4f4;
      }

      /* ── API key notification banner ── */
      #apiKeyAlert {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        background: #FCEBEB;
        border: 1px solid #F09595;
        border-left: 4px solid #A32D2D;
        border-radius: 8px;
        padding: 14px 16px;
        margin: 0 20px 20px 20px;
        max-width: 600px;
      }
    </style>

    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

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

          <!-- Content wrapper — flex column pushes footer to bottom -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-lg-12 col-md-3 order-1">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                      <a class="btn addBtn" href="farmers.php">Add Farmer</a>
                    </div>
                  </div>
                </div>

                <!-- Sent Messages accordion -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Sent Messages</h5>
                        <hr>

                        <!-- ================================================ -->
                        <!-- API KEY EXPIRY NOTIFICATION BANNER                -->
                        <!-- ================================================ -->
                        <div id="apiKeyAlert" role="alert">
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
                        <!-- END NOTIFICATION BANNER                           -->
                        <!-- ================================================ -->

                        <div style="display:flex; flex-direction:row;">
                          <div class="accordion mb-5" style="width:500px !important; margin:0 auto; border-color:#1E2761;">
                            <?php
                            require "connection.php";
                            $selectMessage = db_query($conn, "select * from sentSMS");
                            foreach ($selectMessage as $messages) {
                              $receiver = str_replace(['[', ']', '"'], "", $messages['receiver_name']);
                            ?>
                              <div class="accordion-item">
                                <div class="accordion-header" style="border-bottom:1px solid; background:#375E97; color:white;">
                                  <?php echo $receiver . ' ' . $messages['date']; ?>
                                </div>
                                <div class="accordion-content">
                                  <p>From: <?php echo $messages['sender_name']; ?></p>
                                  <p>To: <?php echo $receiver; ?></p>
                                  <p>Subject: <?php echo $messages['subject']; ?></p>
                                  <p>Message: <?php echo $messages['message']; ?></p>
                                  <hr>
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- / Content -->

            <hr>

            <!-- Footer — stays at bottom thanks to flex layout -->
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

    <!-- DataTable scripts -->
    <script>
      $('#myTable').dataTable({
        info: false,
        pagingType: "simple",
        language: {
          decimal: "", emptyTable: "No data available in table",
          info: "", infoFiltered: "", infoPostFix: "", thousands: ",",
          lengthMenu: "Show _MENU_ entries", processing: "",
          search: "Search:", zeroRecords: "No matching records found",
          bProcessing: true, sAutoWidth: false, bDestroy: true,
          sPaginationType: "bootstrap",
          bPaginate: false, bFilter: false, bInfo: false,
          paginate: {
            next:     "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Next</button>",
            previous: "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Previous</button>"
          }
        }
      });

      $('#myTable2').dataTable({
        info: false, pagingType: "simple",
        language: {
          decimal: "", emptyTable: "No data available in table",
          info: " ", infoFiltered: "", infoPostFix: "", thousands: ",",
          lengthMenu: "Show _MENU_ entries", ordering: "", processing: "",
          search: "Search:", zeroRecords: "No matching records found",
          paginate: {
            next:     "<button class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
            previous: "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>"
          }
        }
      });

      $('#farmersTable').dataTable({
        info: false, pagingType: "simple",
        language: {
          decimal: "", emptyTable: "No data available in table",
          info: " ", infoFiltered: "", infoPostFix: "", thousands: ",",
          lengthMenu: "Show _MENU_ entries", ordering: "", processing: "",
          search: "Search:", zeroRecords: "No matching records found",
          paginate: {
            next:     "<button class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
            previous: "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>"
          }
        }
      });
    </script>

    <!-- Year / Month / Day dropdowns (guarded) -->
    <script>
      (function() {
        var yearSelect = document.getElementById('Inputyear');
        if (yearSelect) {
          for (var y = 1950; y <= 2002; y++) {
            var o = document.createElement('option');
            o.value = o.textContent = y;
            yearSelect.appendChild(o);
          }
        }
        var monthSelect = document.getElementById('Inputmonth');
        if (monthSelect) {
          ["January","February","March","April","May","June","July","August","September","October","November","December"]
            .forEach(function(m, i) {
              var o = document.createElement('option');
              o.value = i + 1; o.textContent = m;
              monthSelect.appendChild(o);
            });
        }
        var daySelect = document.getElementById('Inputday');
        if (daySelect) {
          for (var d = 1; d <= 31; d++) {
            var o = document.createElement('option');
            o.value = o.textContent = d;
            daySelect.appendChild(o);
          }
        }
      })();
    </script>

    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>