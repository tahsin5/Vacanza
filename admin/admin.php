<?php include "header.php"; ?>
<?php
////if((!isset($_SESSION['userid'])){
////  header("Location: ../vacanza.php");    
////}
?>

<body>

    <div id="wrapper">

       <?php include "navigation.php"; ?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['userid']; ?></small>
                        </h1>
                        
                        
                        
                        
                        
                    </div>
                </div>
                
                <div class="row">
                
    <div class="col-lg-3 col-md-6">
       <?php
       
       //Number of flights    
       $sql = "SELECT COUNT(*) as count FROM flight";
       $count_flights = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($count_flights); 
       $no_of_flights = $row['count'];
       
       ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
               
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $no_of_flights; ?></div>
                        <div>Flights</div>
                    </div>
                </div>
                
            </div>
            
            <a href="flights.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
       <?php
        
           $sql = "SELECT COUNT(*) as count FROM bus";
           $count_bus = mysqli_query($conn, $sql);
           $row = mysqli_fetch_assoc($count_bus); 
           $no_of_bus = $row['count'];
       
       ?>
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $no_of_bus; ?></div>
                         <div>Buses</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
       
       <?php
        
       $sql = "SELECT COUNT(*) as count FROM users";
       $count_users = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($count_users); 
       $no_of_users = $row['count'];
       
       ?>
       
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $no_of_users; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
   <div class="col-lg-3 col-md-6">
       
       <?php
        
       $sql = "SELECT COUNT(*) as count FROM comments";
       $count_comments = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($count_comments); 
       $no_of_comments = $row['count'];
       
       ?>
       
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $no_of_comments; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
                
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> 
    
</div>
      
    <div class="row">
      
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Count'],
            
          <?php
            
            $element_text = ['Flights', 'Bus', 'Users', 'Comments'];
            $element_count = [$no_of_flights, $no_of_bus , $no_of_users, $no_of_comments];
            
            for($i=0;$i<4;++$i){
                echo "['$element_text[$i]'". ",". "$element_count[$i]],";
            }
            
          ?>
            
          
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
            
      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>    
        
    </div>    
                      
                <!-- /.row -->
</div>
            <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
   
   
    