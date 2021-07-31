<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8">
    <title>MNM.vn</title>
    <link href="assets/frontend/images/store_1548917773_553.png" rel="shortcut icon" type="assets/frontend/image/vnd.microsoft.icon">
    <link rel="stylesheet" href="assets/frontend/css/t0260.store.nhanh.vn.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/cart.css">
    <script src="assets/frontend/js/jquery-1.12.0.min.js"></script>
    <style type="text/css">
    
</style>
</head>
<body class="tp_background tp_text_color">
<!-- header -->
<?php 
    include "controllers/HeaderController.php";
    $obj = new HeaderController();
    $obj->index();
?> 
<!-- end header -->

<!-- main -->
<?php echo $this->view; ?> 
<!-- end main -->
<script src="assets/frontend/js/lazysizes.min.js" async=""></script>

</body>
</html>
