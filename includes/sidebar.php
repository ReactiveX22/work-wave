<header>
    <link rel="stylesheet" href="css/sidebar.css?v=1<?php echo time(); ?>">
</header>
<nav class="sidebar">
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=profile">
                <i class="fa-regular fa-user"></i>
                <span class="link-text">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=dashboard">
                <i class="fa-solid fa-chart-line"></i>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=work">
                <i class="fa-regular fa-clock"></i>
                <span class="link-text">Work</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=work">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <span class="link-text">Payments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=settings">
                <i class="fa-solid fa-gear"></i>
                <span class="link-text">Settings</span>
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