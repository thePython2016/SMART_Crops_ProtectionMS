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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Welcome | Admin</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />

    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php require 'mainMenu.php' ?>

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
                <?php require 'profile.php' ?>
              </ul>
            </div>
          </nav>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <!-- Top cards: Farmers & Agronomists -->
                <div class="col-lg-6 col-md-3 order-1">
                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card topCard">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="farmers" viewBox="0 0 640 512">
                              <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                            <div>
                              <div style="margin-right:20px">Farmers</div>
                              <div style="font-weight:bold;padding-left:15px"><?php echo $farmersCount ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card topCard">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="officers" viewBox="0 0 448 512">
                              <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                            </svg>
                            <div style="display:flex;flex-direction:column">
                              <div>Agronomists</div>
                              <div style="font-weight:bold;padding-left:15px"><?php echo $officers ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!-- Top cards: Messages & AgroInputs -->
                <div class="col-lg-6 col-md-3 order-1">
                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card topCard">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="weather" viewBox="0 0 512 512">
                              <path d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z"/>
                            </svg>
                            <div style="display:flex;flex-direction:column">
                              <div>Messages</div>
                              <div style="font-weight:bold;padding-left:15px"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-5 col-md-12 col-6 mb-4">
                      <div class="card topCard">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="input" viewBox="0 0 448 512">
                              <path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                            </svg>
                            <div>
                              <div>AgroInPuts</div>
                              <div style="font-weight:bold;padding-left:15px"><?php echo $inputs ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!-- Farmers by Region — Bar chart -->
                <div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-10">
                        <h5 class="card-header m-0 me-2 pb-3">Farmers by Region</h5>
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
                  </div>
                </div>

                <!-- Agronomists by Region — BUBBLE chart (one bubble per region, label+count inside) -->
                <div class="col-12 col-md-6 col-lg-6 order-3 order-md-2">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Agronomists by Region</h5>
                              </div>
                              <div class="mt-sm-auto">

                                <div style="width:400px">
                                  <canvas id="myChart3"></canvas>
                                  <script>
                                    const labels3 = <?php echo json_encode($address); ?>;
                                    const counts3 = <?php echo json_encode($officerCount); ?>;

                                    const bubbleColors = [
                                      '#EB8921','#375E97','#f1ba21','#9c27b0',
                                      '#007083','#e53935','#43a047','#8e24aa'
                                    ];

                                    // All regions in ONE dataset — one bubble per region
                                    const allBubbles = labels3.map(function(label, i) {
                                      return {
                                        x: i + 1,
                                        y: counts3[i],
                                        r: Math.max(24, counts3[i] * 6)
                                      };
                                    });

                                    // Custom plugin: draw region name + count inside each bubble
                                    const bubbleLabelPlugin = {
                                      id: 'bubbleLabels',
                                      afterDatasetsDraw: function(chart) {
                                        var ctx = chart.ctx;
                                        chart.data.datasets.forEach(function(dataset, dsi) {
                                          var meta = chart.getDatasetMeta(dsi);
                                          meta.data.forEach(function(bubble, i) {
                                            var raw = dataset.data[i];
                                            var x   = bubble.x;
                                            var y   = bubble.y;

                                            ctx.save();
                                            ctx.textAlign    = 'center';
                                            ctx.textBaseline = 'middle';
                                            ctx.fillStyle    = '#ffffff';

                                            // Region name — smaller font, slightly above centre
                                            ctx.font = 'bold 11px "Public Sans", Segoe UI, sans-serif';
                                            ctx.fillText(labels3[i], x, y - 8);

                                            // Count — larger font, below centre
                                            ctx.font = 'bold 15px "Public Sans", Segoe UI, sans-serif';
                                            ctx.fillText(raw.y, x, y + 9);

                                            ctx.restore();
                                          });
                                        });
                                      }
                                    };

                                    var myChart3 = new Chart(document.getElementById('myChart3'), {
                                      type: "doughnut",
                                      data: {
                                        datasets: [{
                                          label: 'Agronomists',
                                          data: allBubbles,
                                          backgroundColor: labels3.map(function(_, i) {
                                            return bubbleColors[i % bubbleColors.length] + 'cc';
                                          }),
                                          borderColor: labels3.map(function(_, i) {
                                            return bubbleColors[i % bubbleColors.length];
                                          }),
                                          borderWidth: 2
                                        }]
                                      },
                                      options: {
                                        responsive: true,
                                        plugins: {
                                          legend: { display: false },
                                          tooltip: {
                                            callbacks: {
                                              label: function(ctx) {
                                                return labels3[ctx.dataIndex] + ': ' + ctx.raw.y + ' agronomist(s)';
                                              }
                                            }
                                          }
                                        },
                                        scales: {
                                          x: {
                                            title: { display: true, text: 'Region' },
                                            ticks: {
                                              stepSize: 1,
                                              callback: function(val) { return labels3[val - 1] || ''; }
                                            },
                                            min: 0,
                                            max: labels3.length + 1
                                          },
                                          y: {
                                            title: { display: true, text: 'No. of Agronomists' },
                                            beginAtZero: true
                                          }
                                        }
                                      },
                                      plugins: [bubbleLabelPlugin]
                                    });
                                  </script>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Tables row -->
            <div class="row">

              <!-- AgroInputs List -->
              <div class="col-md-7 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">AgroInputs List</h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="container">
                      <table id="inputTable" class="table table-striped table-bordered" style="width:1000px !important">
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
                            foreach ($runSelectstmt as $inputs) {
                              echo "<tr class='dataRow'
                                data-number='"   . htmlspecialchars($inputs['inputsNumber']) . "'
                                data-name='"     . htmlspecialchars($inputs['name'])         . "'
                                data-category='" . htmlspecialchars($inputs['category'])     . "'
                                data-usage='"    . htmlspecialchars($inputs['usage_'])       . "'>";
                          ?>
                            <td class="tableData"><?php echo $inputs['inputsNumber'] ?></td>
                            <td class="tableData"><?php echo $inputs['name']         ?></td>
                            <td class="tableData"><?php echo $inputs['category']     ?></td>
                            <td class="tableData"><?php echo $inputs['usage_']       ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Agricultural Officers List -->
              <div class="col-md-5 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0 me-2">Agricultural Officers List</h5>
                  </div>
                  <div class="card-body">
                    <div class="container">
                      <table id="officersTable" class="table table-striped table-bordered" style="width:1000px !important">
                        <thead>
                          <tr>
                            <th>Mobile number</th>
                            <th>First name</th>
                            <th>Middle name</th>
                            <th>Last name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            require 'connection.php';
                            $selectOfficers = "select * from agroofficers";
                            $runSelectstmt  = db_query($conn, $selectOfficers);
                            foreach ($runSelectstmt as $officers) {
                              echo "<tr class='dataRow'
                                data-phone='"      . htmlspecialchars($officers['mobileNumber']) . "'
                                data-occupation='" . htmlspecialchars($officers['occupation'])   . "'
                                data-fname='"      . htmlspecialchars($officers['fname'])        . "'
                                data-mname='"      . htmlspecialchars($officers['mname'])        . "'
                                data-lname='"      . htmlspecialchars($officers['lname'])        . "'
                                data-gender='"     . htmlspecialchars($officers['gender'])       . "'
                                data-day='"        . htmlspecialchars($officers['birthDay'])     . "'
                                data-month='"      . htmlspecialchars($officers['birthMonth'])   . "'
                                data-year='"       . htmlspecialchars($officers['birthYear'])    . "'
                                data-address='"    . htmlspecialchars($officers['address'])      . "'>";
                          ?>
                            <td class="tableData"><?php echo $officers['mobileNumber'] ?></td>
                            <td class="tableData"><?php echo $officers['fname']        ?></td>
                            <td class="tableData"><?php echo $officers['mname']        ?></td>
                            <td class="tableData"><?php echo $officers['lname']        ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- / Tables row -->

          </div>
          <!-- / Content -->

          <hr>

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                CRPIMS ©
                <script>document.write(new Date().getFullYear());</script>
                . All Rights Reserved
              </div>
            </div>
          </footer>

          <div class="content-backdrop fade"></div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- DataTable init -->
    <script>
      $('#inputTable').dataTable({
        info: false,
        pagingType: "simple",
        language: {
          emptyTable: "No data available in table",
          info: "",
          infoFiltered: "",
          lengthMenu: "Show _MENU_ entries",
          processing: "",
          search: "Search:",
          zeroRecords: "No matching records found",
          paginate: {
            next:     "<button style='border:1px solid grey !important;color:grey'>Next</button>",
            previous: "<button style='border:1px solid grey !important;color:grey'>Previous</button>"
          }
        }
      });

      $('#officersTable').dataTable({
        info: false,
        pagingType: "simple",
        language: {
          emptyTable: "No data available in table",
          info: " ",
          infoFiltered: "",
          lengthMenu: "Show _MENU_ entries",
          processing: "",
          search: "Search:",
          zeroRecords: "No matching records found",
          paginate: {
            next:     "<button class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
            previous: "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>"
          }
        }
      });
    </script>

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