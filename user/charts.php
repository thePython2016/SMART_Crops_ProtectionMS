

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
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Charts</title>

    <meta name="description" content="" />


        <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
    
    <!-- End dataTable -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>




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

     <?php require 'mainMenu.php'?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page ">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center "
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none ">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center topbar " id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                 
                
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

       
<?php 
require "profile.php";
?>
              </ul>
            </div>
          </nav>

  
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
  
               

                      
                          
       
                <div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-10">
                        <h5 class="card-header m-0 me-2 pb-3">Farmers by Region</h5>
                        <div  class="px-2"></div>
                        <canvas id="farmersByregion"></canvas>
                        <!-- Charts -->
                        <script>
    const labels2 = <?php echo json_encode($region) ?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Farmers by Region',
      data: <?php echo json_encode($farmers) ?>,
      backgroundColor: [
        '#EB8921',
        '#375E97',
        '#EB8921',
        '#007083',
       
      ],
      borderColor: [
       '#EB8921',
       
      ],
      borderWidth: 1
    }]
  };
  const config2 = {
    type: 'bar',
    data: data2,
    options: {
   
      
      scales: {
        y: {
          beginAtZero: true
        }
        
      }
    },
  };
  var farmersByregion = new Chart(
      document.getElementById('farmersByregion'),
      config2
    );
  </script>
                      </div>
        
                    </div>
                  </div>
                </div>
                <!--/ Agronomists by region -->
                <div class="col-12 col-md-6 col-lg-6 order-3 order-md-2">
                  <div class="row">
                   
                   
                     
                    <!-- </div>
    <div class="row"> -->
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
    
                              const labels3 =<?php echo json_encode($address)?>;
                            const data3 = {
                              labels: labels3,
                              datasets: [{
                                label: 'Number of Agricultural Officers by Region',
                                data: <?php echo json_encode($officerCount)?>,
                                backgroundColor: [
                                '#EB8921',
                              '#375E97',
                              ' #f1ba21f1',
                              'purple',
                             
                                 
                                ],
                                borderColor: [
                                 '#EB8921',
                                 
                                ],
                                borderWidth: 1
                              }]
                            };
                            const config3 = {
                              type: 'line',
                              data: data3,
                              options: {
                             
                                
                                scales: {
                                  y: {
                                    beginAtZero: true
                                  }
                                  
                                }
                              },
                            };
                            var myChart3 = new Chart(
                                document.getElementById('myChart3'),
                                config3
                              );
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
              <div class="row">
                <!-- Order Statistics -->
              
                    
                      
                         
                    
                      
            

       


                            </div>
                            </div>
            <!-- / Content -->
<hr>
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  CRPMS ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                .All Rights Reserved
                 
                </div>
                <div>
          
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

  <!-- Datatable -->
   <script>
	
  // Change labels


  $('#myTable').dataTable( {
    info:false,
  // paging:false,
  pagingType:"simple",
  "language": {
    "decimal":        "",
    "emptyTable":     "No data available in table",
    "info":         "",
    // "infoEmpty":      "Showing 0 to 0 of 0 entries",
    "infoFiltered":   "",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Show _MENU_ entries",
    // "loadingRecords": "Loading...",
    "processing":     "",
    "search":         "Search:",
    
    "zeroRecords":    "No matching records found",
    

       "bProcessing": true,
    "sAutoWidth": false,
    "bDestroy":true,
    "sPaginationType": "bootstrap", // full_numbers
    "iDisplayStart ": 10,
    "iDisplayLength": 10,
    "bPaginate": false, //hide pagination
    "bFilter": false, //hide Search bar
    "bInfo": false, // hide showing entries
    "paginate": {
        // "first":      "First",
        // "last":       "Last",
        "next":       "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Next</button>",
        "previous":   "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Previous</button>",
        
    }
  }
} );


$('#myTable2').dataTable( {
  info:false,
  // paging:false,
  pagingType:"simple",
  "language": {
    "decimal":        "",
    "emptyTable":     "No data available in table",
    "info":" ",
    // "infoEmpty":      "Showing 0 to 0 of 0 entries",
    "infoFiltered":   "",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Show _MENU_ entries",
    // "loadingRecords": "Loading...",
    "ordering":"",
    "processing":     "",
    "search":         "Search:",
    "zeroRecords":    "No matching records found",

   
    "paginate": {
        // "first":      "First",
        // "last":       "Last",
        "next":       "<button  class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
        "previous":   "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>",
        
    }
  }
  

  
} );


   </script>


    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>


    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>


    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
