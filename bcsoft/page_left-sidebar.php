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
                        <small><?php echo $_SESSION['name']?></small>
                    </div>
                </div>
            </li>
            <li id="menu-dashboard"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li id="menu-referred_customers"><a href="referred_customers.php"><i class="zmdi zmdi-assignment"></i><span>Customers</span></a></li>           
            <li id="menu-profile"><a href="profile-edit.php"><i class="zmdi zmdi-account"></i><span>Profile</span></a></li>
            <li id="menu-commission"><a href="commission.php"><i class="zmdi zmdi-settings"></i><span>Commission</span></a></li>
        </ul>
    </div>
</aside>