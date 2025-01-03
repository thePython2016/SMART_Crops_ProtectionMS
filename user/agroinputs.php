<?php

session_start();
if(!isset($_SESSION['username']))
{
  echo "
  <script>
  window.location.href='../index.php';
  </script>
  ";
}

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
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

    <title>AgroInputs</title>
    <!-- TABS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="description" content="" />

        <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>

    
     <!-- End dataTable 
    Favicon  -->
    <!-- <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" /> -->

    <!-- Fonts -->
    <!---- <link rel="preconnect" href="https://fonts.googleapis.com" /> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <linkhref="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet">
    

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <!-- <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> -->
    <link rel="stylesheet" href="assets/css/demo.css" />
     <link rel="stylesheet" href="assets/css/main.css" /> 

    <!-- Vendors CSS -->
    <!-- <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
  
     <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script> -->




    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tabs -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  
                     <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
                     
                    </head>

  <body>

    <!-- Layout wrapper -->
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
                <!-- Place this tag where you want the button to render. -->
       

                <?php
                require "profile.php";
                ?>
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
  
                
                 

                <div class="col-lg-12 col-md-3 order-1">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <a class="btn addBtn" href="agroinputs.php">Add AgroInput</a>
</div>
</div>
</div>
                          
                              
                         
                <!-- Farmers Forms -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Add /View Agro-Inputs</h5>
                       
                     <div  class="nav-tabs" style="margin-left:10px">
                    
                 

                    <!--Tabs  -->
              
                    <div class="container mt-4">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#agroForm" role="tab" aria-controls="tab1" aria-selected="true">Agro-Inputs</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#editUpdate" role="tab" aria-controls="tab3" aria-selected="false">Agro-Inputs List</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#uploadForm" role="tab" aria-controls="tab2" aria-selected="false">Upload (Agro-Inputs)</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#uploadSample" role="tab" aria-controls="tab3" aria-selected="false">Upload Sample</a>
        </li>
   
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="agroForm" role="tabpanel" aria-labelledby="tab1-tab">

         
       <!-- Farmers Form -->
       <form name="" method="POST" action="agroinputsScripts.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" id="Inputmobile"class="form-label" >Input number</label>
    <input type="text" class="form-control" name="inputid" id="Inputmobile" aria-describedby="emailHelp" required placeholder="Input number">
    
  </div>
  <div class="first-row-form">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" class="form-control" name="inputname" id="InputFirstname" required placeholder="Input name">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" id="InputLastname">Category</label>
    <input type="text" class="form-control" name="inputcategory" id="InputLastname" required placeholder="Input category">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" id="InputLastname" class="form-label">Usage</label>
    <input type="text" class="form-control"  name="inputusage" id="InputLastname" required placeholder="Input usage">
  </div>
</div>
  <button type="submit" name="submit" class="btn btn-primary submitBtn">Submit</button>
</form>
        </div>
        <div class="tab-pane fade" id="editUpdate" role="tabpanel" aria-labelledby="tab2-tab">
           
            <div class="container">
            <table id="farmersTable" class="table  table-striped table-bordered" style="width:1000px !importnant">
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

require 'connection.php';
$selectInputs="select * from agroinputs";
$runSelectstmt=mysqli_query($conn,$selectInputs);
foreach($runSelectstmt as $farmers)
{
  ?>
               
                <tr>
                    <td><?php echo $farmers['inputsNumber']?></td>
                    <td><?php echo $farmers['name']?></td>
                    <td><?php echo $farmers['category']?></td>
                    <td><?php echo $farmers['usage_']?></td>
                   
                   
                </tr>
                <?php
}
?>
             
            </tbody>
        </table>
        </div>
</div>
        <div class="tab-pane fade" id="uploadForm" role="tabpanel" aria-labelledby="tab3-tab">
        
            <form name="" method="POST" action="importAgroinputs.php" enctype="multipart/form-data">
            <input type="file" class="form-control" id="Inputaddress" name="inputs-file">
            <button type="submit" name="importInputs" class="btn  uploadBtn">Upload</button>
