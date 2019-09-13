 <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../vacanza.php">Vacanza Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="../vacanza.php">HOME</a></li>
                 
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user_demo"><i class="fa fa-fw fa-users" aria-hidden="true">
                            
                        </i>  Users  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user_demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cities_demo"><i class="fa fa-fw fa-building" aria-hidden="true">
                            
                        </i> Cities <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cities_demo" class="collapse">
                            <li>
                                <a href="cities.php">View All Cities</a>
                            </li>
                            <li>
                                <a href="cities.php?source=add_city">Add Cities</a>
                            </li>
                        </ul>
                    </li>
                   
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#airlines_demo"><i class="fa fa-fw fa-plane" aria-hidden="true">
                            
                        </i> Airlines <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="airlines_demo" class="collapse">
                            <li>
                                <a href="airlines.php">View All Airlines</a>
                            </li>
                            <li>
                                <a href="airlines.php?source=add_airline">Add Airlines</a>
                            </li>
                        </ul>
                    </li>
                    
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#buses_demo"><i class="fa fa-fw fa-bus" aria-hidden="true">
                            
                        </i> Buses<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="buses_demo" class="collapse">
                            <li>
                                <a href="buses.php">View All Buses</a>
                            </li>
                            <li>
                                <a href="buses.php?source=add_bus">Add Buses</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#flights_dropdown"><i class="fa fa-fw fa-fighter-jet"></i> Flights <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="flights_dropdown" class="collapse">
                            <li>
                                <a href="flights.php"> Add Flights</a>
                            </li>
                            <li>
                                <a href="#"> View All Flights</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#offers_dropdown"><i class="fa fa-fw fa-usd"></i> Offers <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="offers_dropdown" class="collapse">
                            <li>
                                <a href="flights.php"> Add Offers</a>
                            </li>
                            <li>
                                <a href="#"> View All Offers</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="comments.php"><i class="fa <fa-fw></fa-fw> fa-comment" aria-hidden="true"></i>  Comments</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i>  Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
