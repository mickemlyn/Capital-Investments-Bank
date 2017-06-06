<?php
session_start();
if (isset($_SESSION['user']) && (time() - $_SESSION['LAST_ACTIVITY'] < 900))
   // last request was less than 15 minutes ago 
    {
   $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
 ?>
<! doctype html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>CIB-Finance Dept.</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="Font-Awesome/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--<link href="bootstrap.css" rel="stylesheet">-->
    <!-- Material Design Bootstrap -->
<!--    <link href="css/mdb.min.css" rel="stylesheet">-->
<link href="css/stolen.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) 
    <link href="css/style.css" rel="stylesheet"> -->
<style>
    /* YOUR CUSTOM STYLES */

html,
body,
.view {
    height: 100%;
}

/*Intro*/

.view {
    background: url("blue.png")no-repeat center fixed;
        -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

@media (max-width: 768px) {
    .full-bg-img,
    .view {
        height: auto;
        position: relative;
    }
}

/* Navigation*/

.navbar {
    background-color: transparent;
}

.top-nav-collapse {
    background-color: #1C2331;
}

@media only screen and (max-width: 768px) {
    .navbar {
        background-color: #1C2331;
    }
}

.description {
    padding-top: 25%;
    padding-bottom: 3rem;
    color: #fff
}

@media (max-width: 992px) {
    .description {
        padding-top: 7rem;
        text-align: center;
    }
}

.fa-check {
    color: green;
}
/*
a, .navbar.navbar-dark .navbar-nav .nav-item a {
    color: #0275d8;
    -webkit-transition: .35s;
    transition: .35s;
}
*/

.dropdown-item:hover {
  background: #eceff1; }
    .nav-item{
        color: #eceff1;
    }

</style>
</head>

<body>


    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark scrolling-navbar fixed-top" >
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="Capital%20inestments%20bank%20brand.png"  height="40" class="d-inline-block align-top z-depth-0" alt="Capital Investments Bank">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <!--Links-->
                <ul class="nav navbar-nav nav-flex-icons ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" title="You are Home" href="#top-section" >Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="View and Place orders" href="#best-features">Orders </a>
                    </li>
                    <li class="nav-item dropdown btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Add and View system users">Users</a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="adduserform.php" target="_blank">Add User</a>
                        <a class="dropdown-item" href="viewusers.php"> View Users</a>
                        <a class="dropdown-item"  href="viewusers.php">Update Info</a>
                        <a class="dropdown-item" href="viewusers.php"> Delete User</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="newbranch.php">New Branch</a>
                    </div>
                </li>
                   <li class="nav-item">
                        <a class="nav-link" href="finance_profile.php" title="View and edit your Profile">Profile</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing" title="View Performances">Performance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" title="View and Generate Reports">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" title="Get system help">Help</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" title="LogOut"><i class="fa fa-sign-out" aria-hidden="true"></i>
</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
    <!--/.Navbar-->
<div id="top-section"></div>
        <!--Mask-->
    <div class="view hm-black-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row" id="home">

                    <!--First column-->
                    <div class="col-lg-5">
                        <div class="description">
                            <h2 class="h2-responsive wow fadeInLeft" >Finance Dept.</h2>
                            <hr class="hr-dark">
                            <p class="wow fadeInLeft" data-wow-delay="0.4s">Our eProcurement system provides what professionals need to manage procurement from RFQ generation to placing new orders, support supplier and budget allocation, and offers support for user feedback on the quality of service. Read more on the Process Workflow below...</p>
                            <br>
                            <a href="#process" class="btn btn-primary wow fadeInLeft" data-wow-delay="0.7s">View Process</a>
                        </div>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-lg-6">
                        <!--Form-->
                        <div class="card wow fadeInRight">
                            <div class="card-block">
                                <!--Header-->
                                <div>
                                      <h3 class="text-center h3-responsive"><i class="fa fa-university" aria-hidden="true"></i> eProcurement Overview</h3>
<blockquote class="blockquote">
  <p class="mb-0"><small class="text-muted">The bank has an Approved Vendor's list(Recommended Suppliers that are mantained throughout the financial year selected upon their performance and also what they offer. Each supplier has the category of goods that he/she offers for instance: - Computing. Once a supplier is chosen, the bank sticks with that relationship and tries to establish preferred Pricing and specific terms i.e delivery. <br>You will receive email notifications for activities regarding your operations.<br><b>Invoice Approval and Payment. </b> The three documents:- Invoice, Receiving document(Attached to the product durin delivery) and the Original Purchase Order are required for payment processing at the end of every month.</small></p>
</blockquote>  
                                </div>
                            </div>
                        </div>
                        <!--/.Form-->
                    </div>
                    <!--/Second column-->
            <div class="col-lg-1" >
            <h6 class="h6-responsive lead pull-right" style="color: white;"><b><small > <img src="<?php echo $_SESSION['profilePic']; ?>" title="Logged In" class="img-rounded img-responsive"  style="height:45px;"> <?php echo $_SESSION['user']; ?></small></b></h6> 
            </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.Mask-->
        <div class="container" >
               <div class="row">
                 <!--Main container-->
                   <div class="col-lg-12"><h3 class="h3-responsive" style="padding-top:10px;" id="process"><i class="fa fa-tasks" aria-hidden="true"></i> The eProcurement Process</h3></div>

        
            <!--Section: Testimonials-->
        <section id="testimonials">
            <div class="row">

                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item wow fadeIn" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating btn-small mdb-color" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating btn-small mdb-color" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                        <li data-target="#multi-item-example" data-slide-to="1"></li>
                        <li data-target="#multi-item-example" data-slide-to="2"></li>                   
                        <li data-target="#multi-item-example" data-slide-to="3"></li>
                    </ol>
                    <!--/.Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="col-md-4">
                                <!--Card-->
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/need1.jpg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">Identify Need</h4>
                                        <hr>
                                        <!--Quotation-->
                                        <p><i class="fa fa-quote-left"></i> An officer incharge of Stores recognizes a product is needed in order to purchase it. The product can either be brand new, or one that is being re-ordered, and then requests for its ordering by a Procurement Officer. </p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>
                            <div class="col-md-4 hidden-sm-down">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/accept.jpg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <!--Name-->
                                        <h4 class="card-title">Initiating Requisition </h4>
                                        <hr>
                                        <!--Quotation-->
                                        <p><i class="fa fa-quote-left"></i> A procurement Officer prepares a User Requisition informing Head of User dept. incharge of approving purchases that a product is required; who Approves the Request or Declines it depending on the quantities in store and essentialness. </p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>
                            <div class="col-md-4 hidden-sm-down">
                                <!--Card-->
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/rfq2.png" class="img-circle img-responsive">
                                    </div>

                                    <div class="card-block">
                                        <!--Name-->
                                        <h4 class="card-title">Request for Quotation</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> The user dept. initiates the procurement process, by placing a requisition to a preferred Supplier selected by the system stating the specific requirements of the items they would like to procure, which is fowarded to the Supplier.
                                        </p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>


                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <!--Card-->
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/send.png" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">RFQ Fowarded to Supplier</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> If the requisition was approved, it is send to the selected supplier.  The Supplier checks the Request for quotation form from the procurement officer to see what the branch would like to procure.
                                        </p>
                                    </div>

                                </div>
                                <!--/.Card-->
                            </div>

                            <div class="col-md-4 hidden-sm-down">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/quotation.png" class="img-circle img-responsive">
                                    </div>

                                    <div class="card-block">
                                        <!--Name-->
                                        <h4 class="card-title">Supplier Sends Quotation</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> The supplier analyses the RFQ from the Procurement officer to get the  kind of item(s) required. He then compiles a Quotation with a variery of items offered as per the requirements.
                                        </p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>

                            <div class="col-md-4 hidden-sm-down">
                                <!--Card-->
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/order1.png" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">Placing a Purchase Order</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> After receiving the Quotation, the procurement officer uses it to select the desired item from the options and then places an order using the given Specific Item details on the Quotation.</p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>
                        </div>
                        <!--/.Second slide-->

                        <!--Third slide-->
                        <div class="carousel-item">
                            <div class="col-md-4">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/approve%20order.jpg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <!--Name-->
                                        <h4 class="card-title">New Order Approval</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> After a purchase order (PO) has been created, it has to go through an approval process. The Procurement Manager has to the check the details of the PO are correct and that it is according to the quotation and then Approves it.</p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>

                            <div class="col-md-4 hidden-sm-down">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/supplier.jpeg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <!--Name-->
                                        <h4 class="card-title">Supplier Receives New Order</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> After the Order has been Confirmed by Pocurement Manager, It is fowarded to the Supplier. He/She checks if it was placed according to the issued quotation then indicates the status of the order to have been "received".</p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>

                            <div class="col-md-4 hidden-sm-down">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/procurent%20processing.jpg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">Order Processing</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> The supplier marks the order on the system as "being processed". During this time, the supplier sources for the items and prepares the ordered items for deivery to the branch according to their agreement before being dispatched. </p>
                                    </div>

                                </div>
                                <!--/.Card-->
                            </div>

                        </div>
                        <!--/.Third slide-->
                        <!--Forth-->
                        <div class="carousel-item">

                            <div class="col-md-4">
                                <!--Card-->
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/dispatch.gif" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">Goods Dispatched</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> The Supplier marks that order as "dispatched" and then organises for its transportation and delivery to the branch location or according to their agreement. The product must be delivered within the agreed time.</p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>

                            <div class="col-md-4 hidden-sm-down">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/receiving.jpg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">Order Delivered</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> Once Delivered, the Stores Manager  inspects and subsequently Accepts or rejects the Product(s). To accept, they change status of the order as "Received" or decline as "Rejected". system generates goods received note(GRN) </p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>

                            <div class="col-md-4 hidden-sm-down">
                                <div class="card testimonial-card">
                                    <div class="card-up blue darken-1">
                                    </div>
                                    <div class="avatar"><img src="process/ratings.jpg" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title">User Feedback</h4>
                                        <hr>
                                        <p><i class="fa fa-quote-left"></i> After receiving the items, the procurement officer will then submit feedback of their level satisfaction with the supplier services by rating the service on the system. Its these ratings that are used to gauge supplier performance.</p>
                                    </div>
                                </div>
                                <!--/.Card-->
                            </div>
                        </div>
                        <!--/.Forth slide-->
                    </div>
                    <!--/.Slides-->
                </div>
                <!--/.Carousel Wrapper-->
            </div>
        </section>
    <!--Section: outline-->
    <section>
        <div class="row">
        <!--First column-->
            <div class="col-md-12">
                <div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
                <a href="#top-section" class="btn-floating btn-large blue">
                <i class="fa fa-arrow-up"></i>
                </a>
                </div>
            </div>
        <!--/First column-->
        </div>
    </section>
        <!--/Section: Testimonials-->    
    <!--/Main container-->
               </div>   
          </div>
          
<!--Footer-->
<footer class="page-footer center-on-small-only" style="margin-top:-32px;">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-3 offset-md-1">
                <h5 class="title text-center"><i class="fa fa-map-marker" aria-hidden="true"></i> </h5>
                <p class="text-center">CIB House</p>
                <p class="text-center">Moi Avenue, 7th Street</p> <p class="text-center">Nairobi, Kenya</p>
            </div>
            <!--/.First column-->

            <hr class="hidden-md-up">

            <!--Second column-->
             <div class="col-md-4 offset-md-1">
                <h5>CONTACT</h5>
                <p> <a href="tel://+254710533607"><i class="fa fa-phone-square" aria-hidden="true"></i> +254710533607</a></p> 
                 <p> <i class="fa fa-envelope" aria-hidden="true"></i> capitalinvestmentsbank@gmail.com </p>
            </div>
            <!--/.Second column-->

            <hr class="hidden-md-up">

            <!--THIRD column-->
            <div class="col-md-3">
                <h5 class="title">Links</h5>
                <ul>
                    <li><a href="#!">Link 1</a></li>
                    <li><a href="#!">Link 2</a></li>
                    <li><a href="#!">Link 3</a></li>
                    <li><a href="#!">Link 4</a></li>
                </ul>
            </div>
            <!--/.THIRD column-->

        </div>
    </div>
    <!--/.Footer Links-->
    <hr>
    <!--Social buttons-->
    <div class="social-section">
        <ul>
            <li><a class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"> </i></a></li>
            <li><a class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li>
            <li><a class="btn-floating btn-small btn-gplus"><i class="fa fa-google-plus"> </i></a></li>
            <li><a class="btn-floating btn-small btn-li"><i class="fa fa-linkedin"> </i></a></li>
            <li><a class="btn-floating btn-small btn-git"><i class="fa fa-github"> </i></a></li>
            <li><a class="btn-floating btn-small btn-pin"><i class="fa fa-pinterest"> </i></a></li>
            <li><a class="btn-floating btn-small btn-ins"><i class="fa fa-instagram"> </i></a></li>
        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            &copy; <?php echo " ".date("Y"); ?> <a href="#"> Mickemlyn & Yowmy </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->



    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

     

</body>

</html>
<?php }
else{
    unset($_SESSION['user']);
    unset($_SESSION['LAST_ACTIVITY']);
    
  $_SESSION['notloggederror'] = "Kindly log in to proceed!";
    header("location: index.php");
    exit();
}
?>