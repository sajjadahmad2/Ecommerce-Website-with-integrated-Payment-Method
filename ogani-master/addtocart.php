<?php
include "dbconnection.php";
 if(isset($_POST['prodid'])){
    $exiting_cart =[];
   $id=$_POST['prodid'];
   $sql="select * from product where pid=$id";
   $result=mysqli_query($link,$sql);
   $row=mysqli_fetch_assoc($result);
   $productid=$row['pid'];
   $productname=$row['pname'];
   $productprice=$row['pprice'];
   $productimage=$row['pimage'];
    $recent=array("pid"=>$productid,"pname"=>"$productname","pprice"=>"$productprice","pimage"=>"$productimage");

    $exiting_cart[] = array_merge($exiting_cart,$recent);

    //other scerio
     $sssion_array =[];
     if(in_array($id,$array)){
        $indedx =
        $qty +=1
     }
 }
//    $output="";
//    while($row=mysqli_fetch_assoc($result)){
//    $output.='<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
//    <div class="featured__item">
//        <div class="featured__item__pic set-bg">
//        <img class="featured__item__pic set-bg eachproduct" data-id="'.$row['pid'].'" src="images/'.$row['pimage'].'">
//            <ul class="featured__item__pic__hover">
//                <li><a href="#"><i class="fa fa-heart"></i></a></li>
//                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
//                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
//            </ul>
//        </div>
//        <div class="featured__item__text">
//            <h6><a href="#">'.$row['pname'].'</a></h6>
//            <h5>RS.'.$row['pprice'].'</h5>
//        </div>
//    </div>
// </div>';
// }
// echo $output;

//  }
//  <?php   
// session_start();

// if(!empty($_SESSION['shopping_cart'])){  
//     $total = 0;  

//     foreach($_SESSION['shopping_cart'] as $key => $row){ 

//     $output .='<a href="?action=delete&id='.$row['id'].'" class="action-icon close-shopping-cart-box"><i class="ti ti-close"></i></a>';
//     $output .='<span>'.$row['titel'].'</span><span class="text-muted"> x '.$row['quantity'].'</span><br /> ';


//     $total = $total + ($row['quantity'] * $row['prijs']);  
//     }  

//     $output.='<br />Totaal:&euro; '.number_format($total, 2).'';



// if (isset($_SESSION['shopping_cart'])){
// if (count($_SESSION['shopping_cart']) > 0){

//     $output.='<a href="checkout-cash" style="margin-top:20px;" class="btn btn-outline-warning">Cash payment</a>';
//     $output.='<a href="checkout-paypal" style="margin-top:20px;" class="btn btn-outline-warning">Paypal payment</a>';

//  }}
?>