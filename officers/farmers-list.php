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
<?php

require 'connection.php';
?>
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

    <title>Farmers</title>
    <!-- TABS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="description" content="" />

        <!-- Datatables-->
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script> -->

    
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
require 'profile.php';
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
                    <a class="btn addBtn" href="farmers.php">Add Farmers</a>
                    
</div>
</div>
</div>
                          
                              
                         
                <!-- Farmers Forms -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Farmers List</h5>
                       
                     <div  class="nav-tabs" style="margin-left:10px">
                    
                 <!-- Tables -->
                 <div class="container">
                 <table id="farmersTable" class="table  table-striped table-bordered" style="width:1000px !importnant">
            <thead>
                <tr>
                    <th>Mobile number</th>
                    <th>Email</th>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last name</th>
                    <th>Gender</th>
                    <th>Birth date</th>
                  
                    <th>Region</th>
                   

                </tr>
            </thead>
            <tbody>
     
            <?php
$selectFarmers="select * from farmers";
$runSelectstmt=mysqli_query($conn,$selectFarmers);
foreach($runSelectstmt as $farmers)
{

               
                echo "<tr class='dataRow' data-phone='" . $farmers['mobileNumber'] . "' data-fname='" . $farmers['fname'] . 
               "' data-mname='" . $farmers['mname'] . "' data-lname='" . $farmers['lname'] 
               . "' data-gender='" . $farmers['gender'] . "' data-day='" . $farmers['birthDay'] . "'. data-month='" . $farmers['birthMonth'] . "'
               data-year='" . $farmers['birthYear'] . "'data-region='" . $farmers['region'] . "'>";
               ?>
                    <td class="tableData"><?php  echo $farmers['mobileNumber']?></td>
                    <td class="tableData"><?php  echo $farmers['email']?></td>
                    <td class="tableData"><?php echo $farmers['fname']?></td>
                    <td class="tableData"><?php echo $farmers['mname']?></td>
                    <td class="tableData"><?php echo $farmers['lname']?></td>
                    <td class="tableData"><?php echo $farmers['gender']?></td>
                    <td><?php echo $farmers['birthDay'].' -'.$farmers['birthMonth'].' - '.$farmers['birthYear']?></td>
               
                    <td class="tableData"><?php echo $farmers['region']?></td>
                   
                </tr>
                <?php
}
?>


</form>
</tbody>
        </table>
       <!-- UPDATE FORM -->
        <!-- Delete scripts -->
        <script>
        $(document).ready(function() {
            let selectedId = null; // Variable to hold the selected record ID

            // Row click event
            $("tr").click(function() {
                $("tr").removeClass("selected"); // Deselect previously selected row
                $(this).addClass("selected"); // Highlight the selected row
                selectedId = $(this).data("phone"); // Get the ID of the clicked row
            });

            // Delete button click event
            $("#delete-button").click(function() {
                if (selectedId === null) {
                    alert("Please select a record to delete.");
                    return;
                }
                if (confirm("Are you sure you want to delete this record?")) {
                    window.location.href = 'updatedeleteScripts.php?id=' + selectedId; // Redirect to delete.php
                }
            });
        });
    </script>



<!-- UPDATE RECORDS -->



    <!-- UPDATE SCRIPTS -->
    <script>
$(document).ready(function() {
    let selectedId = null; // Variable to hold the selected record ID

    // Row click event
    $("tbody tr").click(function() {
        // Remove highlight from previously selected row
        $("tbody tr").removeClass("selected");
        
        // Highlight the clicked row and get its ID
        $(this).addClass("selected");
        selectedId = $(this).data("phone"); // Get the data-id attribute
        
        // Populate the update form
        $("#updateid").val(selectedId);
        $("#fname").val($(this).data("fname"));
        $("#mname").val($(this).data("mname"));
        $("#lname").val($(this).data("lname"));
        $("#gend").val($(this).data("gender"));
        $("#day").val($(this).data("day"));
        $("#month").val($(this).data("month"));
        $("#year").val($(this).data("year"));
        $("#region").val($(this).data("region"));
        

        $("#updateForm").show(); // Show the update form
    });

 

    // Update form submission
    // $("#updateForm").submit(function(event) {
    //     event.preventDefault(); // Prevent the default form submission
    //     const formData = $(this).serialize(); // Serialize form data
        
    //     $.ajax({
    //         type: "POST",
    //         url: "updateScripts.php",
    //         data: formData,
    //         success: function(response) {
    //             alert(response);
    //             location.reload(); // Reload the page to see changes
    //         },
    //         error: function() {
    //             alert("Error updating record.");
    //         }
    //     });
    // });
});
</script>

        <div class="row">
          <div class="col-7">
          
<form id="updateForm" method="POST" action="updateScripts.php" style="display:none;">
<h3 style="margin-top:30px">Update Record</h3>

        <div class="row">
          <div class="col-8">
            <div class="block1">
          <div class="mb-3">
          <input type="hidden" id="updateid" name="phone">
          
    <label for="exampleInputPassword1" class="form-label">First name</label>
    <input type="text" class="form-control" name="fname" id="fname">
  </div>
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Middle  name</label>
    <input type="text" class="form-control" name="mname" id="mname">
  </div>
</div>
<div class="block2">
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last name</label>
    <input type="text" class="form-control" name="lname" id="lname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Gender</label>
    <input type="text" class="form-control" name="gend" id="gend" disabled>
  </div>
</div>
<div class="block3">
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Birth day</label>
    <input type="text" class="form-control" name="day" id="day" disabled>
  </div>
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Birth month</label>
    <input type="text" class="form-control" name="month" id="month" disabled>
  </div>
</div>
<div class="block4">
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Birth year</label>
    <input type="text" class="form-control" name="year" id="year" disabled>
  </div>
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Region</label>
    <input type="text" class="form-control" name="region" id="region">
  </div>   
</div>
    </div>
</div>

        <button type="submit" id="updateButton" style="margin-bottom:20px;margin-left:100px" name="update" class="btn btn-primary submitBtn">Update selected</button>

</form>
</div>
   
    

        
<?php
           
           ?>
          <div class="col-5">
          <div   style="margin-top:20px !important;margin-bottom:20px !important">
      
  
 
       
      <button id="delete-button" type="submit" name="updateFarmer" class="btn btn-primary submitBtn">Delete selected</button>
     
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
             
                
                        
          <style>
 
/* Hide paging buttons */

 .pagination .dt-paging-button
  {
     display: none !important;
     background:red !important
 }
 </style>                       
                      
                        
                        
                         
                 
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
     <script src="assets/vendor/libs/jquery/jquery.js"></script> 
   <script src="assets/vendor/libs/popper/popper.js"></script> 
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
