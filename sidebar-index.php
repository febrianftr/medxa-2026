<!-- ------loader------ -->
<style>
    /* style-loader */

    .loader {
        width: 160px;
        height: 50px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        /* Memastikan loader berada di paling depan */
    }

    .loader-text {
        position: absolute;
        top: 0;
        padding: 0;
        margin: 0;
        color: #179E87;
        animation: text_713 1.5s ease both infinite;
        font-size: .8rem;
        letter-spacing: 1px;
    }

    .load {
        background-color: #D7E022;
        border-radius: 50px;
        display: block;
        height: 16px;
        width: 16px;
        bottom: 0;
        position: absolute;
        transform: translateX(64px);
        animation: loading_713 1.5s ease both infinite;
    }

    .load::before {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background-color: #fbffa6;
        border-radius: inherit;
        animation: loading2_713 1.5s ease both infinite;
    }

    @keyframes text_713 {
        0% {
            letter-spacing: 1px;
            transform: translateX(0px);
        }

        40% {
            letter-spacing: 2px;
            transform: translateX(26px);
        }

        80% {
            letter-spacing: 1px;
            transform: translateX(32px);
        }

        90% {
            letter-spacing: 2px;
            transform: translateX(0px);
        }

        100% {
            letter-spacing: 1px;
            transform: translateX(0px);
        }
    }

    @keyframes loading_713 {
        0% {
            width: 16px;
            transform: translateX(0px);
        }

        40% {
            width: 100%;
            transform: translateX(0px);
        }

        80% {
            width: 16px;
            transform: translateX(64px);
        }

        90% {
            width: 100%;
            transform: translateX(0px);
        }

        100% {
            width: 16px;
            transform: translateX(0px);
        }
    }

    @keyframes loading2_713 {
        0% {
            transform: translateX(0px);
            width: 16px;
        }

        40% {
            transform: translateX(0%);
            width: 80%;
        }

        80% {
            width: 100%;
            transform: translateX(0px);
        }

        90% {
            width: 80%;
            transform: translateX(15px);
        }

        100% {
            transform: translateX(0px);
            width: 16px;
        }
    }
</style>
<div class="disokin">
    <div class="loader">
        <span class="loader-text"><img src="../image/logo-sidebar2.png" style="width: 110px;"></span>
        <span class="load"></span>
    </div>

</div>
<!-- ------loader------ -->


<?php include "../bahasa.php"; ?>

