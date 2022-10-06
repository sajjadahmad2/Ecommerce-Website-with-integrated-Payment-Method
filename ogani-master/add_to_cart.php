<?php
session_start();
include "dbconnection.php";
if(isset($_POST['prodid'])){
    $id=$_POST['prodid'];
    $sql="select * from product where pid=$id";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $productid=$row['pid'];
    $productname=$row['pname'];
    $productprice=$row['pprice'];
    $productimage=$row['pimage'];
    $productquantity=1;
    if(in_array($id, array_column($_SESSION['cart'], "pid"))){
    $index=array_search($id, array_column($_SESSION['cart'], "pid"));
    $_SESSION['cart'][$index]["pquantity"] +=1;
    }else{
    $_SESSION['cart'][]=array("pid"=>$productid,"pname"=>"$productname","pprice"=>"$productprice","pimage"=>"$productimage","pquantity"=>"$productquantity");
    }
}
 


    // $_SESSION['cart'][]=array("pid"=>$productid,"pname"=>"$productname","pprice"=>"$productprice","pimage"=>"$productimage","pquantity"=>"$productquantity");
    
    // echo var_dump($_SESSION['cart']);
    // echo "<br>";
    // $sql="select * from product where pid=11";
    // $result=mysqli_query($link,$sql);
    // $row=mysqli_fetch_assoc($result);
    // $productid=$row['pid'];
    // $productname=$row['pname'];
    // $productprice=$row['pprice'];
    // $productimage=$row['pimage'];
    // if(!empty($_SESSION['cart'])){

    //     $_SESSION['cart'][]=array("pid"=>$productid,"pname"=>"$productname","pprice"=>"$productprice","pimage"=>"$productimage");
    // }
    // $id=11;
    // echo var_dump($_SESSION['cart']);
    // echo "<br>";
    // echo $index=array_search($id, array_column($_SESSION['cart'], "pid"));
    // $_SESSION['cart'][$index]["pprice"] +=30;
    // echo var_dump($_SESSION['cart']);
    // echo "<br>";

    // if(array_search($id, array_column($_SESSION['cart'], "pid"))){
    //     echo"found";
    // }else{
    //     echo"notfound";
    // }
    $total=0;
  
    $quantityarray=array_column($_SESSION['cart'], "pquantity");
    $sumqty=array_sum($quantityarray);
foreach($_SESSION['cart'] as  $values){

     $total+= $values['pprice'] * $values['pquantity'];
}
$output='<div class="header__cart">
<ul>
    <li><a><i class="fa fa-shopping-bag cartdetail"></i><span>'.$sumqty.'</span></a></li>
</ul>
<div class="header__cart__price">item: <span>RS.'.$total.'</span></div>
</div>';
echo $output;
?>