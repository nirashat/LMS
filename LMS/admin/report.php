<?php
require('dbconn.php');
?>
<?php
require 'timezone.php'; 
$today = date('Y-m-d');
$year = date('Y');
if(isset($_GET['year'])){
    $year = $_GET['year'];
}
?>
<?php 
if ($_SESSION['RollNo']== 'admin' ) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">LMS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                          <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                <li class="active"><a href="../qr/index.php"><i class="menu-icon icon-home"></i>Visit Hours 
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="recieve.php"><i class="menu-icon icon-inbox"></i>Recieve Message</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="report.php"><i class="menu-icon icon-list"></i>Reports </a></li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                                 <li><a href="pre.php"><i class="menu-icon icon-list"></i>Previously Borrowed Books </a></li>
                                <li><a href="history.php"><i class="menu-icon icon-list"></i>Recent Deletion Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--<div class="elfsight-app-8d171b68-7273-4127-bfcb-38a3ddadfa4c" data-elfsight-app-lazy></div>-->

                    <center>
                        <div class="span2">
                            <div class="btn btn-info">
                                <image width="50px" src="images/student.png"></image>
                                <?php
                                $sql = "SELECT * FROM LMS.user WHERE Category='Student' ";
                                $query = $conn->query($sql);
                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                <p>Total Students</p>
                                
                                <a href="student.php" class="btn">More info</a>
                            </div>
                            <br>
                            <br>

                            <div class="btn btn-info">

                                <image width="50px" src="images/request-book.png"></image>
                                <?php
                                $sql = "SELECT * FROM book";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>Total Books</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br>
                            <br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/book4.png"></image>
                                <?php
                                    $sql = "SELECT * FROM returns WHERE date_return = '$today'";
                                    $query = $conn->query($sql);

                                    echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                                        
                                <p>Returned Today</p>
                                
                                <a href="booksissued.php" class="btn">More info</a>
                            </div>
                            <br>
                            <br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/book2.png"></image>
                                <?php
                                    $sql = "SELECT * FROM borrow WHERE date_borrow = '$today'";
                                    $query = $conn->query($sql);

                                    echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>Borrowed Today</p>
                                
                                <a href="booksborrowed.php" class="btn">More info</a>
                            </div>
                            <br>
                        </div>
                        <div class="span2">
                            <div class="btn btn-info">

                                <image width="50px" src="images/reference.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Reference'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Reference)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/general-reference.png"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='General Reference'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(General Reference)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/periodical.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Periodical'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Periodical)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/special.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Special Collection'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Special Collection)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                        </div>
                        <div class="span2">
                            <div class="btn btn-info">

                                <image width="50px" src="images/reserved.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Reserved Books'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Reserved Books)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/rare.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Rare Book'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Rare Book)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/Filipiniana.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Filipiniana'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Filipiniana)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/graduate.jpg"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Graduate Studies'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Graduate Studies)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                        </div>
                        <div class="span2">

                            <div class="btn btn-info">

                                <image width="50px" src="images/Computer- Internet-Area.png"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Computer Internet Area'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>(Computer Internet Area)</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <div class="btn btn-info">

                                <image width="50px" src="images/book3.png"></image>
                                <?php
                                $sql = "SELECT * FROM record WHERE Date_of_Issue='$today'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>issued</p>
                                
                                <a href="current.php" class="btn">More info</a>
                            </div>
                            <br><br>
                            <!--<div class="btn btn-info">

                                <image width="50px" src="images/request-book.png"></image>
                                <?php
                                $sql = "SELECT * FROM book WHERE SECTION='Periodical'";
                                $query = $conn->query($sql);

                                echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                    
                                <p>No.of Books <br>requested</p>
                                
                                <a href="book.php" class="btn">More info</a>
                            </div>
                            <br><br>-->
                            <div class="btn btn-info">

                                <image width="50px" src="images/deleted-book.jpg"></image>
                                <?php
                                    $sql = "SELECT * FROM tbl WHERE date_deleted= '$today'";
                                    $query = $conn->query($sql);

                                    echo "<h3>".$query->num_rows."</h3>";
                                ?>
                                                        
                                <p>Total Books <br>deleted</p>
                                
                                <a href="booksdeleted.php" class="btn">More info</a>
                            </div>
                            <br><br>
                        </div>
                    </center>

                </div>
            </div>
            <!--/.container-->
        </div>
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2023 Library Management System </b>All rights reserved.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="scripts/flot/jquery.flot.js"></script>
        <script src="scripts/flot/jquery.flot.resize.js"></script>
        <script src="scripts/datatables/jquery.dataTables.js"></script>
        <script src="scripts/common.js"></script>
        <!--<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>-->
        <script>
            const counters = document.querySelectorAll('.counter');
            const speed = 100; // The lower the slower

            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;

                    // Lower inc to slow and higher to slow
                    const inc = target / speed;

                    // console.log(inc);
                    // console.log(count);

                    // Check if target is reached
                    if (count < target) {
                        // Add inc to count and output in counter
                        counter.innerText = count + inc;
                        // Call function every ms
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
            });
W
        </script>
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>