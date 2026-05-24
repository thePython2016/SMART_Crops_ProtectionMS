<?php require 'dashboardScripts.php' ?>
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

    <title>Charts</title>
    <meta name="description" content="" />

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu -->
        <?php require 'mainMenu.php' ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center"
            id="layout-navbar"
          >
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

          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Charts section -->
              <div class="row g-4 align-items-stretch">

                <!-- LEFT COLUMN: Farmers by Region + Farmers by Gender -->
                <div class="col-12 col-lg-6 d-flex flex-column gap-4">

                  <!-- Bar chart: Farmers by Region -->
                  <div class="card flex-fill">
                    <div class="card-header pb-0">
                      <h5 class="m-0">Farmers by Region</h5>
                    </div>
                    <div class="card-body">
                      <canvas id="farmersByregion"></canvas>
                      <script>
                        const labels2 = <?php echo json_encode($region) ?>;
                        var farmersByregion = new Chart(document.getElementById('farmersByregion'), {
                          type: 'bar',
                          data: {
                            labels: labels2,
                            datasets: [{
                              label: 'Farmers by Region',
                              data: <?php echo json_encode($farmers) ?>,
                              backgroundColor: ['#EB8921','#375E97','#EB8921','#007083'],
                              borderColor: ['#EB8921'],
                              borderWidth: 1
                            }]
                          },
                          options: { scales: { y: { beginAtZero: true } } }
                        });
                      </script>
                    </div>
                  </div>

                  <!-- Bar chart: Farmers by Gender -->
                  <div class="card flex-fill">
                    <div class="card-header pb-0">
                      <h5 class="m-0">Farmers by Gender</h5>
                    </div>
                    <div class="card-body">
                      <canvas id="farmersByGender"></canvas>
                      <?php
                        $genderQuery  = "SELECT gender, COUNT(*) AS total FROM farmers GROUP BY gender ORDER BY gender";
                        $genderResult = db_query($conn, $genderQuery);
                        $genderLabels = [];
                        $genderCounts = [];
                        foreach ($genderResult as $row) {
                          $genderLabels[] = $row['gender'];
                          $genderCounts[] = (int)$row['total'];
                        }
                      ?>
                      <script>
                        var farmersByGender = new Chart(document.getElementById('farmersByGender'), {
                          type: 'bar',
                          data: {
                            labels: <?php echo json_encode($genderLabels); ?>,
                            datasets: [{
                              label: 'Farmers by Gender',
                              data: <?php echo json_encode($genderCounts); ?>,
                              backgroundColor: ['#375E97', '#EB8921', '#007083'],
                              borderColor:     ['#375E97', '#EB8921', '#007083'],
                              borderWidth: 1
                            }]
                          },
                          options: {
                            responsive: true,
                            scales: {
                              y: {
                                beginAtZero: true,
                                ticks: { precision: 0, color: '#6c757d' },
                                grid: { color: 'rgba(0,0,0,0.05)' }
                              },
                              x: {
                                grid: { display: false },
                                ticks: { color: '#6c757d' }
                              }
                            },
                            plugins: {
                              legend: { display: false },
                              tooltip: {
                                callbacks: {
                                  label: function(ctx) {
                                    return ' ' + ctx.parsed.y + ' farmer(s)';
                                  }
                                }
                              }
                            }
                          }
                        });
                      </script>
                    </div>
                  </div>

                </div>
                <!-- / LEFT COLUMN -->

                <!-- RIGHT COLUMN: Agronomists by Region (Doughnut) -->
                <div class="col-12 col-lg-6 d-flex">
                  <div class="card w-100">
                    <div class="card-header pb-0">
                      <h5 class="m-0">Agronomists by Region</h5>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                      <div style="width:100%; max-width:420px;">
                        <canvas id="myChart3"></canvas>
                      </div>
                      <script>
                        const labels3 = <?php echo json_encode($address); ?>;
                        const counts3 = <?php echo json_encode($officerCount); ?>;

                        const doughnutColors = [
                          '#EB8921','#375E97','#f1ba21','#9c27b0',
                          '#007083','#e53935','#43a047','#8e24aa'
                        ];

                        const doughnutSliceLabelPlugin = {
                          id: 'doughnutSliceLabels',
                          afterDatasetsDraw: function(chart) {
                            var ctx     = chart.ctx;
                            var dataset = chart.data.datasets[0];
                            var meta    = chart.getDatasetMeta(0);

                            meta.data.forEach(function(arc, i) {
                              var startAngle = arc.startAngle;
                              var endAngle   = arc.endAngle;
                              var midAngle   = startAngle + (endAngle - startAngle) / 2;
                              var outerR     = arc.outerRadius;
                              var innerR     = arc.innerRadius;
                              var r          = innerR + (outerR - innerR) * 0.65;
                              var x          = arc.x + r * Math.cos(midAngle);
                              var y          = arc.y + r * Math.sin(midAngle);
                              var sliceDeg   = (endAngle - startAngle) * (180 / Math.PI);
                              if (sliceDeg < 15) return;

                              ctx.save();
                              ctx.textAlign    = 'center';
                              ctx.textBaseline = 'middle';
                              ctx.fillStyle    = '#ffffff';
                              ctx.font = 'bold 10px "Public Sans", Segoe UI, sans-serif';
                              ctx.fillText(labels3[i], x, y - 8);
                              ctx.font = 'bold 14px "Public Sans", Segoe UI, sans-serif';
                              ctx.fillText(counts3[i], x, y + 8);
                              ctx.restore();
                            });
                          }
                        };

                        var myChart3 = new Chart(document.getElementById('myChart3'), {
                          type: 'doughnut',
                          data: {
                            labels: labels3,
                            datasets: [{
                              label: 'Agronomists',
                              data: counts3,
                              backgroundColor: labels3.map(function(_, i) {
                                return doughnutColors[i % doughnutColors.length] + 'cc';
                              }),
                              borderColor: labels3.map(function(_, i) {
                                return doughnutColors[i % doughnutColors.length];
                              }),
                              borderWidth: 2
                            }]
                          },
                          options: {
                            responsive: true,
                            plugins: {
                              legend: { display: true, position: 'bottom' },
                              tooltip: {
                                callbacks: {
                                  label: function(ctx) {
                                    return ctx.label + ': ' + ctx.parsed + ' agronomist(s)';
                                  }
                                }
                              }
                            }
                          },
                          plugins: [doughnutSliceLabelPlugin]
                        });
                      </script>
                    </div>
                  </div>
                </div>
                <!-- / RIGHT COLUMN -->

              </div>
              <!-- / Charts section -->

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
                <div></div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- / Content wrapper -->

        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Datatable scripts -->
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
          sPaginationType: "bootstrap", bPaginate: false, bFilter: false, bInfo: false,
          paginate: {
            next:     "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Next</button>",
            previous: "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Previous</button>"
          }
        }
      });

      $('#myTable2').dataTable({
        info: false,
        pagingType: "simple",
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

    <!-- Core JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>