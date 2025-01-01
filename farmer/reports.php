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

    <title>Reports</title>
    <!-- TABS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="description" content="" />

        <!-- Datatables-->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script> 

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> <!-- Required for Excel Export -->
   <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
</head>
  

    

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <linkhref="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet">
    

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <!-- <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> -->
    <link rel="stylesheet" href="assets/css/demo.css" />
     <link rel="stylesheet" href="assets/css/main.css" /> 






    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    

   
    <script src="assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tabs -->

    
                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  
                  
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
                    <!-- <button type="button" class="btn btn-success addBtn">Add Officer</button> -->
</div>
</div>
</div>
                          
                              
                         
                <!-- Farmers Forms -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row  g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Generate reports</h5>
                       
                     <div  class="nav-tabs" style="margin-left:5px;margin-bottom:50px;">


                     <!-- Display on selection script -->
                      
                  
           
<script>

$(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="farmers"){
                    $(".box").hide();
                    $(".farmer").show();
                }
                if($(this).attr("value")=="agroinputs"){
                    $(".box").hide();
                    $(".agroinputs").show();
                }
                if($(this).attr("value")=="officer"){
                    $(".box").hide();
                    $(".officer").show();
                }
                if($(this).attr("value")=="choose"){
                    $(".box").hide();
                    $(".choose").show();
                }
            });
        }).change();
    });
</script>
<style>

    .contents{
            padding: 20px;
            display: none;
            margin-top: 20px;
            border: 1px solid #000;
        }
        
    </style> 
<div>
<form name="" action="reports.php" method="POST">

        
<select class="form-select" style="width:1000px;margin:0 auto;" >


<option value="choose">Select Option</option>
        <option value="farmers">Farmers</option>
        <option value="agroinputs">Agro-In puts</option>
        <option value="officer">Agriculural Officers</option>
</select>
</form>
  
</div>
<!-- Farmers BLOCK -->
<div class="farmer box">     
     <div class="container" style="margin-top:40px !important">
   
       
   <!-- Date Filters -->
   <div class="row mb-3">
       <div class="col-md-3">
           <label for="minDate">Date From:</label>
           <input type="date" id="minDate" class="form-control"> <!-- Changed input type to 'date' -->
       </div>
       <div class="col-md-3">
           <label for="maxDate">Date To:</label>
           <input type="date" id="maxDate" class="form-control"> <!-- Changed input type to 'date' -->
       </div>
   </div>

   <table id="farmersTable" class="table  table-striped table-bordered" style="width:1000px !importnant">
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
$selectFarmers="select * from farmers";
$runSelectstmt=mysqli_query($conn,$selectFarmers);
foreach($runSelectstmt as $farmers)
{
  ?>
               
                <tr>
                    <td><?php echo $farmers['mobileNumber']?></td>
                    <td><?php echo $farmers['fname']?></td>
                    <td><?php echo $farmers['mname']?></td>
                    <td><?php echo $farmers['lname']?></td>
                    <td><?php echo $farmers['gender']?></td>
                    <td><?php echo $farmers['birthDay']?></td>
                    <td><?php echo $farmers['birthMonth']?></td>
                    <td><?php echo $farmers['birthYear']?></td>
                    <td><?php echo $farmers['region']?></td>
                   
                </tr>
                <?php
}
?>
             
            </tbody>
        </table>
</div></div>


<!-- AGROINPUTS BLOCK -->
<div class="agroinputs box">     
     <div class="container" style="margin-top:40px !important">
   <!-- Date Filters -->
   <div class="row mb-3">
       <div class="col-md-3">
           <label for="minDate">Date From:</label>
           <input type="date" id="minDate" class="form-control"> <!-- Changed input type to 'date' -->
       </div>
       <div class="col-md-3">
           <label for="maxDate">Date To:</label>
           <input type="date" id="maxDate" class="form-control"> <!-- Changed input type to 'date' -->
       </div>
   </div>

   <table id="agroinputsTable" class="table  table-striped table-bordered" style="width:1000px !importnant">
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
</div></div>






<!-- OFFICERS BLOCK -->
<div class="officer box">     
     <div class="container" style="margin-top:40px !important">
   
       
   <!-- Date Filters -->
   <div class="row mb-3">
       <div class="col-md-3">
           <label for="minDate">Date From:</label>
           <input type="date" id="minDate" class="form-control"> <!-- Changed input type to 'date' -->
       </div>
       <div class="col-md-3">
           <label for="maxDate">Date To:</label>
           <input type="date" id="maxDate" class="form-control"> <!-- Changed input type to 'date' -->
       </div>
   </div>

   <table id="officersTable" class="table  table-striped table-bordered" style="width:1000px !importnant">
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
require 'connection.php';
$selectFarmers="select * from agroofficers";
$runSelectstmt=mysqli_query($conn,$selectFarmers);
foreach($runSelectstmt as $farmers)
{
  ?>
               
                <tr>
                    <td><?php echo $farmers['mobileNumber']?></td>
                    <td><?php echo $farmers['occupation']?></td>
                    <td><?php echo $farmers['fname']?></td>
                    <td><?php echo $farmers['mname']?></td>
                    <td><?php echo $farmers['lname']?></td>
                    <td><?php echo $farmers['gender']?></td>
                    <td><?php echo $farmers['birthDay']?></td>
                    <td><?php echo $farmers['birthMonth']?></td>
                    <td><?php echo $farmers['birthYear']?></td>
                    <td><?php echo $farmers['address']?></td>
                   
                </tr>
                <?php
}
?>
             
            </tbody>
        </table>