<style>
    body {
        margin: 0;
        font-family: "Helvetica", sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .user-session-id {
        font-weight: bold;
        text-align: left;
        padding-left: 17px;
    }

    /* Sidebar */
    #sidebar1 {
        width: 250px;
        background-color: #1e293a;
        /* border-right: 1px solid #0D9488; */
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        overflow-y: auto;
        transition: left 0.28s ease, transform 0.28s ease;
        z-index: 100;
        display: flex;
        flex-direction: column;
        height: 100vh;
        color: #F8F9FA;
    }

    .sidebar-footer1 {
        margin-top: auto;
        padding-top: 10px;
    }

    .menu-item1 a {
        color: #eee;
    }

    .sidebar-footer1 .menu-item1 {
        display: block;
        padding: 10px 15px;
        color: #eee;
        text-decoration: none;
    }

    .sidebar-footer1 .menu-item1:hover {
        color: #d8b4e0 !important;
        font-weight: bold;
    }

    /* collapsed on desktop */
    #sidebar1.collapsed1 {
        left: -250px;
    }

    /* active on mobile (opened) */
    #sidebar1.active1 {
        left: 0;
    }

    #sidebar1 .sidebar-header {
        padding: 20px 20px 12px 20px;
        font-size: 18px;
        font-weight: bold;
        border-bottom: 1px solid #191A1C;
    }

    #sidebar1 ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #sidebar1 ul li {
        padding: 10px 20px;
        color: #eee;
        cursor: pointer;
        transition: background 0.2s;
    }

    #sidebar1 ul li:hover {
        color: #77a9df;
        font-weight: bold;
    }

    #sidebar1 ul li i {
        margin-right: 10px;
        color: #eee;
    }

    #sidebar1 ul .submenu1 {
        display: none;
        padding-left: 20px;
        border-left: 2px solid #EEE;
        /* ✅ garis vertikal di kiri submenu */
        margin-left: 5px;
        margin-top: 11px;
        /* agar garis agak masuk dari teks menu utama */
    }

    .submenu1 a {
        display: block;
        text-decoration: none;
        font-weight: 500;
    }

    .submenu1 a:hover {
        color: #77a9df;
        font-weight: bold;
    }

    /* #sidebar1 ul .submenu1 {
        display: none;
        padding-left: 30px;
        margin-top: 6px;
    }

    #sidebar1 ul .submenu1 li {
        padding: 8px 0;
        color: #666;
    } */

    hr {
        margin: 10px 0;
    }

    .text-center img {
        vertical-align: middle;
    }

    /* Content area */
    #content2 {
        margin-left: 245px;
        padding: 45px 30px;
        transition: margin-left 0.28s ease;
        width: 88%;
    }

    /* when sidebar collapsed on desktop, content full width */
    #content2.full1 {
        margin-left: 0;
        width: 100%;
    }

    /* Toggle button */
    #sidebarToggle {
        position: fixed;
        top: 7px;
        left: 260px;
        /* desktop default: next to sidebar */
        background: #2f4b682e;
        color: #2f2f2f;
        border: none;
        border-radius: 5px;
        padding: 8px 12px;
        cursor: pointer;
        transition: left 0.28s ease;
        z-index: 200;
    }

    /* desktop: when collapsed move toggle left */
    #sidebarToggle.collapsed1 {
        left: 15px;
    }

    /* mobile adjustments */
    @media (max-width: 768px) {

        /* sidebar initially hidden on mobile */
        #sidebar1 {
            left: -250px;
        }

        /* content sits full width */
        #content2 {
            margin-left: 0;
            width: 100%;
        }

        /* toggle button default left on mobile */
        #sidebarToggle {
            left: 15px;
        }

        /* when sidebar is opened on mobile, give button class open1 to move it next to sidebar */
        #sidebarToggle.open1 {
            left: 260px;
        }
    }

    /* rotate arrow animation */
    .fa-chevron-down.rotate1 {
        transform: rotate(180deg);
        transition: transform 0.3s;
    }

    /* styling search box */
    .sidebar-search1 .search-input1 {
        border-radius: 4px;
        font-size: 11px;
        padding: 6px 14px;
        margin-top: 10px;
        border: none;
        background-color: #f0f0f0;
        color: #1e293a;
    }

    .sidebar-search1 {
        position: relative;
        width: 100%;
        max-width: 250px;
    }

    .search-img1 {
        position: absolute;
        left: 10px;
        top: 50%;
        width: 16px;
        height: 16px;
        transform: translateY(-50%);
        opacity: 0.7;
        pointer-events: none;
    }

    .search-input1 {
        padding-left: 36px !important;
        /* ruang buat gambar ikon */
        border-radius: 20px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease-in-out;
    }



    .search-input1:focus {
        border-color: unset;
        box-shadow: unset;
        /* background-color: #3c3939; */
        border-color: unset;
    }

    .icon-sidebar {
        width: 20px;
        margin-right: 6px;
    }


    .icon-sidebar {
        transition: transform 0.3s ease;
        /* Memberikan efek animasi berputar yang halus */
    }

    .rotate-180 {
        transform: rotate(180deg);
    }
</style>




