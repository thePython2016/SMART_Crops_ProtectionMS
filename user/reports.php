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

    <title>Reports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="description" content="" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

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
      /* All report blocks hidden by default */
      .box {
        display: none;
      }

      .buttons-excel { margin-left: 600px !important; }
      .pdfBtn, .excelBtn, .printBtn { background-color: #375E97 !important; }
      .dt-buttons { margin-right: 10px !important; margin-bottom: 10px !important; }
      .dt-length { position: absolute !important; }
      .pdfIcon, .printIcon, .excelIcon {
        filter: invert(100%) sepia(100%) saturate(16%) hue-rotate(283deg) brightness(106%) contrast(104%);
      }
    </style>

  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php require 'mainMenu.php' ?>

        <div class="layout-page">

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

          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Generate Reports</h5>

                        <div class="nav-tabs" style="margin-left:5px; margin-bottom:50px;">

                          <!-- Dropdown selector -->
                          <div>
                            <select id="reportSelect" class="form-select" style="width:1000px; margin:0 auto;">
                              <option value="choose">Select Option</option>
                              <option value="farmers">Farmers</option>
                              <option value="agroinputs">Agro-Inputs</option>
                              <option value="officer">Agricultural Officers</option>
                            </select>
                          </div>

                          <!-- ===================== FARMERS BLOCK ===================== -->
                          <div class="farmer box">
                            <div class="container" style="margin-top:40px;">
                              <div class="row mb-3">
                                <div class="col-md-3">
                                  <label for="minDateFarmers">Date From:</label>
                                  <input type="date" id="minDateFarmers" class="form-control">
                                </div>
                                <div class="col-md-3">
                                  <label for="maxDateFarmers">Date To:</label>
                                  <input type="date" id="maxDateFarmers" class="form-control">
                                </div>
                              </div>
                              <table id="farmersTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Mobile number</th>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Gender</th>
                                    <th>Birth Day</th>
                                    <th>Birth Month</th>
                                    <th>Birth Year</th>
                                    <th>Region</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  require 'connection.php';
                                  $selectFarmers = "select * from farmers";
                                  $runSelectstmt = db_query($conn, $selectFarmers);
                                  foreach ($runSelectstmt as $farmers) { ?>
                                    <tr>
                                      <td><?php echo $farmers['mobileNumber'] ?></td>
                                      <td><?php echo $farmers['fname'] ?></td>
                                      <td><?php echo $farmers['mname'] ?></td>
                                      <td><?php echo $farmers['lname'] ?></td>
                                      <td><?php echo $farmers['gender'] ?></td>
                                      <td><?php echo $farmers['birthDay'] ?></td>
                                      <td><?php echo $farmers['birthMonth'] ?></td>
                                      <td><?php echo $farmers['birthYear'] ?></td>
                                      <td><?php echo $farmers['region'] ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <!-- ===================== AGROINPUTS BLOCK ===================== -->
                          <div class="agroinputs box">
                            <div class="container" style="margin-top:40px;">
                              <div class="row mb-3">
                                <div class="col-md-3">
                                  <label for="minDateInputs">Date From:</label>
                                  <input type="date" id="minDateInputs" class="form-control">
                                </div>
                                <div class="col-md-3">
                                  <label for="maxDateInputs">Date To:</label>
                                  <input type="date" id="maxDateInputs" class="form-control">
                                </div>
                              </div>
                              <table id="agroinputsTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Input number</th>
                                    <th>Input name</th>
                                    <th>Input category</th>
                                    <th>Input usage</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $selectInputs = "select * from agroinputs";
                                  $runSelectstmt = db_query($conn, $selectInputs);
                                  foreach ($runSelectstmt as $input) { ?>
                                    <tr>
                                      <td><?php echo $input['inputsNumber'] ?></td>
                                      <td><?php echo $input['name'] ?></td>
                                      <td><?php echo $input['category'] ?></td>
                                      <td><?php echo $input['usage_'] ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <!-- ===================== OFFICERS BLOCK ===================== -->
                          <div class="officer box">
                            <div class="container" style="margin-top:40px;">
                              <div class="row mb-3">
                                <div class="col-md-3">
                                  <label for="minDateOfficers">Date From:</label>
                                  <input type="date" id="minDateOfficers" class="form-control">
                                </div>
                                <div class="col-md-3">
                                  <label for="maxDateOfficers">Date To:</label>
                                  <input type="date" id="maxDateOfficers" class="form-control">
                                </div>
                              </div>
                              <table id="officersTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Mobile number</th>
                                    <th>Occupation</th>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Gender</th>
                                    <th>Birth Day</th>
                                    <th>Birth Month</th>
                                    <th>Birth Year</th>
                                    <th>Address</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $selectOfficers = "select * from agroofficers";
                                  $runSelectstmt = db_query($conn, $selectOfficers);
                                  foreach ($runSelectstmt as $officer) { ?>
                                    <tr>
                                      <td><?php echo $officer['mobileNumber'] ?></td>
                                      <td><?php echo $officer['occupation'] ?></td>
                                      <td><?php echo $officer['fname'] ?></td>
                                      <td><?php echo $officer['mname'] ?></td>
                                      <td><?php echo $officer['lname'] ?></td>
                                      <td><?php echo $officer['gender'] ?></td>
                                      <td><?php echo $officer['birthDay'] ?></td>
                                      <td><?php echo $officer['birthMonth'] ?></td>
                                      <td><?php echo $officer['birthYear'] ?></td>
                                      <td><?php echo $officer['address'] ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>

                        </div><!-- /nav-tabs -->
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- / Content -->

            <hr>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  CRPMS &copy;
                  <script>document.write(new Date().getFullYear());</script>
                  . All Rights Reserved
                </div>
              </div>
            </footer>

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- ================================================================ -->
    <!-- SCRIPTS                                                           -->
    <!-- ================================================================ -->

    <!-- Common DataTable button config -->
    <script>
      var dtButtonConfig = [
        {
          extend: 'excelHtml5',
          text: '<i class="fas fa-file-excel excelIcon fs-4"></i>',
          className: 'btn btn-success excelBtn',
          titleAttr: 'Export to Excel'
        },
        {
          extend: 'pdfHtml5',
          text: '<i class="fas fa-file-pdf pdfIcon fs-4"></i>',
          className: 'btn btn-danger pdfBtn',
          titleAttr: 'Export to PDF'
        },
        {
          extend: 'print',
          text: '<i class="fas fa-print printIcon fs-4"></i>',
          className: 'btn btn-primary printBtn',
          titleAttr: 'Print table'
        }
      ];

      var dtLanguage = {
        decimal: "", emptyTable: "No data available in table",
        info: " ", infoFiltered: "", infoPostFix: "", thousands: ",",
        lengthMenu: "Show _MENU_ entries", ordering: "", processing: "",
        search: "Search:", zeroRecords: "No matching records found",
        paginate: {
          next:     "<button class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
          previous: "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>"
        }
      };

      // Track which DataTables have been initialised so we don't double-init
      var initialised = { farmers: false, agroinputs: false, officer: false };

      function makeDateFilter(tableId, minId, maxId) {
        return function(settings, data, dataIndex) {
          if (settings.nTable.id !== tableId) return true;
          var min  = $('#' + minId).val();
          var max  = $('#' + maxId).val();
          var date = new Date(data[4]);
          if (min && date < new Date(min)) return false;
          if (max && date > new Date(max)) return false;
          return true;
        };
      }

      function initFarmers() {
        if (initialised.farmers) return;
        initialised.farmers = true;
        var t = $('#farmersTable').DataTable({
          dom: 'lBfrtip',
          pagingType: "simple",
          info: false,
          language: dtLanguage,
          buttons: dtButtonConfig,
          pageLength: 10,
          lengthMenu: [[5,10,25,50,-1],[5,10,25,50,"All"]],
          responsive: true
        });
        $.fn.dataTable.ext.search.push(makeDateFilter('farmersTable','minDateFarmers','maxDateFarmers'));
        $('#minDateFarmers, #maxDateFarmers').on('change', function() { t.draw(); });
      }

      function initAgroinputs() {
        if (initialised.agroinputs) return;
        initialised.agroinputs = true;
        var t = $('#agroinputsTable').DataTable({
          dom: 'lBfrtip',
          pagingType: "simple",
          info: false,
          language: dtLanguage,
          buttons: dtButtonConfig,
          pageLength: 10,
          lengthMenu: [[5,10,25,50,-1],[5,10,25,50,"All"]],
          responsive: true
        });
        $.fn.dataTable.ext.search.push(makeDateFilter('agroinputsTable','minDateInputs','maxDateInputs'));
        $('#minDateInputs, #maxDateInputs').on('change', function() { t.draw(); });
      }

      function initOfficers() {
        if (initialised.officer) return;
        initialised.officer = true;
        var t = $('#officersTable').DataTable({
          dom: 'lBfrtip',
          pagingType: "simple",
          info: false,
          language: dtLanguage,
          buttons: dtButtonConfig,
          pageLength: 10,
          lengthMenu: [[5,10,25,50,-1],[5,10,25,50,"All"]],
          responsive: true
        });
        $.fn.dataTable.ext.search.push(makeDateFilter('officersTable','minDateOfficers','maxDateOfficers'));
        $('#minDateOfficers, #maxDateOfficers').on('change', function() { t.draw(); });
      }

      $(document).ready(function() {

        // All boxes start hidden (CSS handles it) — nothing shown on load
        $('#reportSelect').on('change', function() {
          var val = $(this).val();

          // Hide all boxes first
          $('.box').hide();

          if (val === 'farmers') {
            $('.farmer').show();
            initFarmers();           // init DataTable only when first shown
          } else if (val === 'agroinputs') {
            $('.agroinputs').show();
            initAgroinputs();
          } else if (val === 'officer') {
            $('.officer').show();
            initOfficers();
          }
          // 'choose' — nothing shown
        });

      });
    </script>

    <!-- Year / Month / Day dropdowns (guarded so missing elements don't throw) -->
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

    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>