</div></div>
<div class="green box">You have selected <strong>green option</strong> so i am here</div>
<div class="blue box">You have selected <strong>blue option</strong> so i am here</div>
                     </div>
                  
            
   <style>

.buttons-excel {
          margin-left:600px !important;
       }
       .pdfBtn, .excelBtn, .printBtn{
        background-color:#375E97 !important;
       }
       .pdfBtn, .excelBtn, .printBtn :hover{
        background-color:#375E97 !important;
       }
       /* Custom margin for buttons */
       .dt-buttons {
           margin-right: 10px !important;
           margin-bottom:10px !important;
       }
       .dt-length{
        /* margin-top:30px !important; */
        position:absolute !important;
       }
       .pdfIcon,  .printIcon, .excelIcon {
        filter: invert(100%) sepia(100%) saturate(16%) hue-rotate(283deg) brightness(106%) contrast(104%);
       
       }
       .pdfIcon,  .printIcon, .excelIcon :hover {
       
        /* filter: invert(100%) sepia(100%) saturate(16%) hue-rotate(283deg) brightness(106%) contrast(104%); */
       }
   </style>




<!-- Famers Table data -->
   <script>
   $(document).ready(function() {
       // DataTable initialization
       var table = $('#farmersTable').DataTable({
           dom: 'lBfrtip',
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
  },
  
          buttons: [
               {
                   extend: 'excelHtml5',
                  //  text: '<i class="fas fa-file-excel"></i> Export to Excel',
                  text: '<i class="fas fa-file-excel excelIcon fs-4"></i>',
                   className: 'btn btn-success excelBtn',
                   titleAttr: 'Export table data to Excel'
               },
               {
                   extend: 'pdfHtml5',
                  //  text: '<i class="fas fa-file-pdf"></i> Export to PDF',
                  text: '<i class="fas fa-file-pdf pdfIcon fs-4"></i>', 
                   className: 'btn btn-danger pdfBtn',
                   titleAttr: 'Export table data to PDF'
                   
               },
               {
                   extend: 'print',
                  //  text: '<i class="fas fa-print"></i> Print Table',
                  text: '<i class="fas fa-print printIcon fs-4"></i>',
                   className: 'btn btn-primary printBtn',
                   titleAttr: 'Print table data'
                   
               }
           ],
           pageLength: 10,
           lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
           responsive: true
       });
       
        // Date filter functionality
        $('#filterBtn').click(function() {
            var dateFrom = $('#dateFrom').val();
            var dateTo = $('#dateTo').val();

            // Filter logic based on date
            if (dateFrom !== "" && dateTo !== "") {
                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var dateCell = this.data()[3]; // Get the date from the 4th column (index 3)
                    if (dateCell >= dateFrom && dateCell <= dateTo) {
                        this.node().style.display = ''; // Show row if within range
                    } else {
                        this.node().style.display = 'none'; // Hide row if not in range
                    }
                });
            } else {
                table.rows().every(function() {
                    this.node().style.display = ''; // Show all rows if no date filter is applied
                });
            }
        });
       // Custom filtering for date range
       $.fn.dataTable.ext.search.push(
           function(settings, data, dataIndex) {
               var min = $('#minDate').val();
               var max = $('#maxDate').val();
               var startDate = data[4]; // Use the 'Start date' column (index 4)

               // Convert dates to proper format for comparison
               if (min) {
                   min = new Date(min);
               }
               if (max) {
                   max = new Date(max);
               }
               var date = new Date(startDate);

               if (
                   (!min || date >= min) && (!max || date <= max)
               ) {
                   return true;
               }
               return false;
           }
       );

       // Event listener to the two date inputs to redraw on change
       $('#minDate, #maxDate').on('change', function() {
           table.draw();
       });
   });
   </script>
                    
                    
                    <!-- AgroINPUTS table data -->
                    <script>
   $(document).ready(function() {
       // DataTable initialization
       var table = $('#agroinputsTable').DataTable({
           dom: 'lBfrtip',
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
  },
  
          buttons: [
               {
                   extend: 'excelHtml5',
                  //  text: '<i class="fas fa-file-excel"></i> Export to Excel',
                  text: '<i class="fas fa-file-excel excelIcon fs-4"></i>',
                   className: 'btn btn-success excelBtn',
                   titleAttr: 'Export table data to Excel'
               },
               {
                   extend: 'pdfHtml5',
                  //  text: '<i class="fas fa-file-pdf"></i> Export to PDF',
                  text: '<i class="fas fa-file-pdf pdfIcon fs-4"></i>', 
                   className: 'btn btn-danger pdfBtn',
                   titleAttr: 'Export table data to PDF'
               },
               {
                   extend: 'print',
                  //  text: '<i class="fas fa-print"></i> Print Table',
                  text: '<i class="fas fa-print printIcon fs-4"></i>',
                   className: 'btn btn-primary printBtn',
                   titleAttr: 'Print table data'
               }
           ],
           pageLength: 10,
           lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
           responsive: true
       });
       
        // Date filter functionality
        $('#filterBtn').click(function() {
            var dateFrom = $('#dateFrom').val();
            var dateTo = $('#dateTo').val();

            // Filter logic based on date
            if (dateFrom !== "" && dateTo !== "") {
                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var dateCell = this.data()[3]; // Get the date from the 4th column (index 3)
                    if (dateCell >= dateFrom && dateCell <= dateTo) {
                        this.node().style.display = ''; // Show row if within range
                    } else {
                        this.node().style.display = 'none'; // Hide row if not in range
                    }
                });
            } else {
                table.rows().every(function() {
                    this.node().style.display = ''; // Show all rows if no date filter is applied
                });
            }
        });
       // Custom filtering for date range
       $.fn.dataTable.ext.search.push(
           function(settings, data, dataIndex) {
               var min = $('#minDate').val();
               var max = $('#maxDate').val();
               var startDate = data[4]; // Use the 'Start date' column (index 4)

               // Convert dates to proper format for comparison
               if (min) {
                   min = new Date(min);
               }
               if (max) {
                   max = new Date(max);
               }
               var date = new Date(startDate);

               if (
                   (!min || date >= min) && (!max || date <= max)
               ) {
                   return true;
               }
               return false;
           }
       );

       // Event listener to the two date inputs to redraw on change
       $('#minDate, #maxDate').on('change', function() {
           table.draw();
       });
   });
   </script>


