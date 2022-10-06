<?php
include "dbconnection.php";
if(isset($_POST['prodid'])){
   $id=$_POST['prodid'];
   $sql="SELECT p.pname ,p.pimage,p.pprice,p.pdescription,p.pid,pquantity,avg(rate)as rated,count(rate)as totalrev from product p left join rating r on p.pid=r.product_id where p.pid=$id";
   $result=mysqli_query($link,$sql);
   $output="";
   while($row=mysqli_fetch_assoc($result)){

    $output .='<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="images/'.$row['pimage'].'" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>'.$row['pname'].'</h3>
                    <div class="product__details__rating">';
                        if($row['rated']=3){
                        $output.='<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
                        }elseif($row['rated']>3 && $row['rated'] <= 3.5 ){
                        $output.='<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>';
                        }elseif($row['rated'] > 3.5 && $row['rated'] <= 3.9 ){
                        $output.='<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>';
                        }elseif($row['rated'] == 4){
                         $output.='<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>';
                        }elseif($row['rated'] > 4){
                        $output.='<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
                        }
                        $output .='<span>'.$row['totalrev'].'</span>
                    </div>
                    <div class="product__details__price">RS.'.$row['pprice'].'</div>
                    <p>'.$row['pdescription'].'</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a  class="primary-btn addtocart" data-id="'.$row['pid'].'">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>';
                        if($row['pquantity'] > 0){
                        $output .='<li><b>Availability</b> <span>In Stock</span></li>';
                        }else{
                            $output .='<li><b>Availability</b> <span>out of Stock</span></li>';
                        }
                        $output .='<li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>1kg</span></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>';
}
echo $output;
}
?>