<!-- Sidebar -->
<nav id="sidebar1">
    <div class="sidebar-header">
        <img src="../image/logo-sidebar2.png" style="width: 110px;">
        <!-- Input search -->
        <label style="color: darkgray; font-size: 9px; margin-top: 3px;">Radiologi Information System</label>
        <!-- <div class="sidebar-search1">
            <img src="../image/new/search-menu.svg" alt="Search" class="search-img1">
            <input type="text" id="searchMenu1" class="form-control form-control-sm search-input1" placeholder="Search menu" autocomplete="off">
        </div> -->
    </div>

    <?php
    // 1. Deteksi nama file saat ini
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>



    <ul>
        <?php if ($_SESSION['level'] == 'radiology') { ?>
            <div class="menu-item1 <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                <a href="index.php">
                    <li><img class="icon-sidebar" src="../image/new/home.svg">Dashboard</li>
                </a>
            </div>
        <?php } ?>


        <!-- =================SIDEBAR RADIOGRAPHER====================== -->
        <?php if ($_SESSION['level'] == 'radiographer') { ?>
            <div class="menu-item1 <?php echo ($current_page == 'workload.php') ? 'active' : ''; ?>">
                <a href="workload.php">
                    <li><img class="icon-sidebar" src="../image/new/home.svg">Dashboard</li>
                </a>
            </div>

            <li class="menu-item1 <?php echo ($current_page == 'registration.php' || $current_page == 'order2.php' || $current_page == 'exam2.php') ? 'active' : ''; ?>">
                <a href="#" class="products1"><img class="icon-sidebar" src="../image/new/patient.svg"> Order <i class="fas fa-chevron-down float-right"></i></a>
                <ul class="submenu1">
                    <li id="regist1"><a href="registration.php">New Registration</a></li>
                    <li id="order3"><a href="order2.php"><?= $lang['all_order'] ?></a></li>
                    <li id="exam3"><a href="exam2.php"><?= $lang['examroom'] ?></a></li>
                </ul>
            </li>
            <li class="menu-item1 <?php echo ($current_page == 'report.php' || $current_page == 'workload-fill.php' || $current_page == 'storage.php') ? 'active' : ''; ?>">
                <a href="#" class="services"><img class="icon-sidebar" src="../image/new/book.svg"> Other <i class="fas fa-chevron-down float-right"></i></a>
                <ul class="submenu1">
                    <li id="report1"><a href="report.php"><?= $lang['download_excel'] ?></a></li>
                    <li id="expertise-history"><a href="workload-fill.php">Expertise History</a></li>
                    <li id="storage"><a href="storage.php">Server Storage</a></li>
                </ul>
            </li>

            <!-- <div class="menu-item1 <?php echo ($current_page == 'recycle-bin.php') ? 'active' : ''; ?>">
                <a href="recycle-bin.php">
                    <li> <img class="icon-sidebar" src="../image/new/trash-nd.svg"> Recycle Bin</li>
                </a>
            </div> -->
        <?php } ?><!-- =================END OF SIDEBAR RADIOGRAPHER====================== -->

        <?php if ($_SESSION['level'] == 'radiology') { ?>
            <div class="menu-item1 <?php echo ($current_page == 'dicom.php') ? 'active' : ''; ?>">
                <a href="dicom.php">
                    <li> <img class="icon-sidebar" src="../image/new/patient.svg"> Worklist</li>
                </a>
            </div>
            <li class="menu-item1 <?php echo ($current_page == 'workload.php' || $current_page == 'report.php' || $current_page == 'workload-fill.php' || $current_page == 'query.php') ? 'active' : ''; ?>">
                <a href="#" class="services"><img class="icon-sidebar" src="../image/new/patient.svg"> <?= $lang['report'] ?> <i class="fas fa-chevron-down float-right"></i></a>
                <ul class="submenu1">
                    <li id="workload1"><a href="workload.php">Expertise Approved</a></li>
                    <li id="report1"><a href="report.php"><?= $lang['download_excel'] ?></a></li>
                    <li id="expertise-history"><a href="workload-fill.php">Expertise History</a></li>
                    <li id="query"><a href="query.php">Query</a></li>
                </ul>
            </li>
            <li class="menu-item1 <?php echo ($current_page == 'new_template.php' || $current_page == 'view_template.php') ? 'active' : ''; ?>">
                <a href="#" class="services"><img class="icon-sidebar" src="../image/new/book.svg"></i> Template Expertise <i class="fas fa-chevron-down float-right"></i></a>
                <ul class="submenu1">
                    <li id="newt1"><a href="new_template.php">New Template</a></li>
                    <li id="viewt1"><a href="view_template.php">View Template</a></li>
                </ul>
            </li>
        <?php } ?><!-- =================END OF SIDEBAR DOKTER RADIOLOGI====================== -->

        <?php if ($_SESSION['level'] == 'refferal') { ?>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <!-- <div class="menu-item1 <?php echo ($current_page == 'workload-fill.php') ? 'active' : ''; ?>">
                <a href="workload-fill.php">
                    <li><img class="icon-sidebar" src="../image/new/history-nd.svg">Expertise History</li>
                </a>
            </div> -->
            <div class="menu-item1 <?php echo ($current_page == 'workload.php') ? 'active' : ''; ?>">
                <a href="workload.php">
                    <li><img class="icon-sidebar" src="../image/new/home.svg"> Query</li>
                </a>
            </div>
        <?php } ?><!-- =================END OF SIDEBAR REFFERAL====================== -->
        <div class="menu-item1 <?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>">
            <a href="settings.php">
                <li><img class="icon-sidebar" src="../image/new/settings.svg"> <?= $lang['settings'] ?></li>
            </a>
        </div>
    </ul>
    <div class="sidebar-footer1">
        <div class="menu-item1 <?php echo ($current_page == 'logout.php') ? 'active' : ''; ?>">
            <a href="logout.php">
                <li> <img class="icon-sidebar" src="../image/new/logout.svg"> <?= $lang['logout'] ?></li>
            </a>
        </div>
    </div>

</nav>

<!-- Toggle Button -->
<button id="sidebarToggle" class="arrow-sidebar"><img class="icon-sidebar" src="../image/arrow-left.svg"></button>