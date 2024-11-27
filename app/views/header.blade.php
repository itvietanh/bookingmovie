<?php
if (isset($_SESSION['auth'])) {
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2023 08:54:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/animate.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/odometer.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>public/assets/images/favicon.png" type="image/x-icon">

    <title>FPOLY Cinema - Đặt vé xem phim</title>

    <!-- bs5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- ==========Preloader==========-->
    <!-- <div class="preloader">
   <div class="preloader-inner">
       <div class="preloader-icon">
           <span></span>
           <span></span>
       </div>
   </div>
</div> -->
    <!-- ==========Preloader==========-->
    <!-- ==========Overlay==========-->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="<?= BASE_URL ?>home">
                        <h5>FPOLY Cinema</h5>
                        <!--                    <img src="../public/assets/images/logo/logo.png" alt="logo">-->
                    </a>
                </div>
                <ul class="menu">
                    <li class="">
                        <a href="<?= BASE_URL ?>home" class="active">Trang Chủ</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="<?= BASE_URL ?>film">Phim</a>
                        <ul class="submenu">
                            <?php foreach ($listGenre as $value) {
                                extract($value); ?>
                            <li>
                                <a href="<?= BASE_URL ?>filmByGenre/<?= $id ?>"><?php echo $name; ?></a>
                            </li>
                            <?php
                            } ?>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="contact">Liên hệ</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#0">Xem Thêm</a>
                        <ul class="submenu">
                            <li>
                                <?php
                                if (!isset($_SESSION['account'])) {
                                ?>
                                <a href="">Quản lý vé đặt</a>
                                <?php
                                } else {
                                ?>
                                <a href="my_ticket">Quản lý vé đặt</a>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </li>
                    <?php
                    if (!isset($_SESSION['auth'])) { ?>
                    <div class="login">
                        <li class="header-button pr-0">
                            <a href="<?= BASE_URL ?>login">Đăng nhập</a>
                        </li>
                    </div>
                    <?php
                    } else { ?>
                    <li class="menu-item-has-children">
                        <i class="fa-solid fa-user" style="margin-left: 10px">
                        </i>
                        <ul class="submenu">
                            <?php
                            extract($_SESSION['auth']); ?>
                            <li style="margin: inherit; color: #000">Xin chào<b>, <?= $name ?></b><br>
                                <a href='<?= BASE_URL ?>logout'>Đăng xuất</a>
                            </li>
                            <?php
                                if ($_SESSION['auth']['role'] == 0) { ?>
                            <li>
                                <a href='<?= BASE_URL ?>dashBoard'>Đăng nhập Admin</a>
                            </li>
                            <?php
                                }
                                if ($_SESSION['auth']['role'] == 1) { ?>
                            <li>
                                <a href='admin/index.php'>Đăng nhập Nhân Viên</a>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
