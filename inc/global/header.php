<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php if(isset($pageTitle)) {?>
        <title><?php echo $pageTitle  ?></title>
    <?php }else { ?>
        <title>Đã có lỗi xảy ra</title>
    <?php } ?>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <?php if(isset($pageDescription)) { ?>
        <meta name='description' content="<?php echo $pageDescription ?>" />
    <?php } else {?>
            <meta name='description' content='' />
    <?php } ?>
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //web fonts -->

</head>

<body>
    <!-- top-header -->
    <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2 justify-content-end">
                <div class="col-lg-6 header-right mt-lg-0 mt-2">
                    <!-- header lists -->
                    <ul style="text-align: end;">
                        <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                <i class="fas fa-truck mr-2"></i>Track Order</a>
                        </li>
                        <li class="text-center border-right text-white">
                            <i class="fas fa-phone mr-2"></i> 001 234 5678
                        </li>
                        <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                <i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
                        </li>
                        <li class="text-center text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i>Register </a>
                        </li>
                    </ul>
                    <!-- //header lists -->
                </div>
            </div>
        </div>
    </div>

    <!-- modals -->
    <!-- log in -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" placeholder=" " name="Name" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="Password" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Log in">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                            </div>
                        </div>
                        <p class="text-center dont-do mt-3">Don't have an account?
                            <a href="#" data-toggle="modal" data-target="#exampleModal2">
                                Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- register -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Your Name</label>
                            <input type="text" class="form-control" placeholder=" " name="Name" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="Email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="Password" id="password1"
                                required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password"
                                id="password2" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Register">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms
                                    & Conditions</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal -->
    <!-- //top-header -->

    <!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3 logo_agile">
                    <h1 class="text-center">
                        <a href="?" class="font-weight-bold font-italic">
                            <img src="images/logo2.png" alt=" " class="img-fluid">Electro Store
                        </a>
                    </h1>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                    <div class="row">
                        <!-- search -->
                        <div class="col-10 agileits_search">
                            <form class="form-inline" action="#" method="post">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" required>
                                <button class="btn my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        <!-- //search -->
                        <!-- cart details -->
                        <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                                <form action="#" method="post" class="last">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="display" value="1">
                                    <button class="btn w3view-cart" type="submit" name="submit" value="">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- //cart details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- //header-bottom -->
    <!-- navigation -->
    <div class="navbar-inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center w-100 justify-content-center">
                        <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="?">Home
                            </a>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <div class="dropdown-menu p-0 mt-0">
                                <div class="agile_inner_drop_nav_info">
                                    <div class="row">
                                        <div class="col-sm-12 multi-gd-img">
                                            <ul class="multi-column-dropdown d-flex flex-wrap">
                                                <?php
                                                    $sql = "SELECT * FROM product_categories ORDER BY product_category_id DESC";
                                                    $productCategories = find($sql);
                                                ?>
                                                <?php if($productCategories["code"] !== 200) { ?>
                                                <li><?php echo $productCategories['message'] ?></li>
                                                <?php }else { ?>
                                                <?php foreach($productCategories['data'] as $category) { ?>
                                                <li>
                                                    <a class="d-block p-2"
                                                        href="?page=products&url=<?php echo $category['product_category_url'] ?>.<?php echo $category['product_category_id'] ?>"><?php echo $category['product_category_name'] ?></a>
                                                </li>
                                                <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="?page=about.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Pages
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="product.html">Product 1</a>
                                <a class="dropdown-item" href="product2.html">Product 2</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="single.html">Single Product 1</a>
                                <a class="dropdown-item" href="single2.html">Single Product 2</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="checkout.html">Checkout Page</a>
                                <a class="dropdown-item" href="payment.html">Payment Page</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=contact.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->