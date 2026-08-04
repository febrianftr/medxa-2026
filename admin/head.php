<?php
require '../random.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css">
<link href="../css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/dataTables.min.css">
<link rel="stylesheet" href="css/css-navbar.css?v=<?= $random; ?>">
<link rel="stylesheet" href="css/form-css.css?v=<?= $random; ?>">
<link rel="stylesheet" href="css/loading.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<!-- <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css"> -->



<!-- <link rel="stylesheet" type="text/css" href="css/styles.css" /> -->
<link rel="icon" href="../image/ipi-icon3.ico" type="image/png">
<link rel="stylesheet" href="fontawesome/css/all.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Google Fonts: Inter (UI) + JetBrains Mono (Data Tables) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

<!-- untuk validasi form -->
<style>
    .not-allowed {
        cursor: not-allowed;
    }

    .invalid {
        border: 1px solid red !important;
    }

    .invalid-text {
        color: red !important;
    }
</style>