<!-- Agro officers table data -->
<script>
   $(document).ready(function() {
       // DataTable initialization
       var table = $('#officersTable').DataTable({
           dom: 'lBfrtip',
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
  },
  
          buttons: [
               {
                   extend: 'excelHtml5',
                  //  text: '<i class="fas fa-file-excel"></i> Export to Excel',
                  text: '<i class="fas fa-file-excel excelIcon fs-4"></i>',
                   className: 'btn btn-success excelBtn',
                   titleAttr: 'Export table data to Excel'
               },
               {
                   extend: 'pdfHtml5',
                  //  text: '<i class="fas fa-file-pdf"></i> Export to PDF',
                  text: '<i class="fas fa-file-pdf pdfIcon fs-4"></i>', 
                   className: 'btn btn-danger pdfBtn',
                   titleAttr: 'Export table data to PDF'
               },
               {
                   extend: 'print',
                  //  text: '<i class="fas fa-print"></i> Print Table',
                  text: '<i class="fas fa-print printIcon fs-4"></i>',
                   className: 'btn btn-primary printBtn',
                   titleAttr: 'Print table data'
               }
           ],
           pageLength: 10,
           lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
           responsive: true
       });
       
        // Date filter functionality
        $('#filterBtn').click(function() {
            var dateFrom = $('#dateFrom').val();
            var dateTo = $('#dateTo').val();

            // Filter logic based on date
            if (dateFrom !== "" && dateTo !== "") {
                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var dateCell = this.data()[3]; // Get the date from the 4th column (index 3)
                    if (dateCell >= dateFrom && dateCell <= dateTo) {
                        this.node().style.display = ''; // Show row if within range
                    } else {
                        this.node().style.display = 'none'; // Hide row if not in range
                    }
                });
            } else {
                table.rows().every(function() {
                    this.node().style.display = ''; // Show all rows if no date filter is applied
                });
            }
        });
       // Custom filtering for date range
       $.fn.dataTable.ext.search.push(
           function(settings, data, dataIndex) {
               var min = $('#minDate').val();
               var max = $('#maxDate').val();
               var startDate = data[4]; // Use the 'Start date' column (index 4)

               // Convert dates to proper format for comparison
               if (min) {
                   min = new Date(min);
               }
               if (max) {
                   max = new Date(max);
               }
               var date = new Date(startDate);

               if (
                   (!min || date >= min) && (!max || date <= max)
               ) {
                   return true;
               }
               return false;
           }
       );

       // Event listener to the two date inputs to redraw on change
       $('#minDate, #maxDate').on('change', function() {
           table.draw();
       });
   });
   </script>
 
                      </div>
  
        
                    </div>
                  </div>
                </div>

          </div>
             
                
                        
                           
                      
                        
                        
                         
                 
            </div>
            <!-- / Content -->

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


    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 


    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

  
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- TABS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
