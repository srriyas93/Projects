<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="assets/images/logo.png" width="25" alt="24NXT"><span class="m-l-10">24NXT</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>Trade Brochure</h4>
                        <small><?php echo $_SESSION['tb_name']?></small>
                    </div>
                </div>
            </li>
            <li id="menu-dashboard"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li> 
            <li id="menu-bussiness_profile"><a href="bussiness_profile.php"><i class="zmdi zmdi-assignment"></i><span>Business Profile</span></a></li> 
            <li id="menu-users"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li id="menu-admin"><a href="admin.php">Admin</a></li>
                    <li id="menu-customers"><a href="customers.php">Customers</a></li>
                    <li id="menu-bussiness_counsellor"><a href="bussiness_counsellor.php">Business Counselors</a></li>
                </ul>
            </li>
            <li id="menu-reports"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Reports</span></a>
                <ul class="ml-menu">
                    <li id="menu-reports_customers"><a href="reports_customers.php">Customers</a></li>
                    <li id="menu-reports_bc"><a href="reports_bc.php">Business Counselors</a></li>
                </ul>
                
            </li>
            <li id="menu-settings"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                <ul class="ml-menu">
                    <li id="menu-features"><a href="features.php">Features</a></li>
                    <li id="menu-plans"><a href="plans.php">Plan</a></li>
                    <li id="menu-bc_commission_setting"><a href="bc_commission_setting.php">Commission</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>