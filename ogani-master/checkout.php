<?php
include "dbconnection.php";
include "stripconfig.php";
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
    <script src="https://js.stripe.com/v2/"></script>
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
                                if (isset($_SESSION['username'])) {

                                    echo '<a href="logout.php"><i class="fa fa-user"></i> Logout</a>';
                                } else {
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
                        <a href="./index.html"><img src="images/logo.png" alt=""></a>
                    </div>
                </div>
                <div id="success-message"></div>
                <div id="error-message"></div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a><i class="fa fa-shopping-bag" id="cartdetail"></i><span><?php
                                                                                            if (isset($_SESSION['cart'])) {
                                                                                                $quantityarray = array_column($_SESSION['cart'], "pquantity");
                                                                                                $sumqty = array_sum($quantityarray);
                                                                                                echo $sumqty;
                                                                                            } else {
                                                                                                echo 0;
                                                                                            } ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>RS.<?php
                                                                        if (isset($_SESSION['cart'])) {
                                                                            $pricearray = array_column($_SESSION['cart'], "pprice");
                                                                            $sumprice = array_sum($pricearray);
                                                                            echo $sumprice;
                                                                        } else {
                                                                            echo 0.0;
                                                                        }
                                                                        ?></span></div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form id="addressform">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <?php if (isset($_SESSION['userid'])) {
                                            $id = $_SESSION['userid'];
                                            $sql = "select * from user where uid =$id";
                                            $result = mysqli_query($link, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $firstname = $row['firstname'];
                                            $lastname = $row['lastname'];
                                            $contact = $row['contact'];
                                            $email = $row['email'];
                                        }
                                        ?>
                                        <p>Fist Name=</p>
                                        <input type="text" name="firstname" value="<?php echo $firstname ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name</p>
                                        <input type="text" name="lastname" value="<?php echo $lastname ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country</p>
                                <input type="text" name="country" id="country">
                            </div>
                            <div class="checkout__input">
                                <p>Address</p>
                                <input type="text" name="address" id="address" placeholder="Street Address" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City=</p>
                                <input type="text" name="city" id="city">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP</p>
                                <input type="text" name="zipcode" id="zipcode">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone</p>
                                        <input type="text" id="contact" value="<?php echo $contact ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email</p>
                                        <input type="email" id="email" value="<?php echo $email ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php foreach ($_SESSION['cart'] as  $values) {
                                        echo '<li>' . $values['pname'] . '<span>Rs.' . $values['pprice'] * $values['pquantity'] . '</span></li>';
                                    }
                                    ?>
                                </ul>
                                <?php
                                $total = 0;
                                foreach ($_SESSION['cart'] as  $values) {

                                    $total += $values['pprice'] * $values['pquantity'];
                                }
                                echo '<div class="checkout__order__subtotal">Subtotal <span>Rs.' . $total . '</span></div>
                                <div class="checkout__order__total">Total <span>Rs.' . $total . '</span></div>';
                                ?>

                                <button type="submit" class="site-btn" id="submit">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="#paymentprocess" method="post">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $publishableKey ?>" data-amount="<?php echo $total ?>" data-name="Organi Payments" data-description="Healthyfood HEalthy Life"
                    data-image="" 
                    data-currency="fkp"
                    data-email="phpvishal@gmail.com">
                </script>

            </form>
            </div>
        </div>
    </section>
<div id="paymentprocess">
<?php
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$output=\Stripe\Charge::create(array(
		"amount"=>$total,
		"currency"=>"fkp",
		"description"=>"Healthyfood HEalthy Life",
		"source"=>$token,
	));
if($output){
    echo '<script>
    alert("Payment Succesfull")
    </script>';
}
}
?>
</div>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
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
            $("#submit").on("click", function(e) {
                var country = $("#country").val();
                var city = $("#city").val();
                var address = $("#address").val();
                var zipcode = $("#zipcode").val();
                $.ajax({
                    url: "shippingaddress.php",
                    type: "POST",
                    data: {
                        country: country,
                        city: city,
                        address: address,
                        zipcode: zipcode
                    },
                    success: function(data) {
                        if (data) {
                            alert(data);
                            location.href = 'index.php'
                        }
                    }
                });

            });

        });
    </script>



</body>

</html>