</form>
        </div>
        


        
        <div class="tab-pane fade" id="uploadSample" role="tabpanel" aria-labelledby="tab3-tab">
        <a href="downloads/agroInputs.csv"  class="payment-sample" download="agroInputs.csv">Agro-Inputs Sample File</a> <br>

              
        </div>
    </div>
</div>






                     </div>
                        <!-- Charts -->
 
                      </div>
        <!-- TABS SCRIPT -->
        
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
                  CRPMS ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                .All Rights Reserved
                 
                </div>
                <div>
                  <!-- <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  > -->
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

// new DataTable('#myTable', {
//     language: {
//         paginate: {
//             first: 'First page'
//         }
//     }
// });

// table one
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

    //    "bProcessing": true,
    // "sAutoWidth": false,
    // "bDestroy":true,
    // "sPaginationType": "bootstrap", // full_numbers
    // "iDisplayStart ": 10,
    // "iDisplayLength": 10,
    // "bPaginate": false, //hide pagination
    // "bFilter": false, //hide Search bar
    // "bInfo": false, // hide showing entries
    "paginate": {
        // "first":      "First",
        // "last":       "Last",
        "next":       "<button  class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
        "previous":   "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>",
        
    }
  }
  

  
} );




// Framers dataTable

$('#farmersTable').dataTable( {
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

    //    "bProcessing": true,
    // "sAutoWidth": false,
    // "bDestroy":true,
    // "sPaginationType": "bootstrap", // full_numbers
    // "iDisplayStart ": 10,
    // "iDisplayLength": 10,
    // "bPaginate": false, //hide pagination
    // "bFilter": false, //hide Search bar
    // "bInfo": false, // hide showing entries
    "paginate": {
        // "first":      "First",
        // "last":       "Last",
        "next":       "<button  class='paging-button' style='border:1px solid grey !important;color:grey;margin:0'>Next</button>",
        "previous":   "<button class='paging-button' style='border:1px solid grey !important;color:grey'>Previous</button>",
        
    }
  }
  

  
} );

</script>

<!-- Get Years -->
<script>
    // Set the starting and ending year
    const startYear = 1950;
    const endYear = 2002;

    // Get the dropdown element
    const yearSelect = document.getElementById('Inputyear');

    // Loop through the years from startYear to endYear
    for (let year = startYear; year <= endYear; year++) {
        let option = document.createElement('option');
        option.value = year; // Set the value as the year
        option.textContent = year; // Set the display text as the year
        yearSelect.appendChild(option); // Append the option to the select element
    }
</script>
<!-- Months -->

 <!-- Script -->
 <script>
    // Array of month names
    const months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];

    // Get the dropdown element
    const monthSelect = document.getElementById('Inputmonth');

    // Loop through the months array and add options dynamically
    months.forEach((month, index) => {
        let option = document.createElement('option');
        option.value = index + 1; // Set the value as the month number
        option.textContent = month; // Set the display text as the month name
        monthSelect.appendChild(option); // Append the option to the select element
    });
</script>

<!-- Generate Days -->
<script>
    // Get the day dropdown element
    const daySelect = document.getElementById('Inputday');

    // Populate day dropdown with values from 1 to 31
    for (let day = 1; day <= 31; day++) {
        let option = document.createElement('option');
        option.value = day; // Set the value as the day number
        option.textContent = day; // Set the display text as the day number
        daySelect.appendChild(option); // Append the option to the select element
    }
</script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <!-- <script src="assets/vendor/libs/jquery/jquery.js"></script> -->
    <!-- <script src="assets/vendor/libs/popper/popper.js"></script> -->
    <!-- <script src="assets/vendor/js/bootstrap.js"></script> -->
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- TABS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
