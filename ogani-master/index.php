<?php
include "dbconnection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E Shopping</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <style>
        h1 {
            font-size: 2em;
            margin-bottom: .5rem;
        }

        #success-message {
            background: #DEF1D8;
            color: green;
            padding: 10px;
            margin: 10px;
            display: none;
            position: fixed;
            width: 200px;
            height: 40px;

        }

        #error-message {
            background: #EFDCDD;
            color: red;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
        }

        /* Ratings widget */
        .rate {
            display: inline-block;
            border: 0;
        }

        /* Hide radio */
        .rate>input {
            display: none;
        }

        /* Order correctly by floating highest to the right */
        .rate>label {
            float: right;
        }

        /* The star of the show */
        .rate>label:before {
            display: inline-block;
            font-size: 2rem;
            padding: .3rem .2rem;
            margin: 0;
            cursor: pointer;
            font-family: FontAwesome;
            content: "\f005 ";
            /* full star */
        }

        /* Half star trick */
        .rate .half:before {
            content: "\f089 ";
            /* half star no outline */
            position: absolute;
            padding-right: 0;
        }

        /* Click + hover color */
        input:checked~label,
        /* color current and previous stars on checked */
        label:hover~label {
            color: #73B100;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> sajjadahmad@gmail.com</li>
                                <li>Free Shipping for all Order of RS.99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                include 'dbconnection.php';
                                if (isset($_SESSION['username']) && $_SESSION['role']==1) {
                                    echo '<a href="http://localhost/eshopping"><i class="fa fa-user"></i> Admin</a>';
                                }
                                if(isset($_SESSION['username'])){
                                    echo '<a href="logout.php"><i class="fa fa-user"></i> Logout</a>';
                                }else{
                                    echo '<a href="login.php"><i class="fa fa-user"></i> Login</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.html"><img src="images/logo.png" alt=""></a>
                    </div>
                </div>
                <div id="success-message"></div>
                <div id="error-message"></div>

                <div class="col-lg-9" id="cartcount">
                 <?php
                 
                 if(isset($_SESSION['cart'])){
                    $total=0;
                    echo '<div class="header__cart">
                    <ul>
                    <li><a><i class="fa fa-shopping-bag cartdetail"></i><span>'.count($_SESSION['cart']).'</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>';
                    foreach($_SESSION['cart'] as  $values){
                        $total+= $values['pprice'] * $values['pquantity'];
                    }
                    echo $total.'</span></div>
                </div>';

                 }else{
                    echo '<div class="header__cart">
                    <ul>
                    <li><a><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>Rs.0</span></div>
                </div>';
                 }
                 ?>


                </div>
            </div>

        </div>
    </header>
    <!-- Header Section End -->




    <div id="checkoutpage" style="display:none">

        <!-- /for chckoutpage -->
    </div>

    <div id="detailpage" style="display:none">

        <!-- Related Product Section Begin -->
        <!-- <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
        <!-- Related Product Section End -->
    </div>







    <!-- Categories Section Begin -->
    <div id="firstpage">
        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All Categories</span>
                            </div>
                            <ul>
                                <?php
                                $sql = "select * from category";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <li><a href="#" class="categoryid" data-id="<?php echo $row['catid'] ?>"><?php echo $row['cname'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <!-- <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div> -->
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+92-3446920207</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                            <div class="hero__text">
                                <span>FRUIT FRESH</span>
                                <h2>Vegetable <br />100% Organic</h2>
                                <p>Free Pickup and Delivery Available</p>
                                <a href="#shop" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        <?php
                        $sql = "select * from category";
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="images/<?php echo $row['cimage'] ?>">
                                    <h5><a href="" class="categoryid" data-id="<?php echo $row['catid'] ?>"><?php echo $row['cname'] ?></a></h5>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->

        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="success-message"></div>
                        <div id="error-message"></div>
                        <div class="section-title">
                            <h2 id="shop">Shop Product</h2>
                        </div>
                        <div class="featured__controls">
                            <ul>
                                <li class="active" data-filter="" id="allid">All</li>
                                <?php
                                $sql = "select * from category";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <li data-filter="" class="categoryid" data-id="<?php echo $row['catid']  ?>"><?php echo $row['cname']  ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="form-group featured__controls">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <form class="form-inline my-2 my-lg-0">
                                            <div class="input-group">
                                                <input type="text" id="datasearch" class="form-control" placeholder="Search Product">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="button" id="namesearch">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter" id="catprods">


                </div>
            </div>
        </section>
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <a href="#shop"><img src="img/banner/banner-1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <a href="#shop"><img src="img/banner/banner-1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <!-- Latest Product Section Begin -->
        <section class="latest-product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item" id="latestprod">



                                </div>
                                <div class="latest-prdouct__slider__item" id="latestprod1">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="latest-product__text">
                            <h4>Top Rated Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item" id="ratedprod">

                                </div>
                                <div class="latest-prdouct__slider__item" id="ratedprod1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- Latest Product Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="images/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Central park Lahore</li>
                            <li>Phone: +92 3446920207</li>
                            <li>Email: sajjadahmad@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".categoryid").on("click", function(e) {
                var id = $(this).data("id");
                $.ajax({
                    url: "category.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data) {
                            $("#catprods").html(data);
                        }
                    },
                });

            });

            // All Products
            loaddata();

            function loaddata() {
                $.ajax({
                    url: "allproduct.php",
                    type: "POST",
                    success: function(data) {
                        if (data) {
                            $("#catprods").html(data);
                        }
                    },
                });
            }
            $("#allid").on("click", function(e) {
                loaddata();
            });

            //Search by product
            $("body").on("click", "#namesearch", function(e) {
                e.preventDefault();
                var search = $("#datasearch").val();
                $.ajax({
                    url: "allproduct.php",
                    type: "POST",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        if (data) {
                            $("#catprods").html(data);

                        }
                    },
                });
            });

            //Load latest
            loadlatest();
            loadlatest1();

            function loadlatest() {
                $.ajax({
                    url: "alllatest.php",
                    type: "POST",
                    success: function(data) {
                        if (data) {
                            $(".latest-product__slider #latestprod").html(data);
                        }
                    },
                });
            }

            function loadlatest1() {
                var offset = 3;
                $.ajax({
                    url: "alllatest.php",
                    type: "POST",
                    data: {
                        offset: offset
                    },
                    success: function(data) {
                        if (data) {
                            $(".latest-product__slider #latestprod1").html(data);
                        }
                    },
                });
            }




            //Load highrated
            loadrated();
            loadrated1();

            function loadrated() {
                $.ajax({
                    url: "allrated.php",
                    type: "POST",
                    success: function(data) {
                        if (data) {
                            $(".latest-product__slider #ratedprod").html(data);
                        }
                    },
                });
            }

            function loadrated1() {
                var offset = 3;
                $.ajax({
                    url: "allrated.php",
                    type: "POST",
                    data: {
                        offset: offset
                    },
                    success: function(data) {
                        if (data) {
                            $(".latest-product__slider #ratedprod1").html(data);
                        }
                    },
                });
            }


            //singlepage
            $("body").on("click", ".eachproduct", function(e) {
                e.preventDefault();
                var prodid = $(this).data("id");
                $.ajax({
                    url: "singlepage.php",
                    type: "POST",
                    data: {
                        prodid: prodid
                    },
                    success: function(data) {
                        if (data) {
                            $("#detailpage").show();
                            $("#detailpage").html(data);
                            $("#firstpage").hide();
                        }


                    },

                });

            });

            //// Add to cart
            $("body").on("click", ".addtocart", function(e) {
                e.preventDefault();
                var prodid = $(this).data("id");
                $.ajax({
                    url: "add_to_cart.php",
                    type: "POST",
                    data: {
                        prodid: prodid
                    },
                    success: function(data) {
                        if (data) {
                            $("#success-message").html("Product is added to cart").slideDown().delay(1000).slideUp();
                            $("#cartcount").html(data);

                        }


                    },

                });

            });




            //increment in the product
            $("body").on("click", ".incqty", function(e) {
                e.preventDefault();
                var incid = $(this).data("id");
                $.ajax({
                    url: "increaseitem.php",
                    type: "POST",
                    data: {
                        incid: incid
                    },
                    success: function(data) {
                        if (data) {
                            $("#firstpage").hide();
                            $("#detailpage").hide();
                            $("#checkoutpage").hide();
                            $("#checkoutpage").show();
                            $("#checkoutpage").html(data);
                        }


                    },

                });

            });

            //decrement in the product
            $("body").on("click", ".decqty", function(e) {
                e.preventDefault();
                var decid = $(this).data("id");
                $.ajax({
                    url: "removeitem.php",
                    type: "POST",
                    data: {
                        decid: decid
                    },
                    success: function(data) {
                        if (data) {
                            $("#firstpage").hide();
                            $("#detailpage").hide();
                            $("#checkoutpage").hide();
                            $("#checkoutpage").show();
                            $("#checkoutpage").html(data);
                        }


                    },

                });

            });

            //show cartdetail pagein the product
            $("body").on("click", ".cartdetail", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "cartdetail.php",
                    type: "POST",
                    success: function(data) {
                        if (data) {
                            $("#firstpage").hide();
                            $("#detailpage").hide();
                            $("#checkoutpage").hide();
                            $("#checkoutpage").show();
                            $("#checkoutpage").html(data);
                        }


                    },

                });

            });

            // delete product from cart page
            $("body").on("click", ".delete", function(e) {
                console.log('dalete');
                e.preventDefault();
                var delid = $(this).data("id");
                $.ajax({
                    url: "dellcartitem.php",
                    type: "POST",
                    data: {
                        delid: delid
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $("#firstpage").hide();
                            $("#detailpage").hide();
                            $("#checkoutpage").hide();
                            $("#checkoutpage").show();
                            $("#checkoutpage").html(data);
                        }


                    },

                });

            });



                //show cartdetail pagein the product
            $("body").on("click", "#continue", function(e) {
            e.preventDefault();

            $("#firstpage").show();
            $("#detailpage").hide();
            $("#checkoutpage").hide();

            });

        });

    </script>



</body>

</html>