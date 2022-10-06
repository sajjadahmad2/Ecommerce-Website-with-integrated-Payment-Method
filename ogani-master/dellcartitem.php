<?php
session_start();
include 'dbconnection.php';
if(isset($_POST['delid'])){
    $delid=$_POST['delid'];
    $index=array_search($delid, array_column($_SESSION['cart'], "pid"));
    if(count($_SESSION['cart'])> 1){
        unset($_SESSION['cart'][$index]);
    }else{
        session_unset();
    }
        
}
if(isset($_SESSION['cart'])){
    $quantityarray=array_column($_SESSION['cart'], "pquantity");
$sumqty=array_sum($quantityarray);
$pricearray=array_column($_SESSION['cart'], "pprice");
$sumprice=array_sum($pricearray);
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
<div class="row">
<div class="col-lg-6">
    <div class="shoping__checkout">
        <h5>Cart Total</h5>
        <ul>
            <li>Subtotal <span>Rs.'.$sumprice.'</span></li>
            <li>Total <span>Rs.'.$sumprice.'</span></li>
        </ul>
        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
    </div>
</div>
</div>
</div>
</section>';
echo $output;
}
else{
    echo "No Product is added to the Cart";
}
?>