<?php include "header.php"; ?>
    

<body>

    <div id="wrapper" style="width:1800px;">

       <?php include "navigation.php"; ?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">
                            Welcome to the Admin
                           
                  </h1>
                  
                  <?php
                    
                  if(isset($_GET['source'])){
                      $source = $_GET['source'];
                      
                  }else{
                      $source = '';
                  }
                  
                  switch($source){
                          
                          case 'add_user';
                          include "includes/add_users.php";
                          break;
                          
                          case 'update_user';
                          include "includes/update_users.php";
                          break;
                          
                          default:
                          include "includes/view_all_users.php";
                          break;
                  }
                      
                  ?>
                        
                    </div>
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
