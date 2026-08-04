<?php
$date = date('d-m-Y 23:59', strtotime("-30 days"));
$date2 = date('d-m-Y 23:59');
?>


<style>
    /* Styling untuk Container Modality */
    .modality-row-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 15px;
        /* Memberi jarak dari baris filter di atasnya */
        padding: 10px 0;
    }

    .modality-title {
        color: #8da4b8;
        /* Warna teks kebiruan pucat */
        font-weight: bold;
        font-size: 12px;
        letter-spacing: 1px;
        margin-right: 15px;
    }

    .modality-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        /* Jarak antar tombol */
    }

    .modality-label {
        cursor: pointer;
        margin-bottom: 0;
    }

    /* Tampilan default tombol belum di-check */
    .modality-btn {
        display: inline-block;
        padding: 6px 16px;
        border: 1.3px solid #3b4754;
        border-radius: 8px;
        color: #8da4b8;
        background-color: transparent;
        font-size: 12px;
        transition: all 0.2s ease-in-out;
        user-select: none;
    }

    /* Hover effect */
    .modality-label:hover .modality-btn {
        border-color: #5c6a79;
        color: #ffffff;
    }

    /* Tampilan saat tombol di-check (aktif) */
    .modality-label input[type="checkbox"]:checked+.modality-btn {
        border-color: #0f5d50;
        background-color: rgba(1, 87, 72, 0.35);
        color: #21b89f;
    }

    /* Styling baru untuk tombol Filter Date */
    .filter-date1 {
        color: #777;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        text-decoration: none;
        transition: all 0.2s ease;
        height: 32px;
        margin: 0;
        border-radius: 6px;
        border: 2px solid #384d6c;
        padding: 6px 10px;
        background-color: #1e293a;
    }

    .filter-date1:hover {
        color: #777;
    }

    .filter-date1 i {
        font-size: 14px;
    }

    #datePreviewText {
        font-weight: 500;
        color: #bcbcbc;
    }

    /* Styling Dropdown Date Range baru */
    .dark-dropdown-menu {
        background-color: #262b30 !important;
        border: 1px solid #3b4754 !important;
        border-radius: 6px;
        min-width: 160px;
        padding: 5px 0 !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .range-option {
        display: block;
        padding: 8px 20px;
        color: #b3c2d1;
        text-decoration: none;
        font-size: 13px;
        transition: background-color 0.2s;
    }

    .range-option:hover {
        background-color: #31373e;
        color: #ffffff;
        text-decoration: none;
    }

    /* ============================== */

    /* From Uiverse.io by vinodjangid07 */
    .btn-search-work {
        width: 100px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border: none;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.164);
        cursor: pointer;
    }

    .text {
        width: 65%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        background-color: rgb(2, 153, 153);
    }

    .svgIcon {
        width: 35%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        background-color: teal;
    }

    .btn-search-work:hover .text {
        background-color: rgb(0, 133, 133);
    }

    btn-search-work:hover .svgIcon {
        background-color: rgb(0, 105, 105);
    }

    /* ===================================== */
    .label-input2 {
        position: relative;
        display: block;
        width: 250px;
        display: flex;
        border-radius: 6px;
        border: 2px solid #384d6c;
        padding: 4px 10px;
        text-align: left;
        margin-bottom: 0;
        background-color: #1e293a;
    }

    .icon-input2 {
        position: absolute;
        top: 53%;
        right: 0;
        transform: translate(-50%, -50%);
        transition: all 0.3s ease;
        color: #c5c5c5;
        width: 18px;
    }

    .input2 {
        background-color: transparent;
        outline: none;
        border: none;
        color: #c5c5c5;
        font-size: 13px;
    }
</style>

