<header>
    <link rel="stylesheet" href="css/sidebar.css?v=1">
</header>
<nav class="sidebar">
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-chart-line"></i>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-regular fa-user"></i>
                <span class="link-text">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <!-- <i class="fa-regular fa-credit-card"></i> -->
                <i class="fa-regular fa-user"></i>
                <span class="link-text">Payments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="document.getElementById('logout').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                <form id="logout" action="./includes/logout.inc.php" method="post" enctype="multipart/form-data">
                </form>
                <span class="link-text">logout</span>
            </a>
        </li>
    </ul>
</nav>