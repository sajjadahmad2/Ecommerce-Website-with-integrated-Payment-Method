<?php
session_start();
include "dbconnection.php";
$quantityarray=array_column($_SESSION['cart'], "pquantity");
    $sumqty=array_sum($quantityarray);
    $output='<div class="header__cart">
    <ul>
        <li><a><i class="fa fa-shopping-bag" id="cartdetail"></i><span></span></a></li>
    </ul>
    <div class="header__cart__price">item: <span>RS.</span></div>
</div>';
$total=0;
$output='';
$output.='<section class="shoping-cart spad">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                        <tr>
                            <th class="shoping__product">Product Image</th>  
                            <th class="shoping__product">Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
foreach($_SESSION['cart'] as  $values){
     $output.='<tr>
     <td class="shoping__cart__item">
         <img src="images/'.$values['pimage'].'" alt="">
     </td>
     <td class="shoping__cart__price">
         '.$values['pname'].'
     </td>
     <td class="shoping__cart__price">
         Rs.'.$values['pprice'].'
     </td>
     <td class="shoping__cart__quantity">
     <div class="quantity">
        <div class="pro-qty"><span class="dec qtybtn decqty" data-id="'.$values['pid'].'">-</span>
            <input type="text" value="'.$values['pquantity'].'">
        <span class="inc qtybtn incqty" data-id="'.$values['pid'].'">+</span></div>
    </div>

     </td>
     <td class="shoping__cart__total">
         Rs.'.$values['pprice']*$values['pquantity'].'
     </td>
     <td class="shoping__cart__item__close delete" data-id="'.$values['pid'].'">
         <span class="icon_close" ></span>
     </td>
 </tr>';
}
$output.='</tbody>
</table>
</div>
</div>
</div>
<a class="primary-btn cart-btn" id="continue">CONTINUE SHOPPING</a>
<div class="row">
<div class="col-lg-6">
    <div class="shoping__checkout">
        <h5>Cart Total</h5>
        <ul>';
        foreach($_SESSION['cart'] as  $values){

            $total+= $values['pprice'] * $values['pquantity'];
       }
        $output.='<li>Subtotal <span>Rs.'.$total.'</span></li>
            <li>Total <span>Rs.'.$total.'</span></li>
        </ul>
        <a href="checkout.php
        " class="primary-btn">PROCEED TO CHECKOUT</a>
    </div>
</div>
</div>
</div>
</section>';
echo $output;
?>