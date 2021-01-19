


    
 

?>

<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 8;
// Prepare the SQL statement and get records from our claims table, LIMIT will determine the page
$stmt = $pdo->prepare("SELECT * FROM claims  ORDER BY Claimid LIMIT :current_page, :record_per_page");
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$claims = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of $claims, this is so we can determine whether there should be a next and previous button
$num_claims = $pdo->query("SELECT COUNT(*) FROM claims")->fetchColumn();
?>

<style>
    
   table {
  table-layout: fixed ;
  width: 100% ;
}
td {
  width: 12.5% ;
} 

form label {font-weight:bold}



    
</style>
<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Claims</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                            <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="Admin.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">Invoice dashboard</a></li>
                                    <li><a href="index2.html">Claims dashboard</a></li>
                                    <li><a href="index3.html">Customer dashboard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Invoices
                                        
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="Invoices.php">View all Invoices</a></li>
                                    <li><a href="">Manually add an Invoice</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Claims</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="Claims.php">View All Claims</a></li>
                                    <li><a href="CreateClaim.php">Create a Claim</a></li>
                                  </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Offers</span></a>
                                <ul class="collapse">
                                    <li><a href="Offers.php">View Offer</a></li>
                                    <li><a href="CreateOffer.php">Create an Offer</a></li>
                              
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Customers</span></a>
                                <ul class="collapse">
                                    <li><a href="Customers.php">View Customer</a></li>
                                    <li><a href="CreateCustomer.php">Complete Onboarding</a></li>
                                </ul>
                            </li>
                        
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                      
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                          
                            
                            </li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            
                            <ul class="breadcrumbs pull-left">
                           <li><a href="Home.php">Home</a></li>
                                <li><span>Claims</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                          <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?> <i class="fa fa-angle-down"></i></h4>
                             <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="index.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            
            </div>

          <form action="" method="POST">
               <label for="search">Quick Find:</label> 
                     &nbsp;&nbsp;
                     <input type="text" id="search" name="claimnumber" placeholder="Claim">
                     &nbsp;&nbsp;
                     <button type="submit" name="button1" value="button1">Go</button>
                    </form>             
  

            <div class="card"> 
                 
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Claims</h4>
                                   
                                </div>
                                 <!-- Display table of claims -->
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                        <table class="dbkit-table">
                                            <tr>
                                                <td class=""><b>Claim Number</b></td>
                                               <td class=""><b>Customer</b></td>
                                                  <td class=""><b>Invoice Number</b></td>
                                                <td class=""><b>Amount</b></td>
                                                 <td class=""><b>Offer Code</b></td>
                                                <td class=""><b>Date</b></td>
                                               <td class=""><b> Status</b></td>
                                               <td class=""></td>
                                               <td class="">Re-Open Rejected Claim</td>
                                            </tr>
            <?php foreach ($claims as $claims): ?>
           
                        <?php         if   ($claims['Status'] <> 'Rejected')         { ?>
                                            <tr>
                                                 <!-- Open ClaimPage for that Claim Number -->
                                                <td><a href="ClaimPage.php?ClaimNum=<?=$claims['ClaimNum']?>"><?=$claims['ClaimNum']?></a></td>
                                            
                                            
                                                <td class=""><?=$claims['Cus_Name']?></td>
                                                <td class=""><?=$claims['InvoiceNum']?></td>
                                                <td class=""><?=$claims['amount']?></td>
                                                 <td><a href="OfferPage.php?OfferCode=<?=$claims['offercode']?>"><?=$claims['offercode']?></a></td>
                                                <td class=""><?=$claims['creation_date']?></td>
                                                <td class=""><?=$claims['Status']?></td>
                                               <td><a href="">Download Invoice</a></td>
                                                 <td></td>
                                            </tr>
                                            
                                            <?php }
 
 else
 { ?>
      <tr>
                                                 <!-- Open ClaimPage for that Claim Number -->
                                                <td><a href="ClaimPage.php?ClaimNum=<?=$claims['ClaimNum']?>"><?=$claims['ClaimNum']?></a></td>
                                            
                                            
                                                <td class=""><?=$claims['Cus_Name']?></td>
                                                <td class=""><?=$claims['InvoiceNum']?></td>
                                                <td class=""><?=$claims['amount']?></td>
                                                 <td><a href="OfferPage.php?OfferCode=<?=$claims['offercode']?>"><?=$claims['offercode']?></a></td>
                                                <td class=""><?=$claims['creation_date']?></td>
                                                <td class=""><?=$claims['Status']?></td>
                                               <td><a href="">Download Invoice</a></td>
                                               <td><a href="ReOpen.php?ClaimNum=<?=$claims['ClaimNum']?>">Re-Open</a></td>
                                            </tr>
     
<?php } ?>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                                  <!-- Next/Previous Page-->
                                 <div class="pagination">
                 <div class="pagination_area pull-right mt-5">
<ul>
<?php if ($page > 1): ?>
<li><a href="Claims.php?page=<?=$page-1?>"><</a></li>
<?php endif; ?>
<?php if ($page*$records_per_page < $num_claims): ?>
<li><a href="Claims.php?page=<?=$page+1?>">></a></li>
<?php endif; ?>

</ul>
</div>
	
                        
                            </div>
                            
                             
                        </div>
                             
             
            
    
           
                        
                        
                    
                        <div class="col-md-4">
                          
                        </div>
                        <div class="col-md-4">
                          
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                       
                    </div>
                    <div class="col-xl-3 col-lg-4 coin-distribution">
                     
                    </div>
                </div>
               
                            </div>
                        </div>
                    </div>
              
             
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
 
         
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