<form action="#" method="post" class="filter-nd">
    <div class="container-fluid">
        <div class="row">
            <!-- Filter + Search Row (Baris Atas) -->
            <div class="filter-row1 form-row align-items-center">

                <!-- Date Filter Button + Dropdown -->
                <div class="col-auto" style="padding-right: 0; padding-left: 0px;">
                    <div class="filter-container1">
                        <!-- TRIGGER CLASS DIUBAH KE filter-date1 -->
                        <a href="#" id="filterToggle1" class="btn filter-date1">
                            <i class="fas fa-filter"></i> Date: <span id="datePreviewText">All Time</span>
                        </a>
                        <div class="filter-dropdown1" id="filterDropdown1" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="font-weight-bold active"><?= $lang['search_date'] ?></label>
                            </div>
                            <div style="padding: 0px;" class="input-date">
                                <span class="date-icon">
                                    From
                                    <input type="text" name="from_study_datetime" id="from_study_datetime" class="form-control" placeholder="From Date" value="<?= $date ?>" autocomplete="off" />
                                </span>
                                <span class="date-icon">
                                    To
                                    <input type="text" name="to_study_datetime" id="to_study_datetime" class="form-control" placeholder="To Date" value="<?= $date2 ?>" autocomplete="off" />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Date Range Dropdown Baru (Preset) -->
                <div class="col-auto" style="padding-right: 0; padding-left: 0px;">
                    <div class="filter-container1">
                        <a href="#" id="filterRangeToggle" class="filter-date1">
                            <span id="dateRangeBtnText">Date Range Filter</span> <i class="fas fa-chevron-down" style="margin-left: 5px; font-size: 10px;"></i>
                        </a>
                        <div class="filter-dropdown1 dark-dropdown-menu" id="filterRangeDropdown" style="display: none;">
                            <a href="#" class="range-option" data-range="this_year">This Year</a>
                            <a href="#" class="range-option" data-range="last_7_days">Last 7 Days</a>
                            <a href="#" class="range-option" data-range="last_14_days">Last 14 Days</a>
                            <a href="#" class="range-option" data-range="last_30_days">Last 30 Days</a>
                            <a href="#" class="range-option" data-range="this_week">This Week</a>
                            <a href="#" class="range-option" data-range="last_week">Last Week</a>
                            <a href="#" class="range-option" data-range="this_month">This Month</a>
                            <a href="#" class="range-option" data-range="last_month">Last Month</a>
                            <hr style="border-top: 1px solid #3b4754; margin: 5px 0;">
                            <a href="#" class="range-option" data-range="custom">Custom</a>
                        </div>
                    </div>
                </div>


                <!-- Search Inputs -->
                <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                    <label class="label-input2">
                        <img src="../image/new/name-nd.svg" alt="Search" class="icon-input2">
                        <input type="text" class="input2" placeholder="Enter name" name="pat_name" id="pat_name" />
                    </label>
                </div>

                <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                    <label class="label-input2">
                        <img src="../image/new/mrn-nd.svg" alt="Search" class="icon-input2">
                        <input type="text" class="input2" placeholder="Enter MRN" name="mrn" id="mrn" />
                    </label>
                </div>

                <!-- <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                    <img src="../image/new/name-nd.svg" alt="Search" class="search-img1">
                    <input type="text" class="form-control filter-input1" name="pat_name" id="pat_name" placeholder="Name">
                </div> -->
                <!-- <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                    <img src="../image/new/mrn-nd.svg" alt="Search" class="search-img1">
                    <input type="text" class="form-control filter-input1" name="mrn" id="mrn" placeholder="MRN">
                </div> -->

                <?php if ($level == 'radiology') { ?>
                    <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                        <img src="../image/new/ex-nd.svg" alt="Search" class="search-img1">
                        <input type="text" class="form-control filter-input1" name="fill" id="fill" placeholder="Expertise">
                    </div>
                <?php } else if ($level == 'radiographer' || $level == 'refferal') { ?>
                    <!-- <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                        <img src="../image/new/foto-nd.svg" alt="Search" class="search-img1">
                        <input type="text" class="form-control filter-input1" name="patientid" id="patientid" placeholder="No Foto">
                    </div> -->
                <?php } else { ?>
                    <!-- <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                        <img src="../image/new/foto-nd.svg" alt="Search" class="search-img1">
                        <input type="text" class="form-control filter-input1" name="patientid" id="patientid" placeholder="No Foto">
                    </div> -->
                <?php } ?>

                <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                    <button class="btn-search-work" type="button" name="range" id="range">
                        <span class="text">Search</span>
                        <span class="svgIcon">
                            <i class="fas fa-search"></i>
                        </span>
                    </button>
                </div>
                <div class="col-auto" style="padding-right: 0px; padding-left: 0px;">
                    <button class="btn btn-danger-nd text-white btn-fil shadow-none waves-effect waves-light" type="reset" name="range" id="range">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
            </div>

            <!-- 2. Modality Filter Baris Bawah (Tanpa Dropdown) -->
            <div class="modality-row-container chip-nd">
                <span class="modality-title">Modality</span>

                <div class="modality-list">
                    <!-- Tombol Check All (Semua) -->
                    <label class="modality-label">
                        <input type="checkbox" id="checkAll1" class="d-none" checked>
                        <span class="modality-btn">Check All</span>
                    </label>

                    <!-- PHP Loop Sesuai Aslinya -->
                    <?php
                    $sql = mysqli_query(
                        $conn_pacsio,
                        "SELECT mods_in_study FROM study GROUP BY mods_in_study"
                    );
                    while ($row = mysqli_fetch_assoc($sql)) { ?>
                        <label class="modality-label">
                            <!-- Class 'd-none' digunakan untuk menyembunyikan checkbox bawaan -->
                            <input type="checkbox" class="zone-check1 d-none" id="checkbox" name="mods_in_study[]" value="<?= $row['mods_in_study']; ?>" checked>
                            <span class="modality-btn"><?= $row['mods_in_study']; ?></span>
                        </label>
                    <?php } ?>
                </div>
            </div>
            <!-- ==== end of form filter new ===== -->

        </div>
        <div class="row chip-nd">
            <span id="selectedZonesPreview1"></span>
        </div>
    </div>
</form>