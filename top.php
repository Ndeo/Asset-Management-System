<div class="navbar-custom">
    <?php require'Session.php' ?>
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">


                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <!--<img src='../thumbnails/<?php echo $_SESSION['image'] ?>' alt="user-image" class="rounded-circle" />-->
                                                                                <img src='thumbnails/<?php echo $_SESSION['image'] ?>' alt="user-image" class="rounded-circle" />

                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php echo $_SESSION['FirstName']." ".$_SESSION['LastName'] ?></span>
                                        <span class="account-position"><?php echo $_SESSION['role'] ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                   
                                        <a href="editAccount.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                                    <!--    <i class="mdi mdi-account-edit mr-1"></i>-->
                                    <!--    <span>Settings</span>-->
                                    <!--</a>-->

                                    <!-- item-->
                                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                                    <!--    <i class="mdi mdi-lifebuoy mr-1"></i>-->
                                    <!--    <span>Support</span>-->
                                    <!--</a>-->

                                    <!-- item-->
                                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                                    <!--    <i class="mdi mdi-lock-outline mr-1"></i>-->
                                    <!--    <span>Lock Screen</span>-->
                                    <!--</a>-->

                                    <!-- item-->
                                    <a href="logout.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout mr-1"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search">
                            <form method="post" action="searchResults.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="search_bar">
                                    <span class="mdi mdi-magnify"></span>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>