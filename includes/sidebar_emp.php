<header>
    <link rel="stylesheet" href="css/sidebar.css?v=1<?php echo time(); ?>">
</header>
<nav class="sidebar">
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=profile">
                <i class="fa-solid fa-address-card fa-2xl"></i>
                <span class="link-text">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=dashboard">
                <i class="fa-solid fa-chart-line"></i>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" id="settings">
            <a class="nav-link" href="#">
                <i class="fa-regular fa-clock"></i>
                <span class="link-text">Tasks</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="index.php?page=submit_task">
                        <i class="fa-solid fa-list-check"></i>
                        <span class="sub-link-text">Submit Task</span>
                    </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="index.php?page=tasks">
                        <i class="fa-solid fa-user-gear"></i>
                        <span class="sub-link-text">Manage Tasks</span>
                    </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="index.php?page=assign_task">
                        <i class="fa-solid fa-user-clock"></i>
                        <span class="sub-link-text">Assign Task</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" id="settings">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear"></i>
                <span class="link-text">Settings</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="index.php?page=settings_update_pw">
                        <i class="fa-solid fa-key"></i>
                        <span class="sub-link-text">Update Password</span>
                    </a>
                </li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="index.php?page=request_role">
                        <i class="fa-solid fa-user-gear"></i>
                        <span class="sub-link-text">Request Role</span>
                    </a>
                </li>
            </ul>
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