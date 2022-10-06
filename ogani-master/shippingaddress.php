<?php
include 'dbconnection.php';
session_start();
$userid=$_SESSION['userid'];
if(isset($_POST['country'])){
    $country=$_POST['country'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $zip=$_POST['zipcode'];
    $total=0;
foreach($_SESSION['cart'] as  $values){

    $total+= $values['pprice'] * $values['pquantity'];
}
$date=date('Y-m-d');
$sql="insert into `order` (date_ordered,complete_status,customer_id,ammount) values('$date','Pending','$userid','$total')";
$result=mysqli_query($link,$sql);
$sql1 = "select oid from `order` where oid = LAST_INSERT_ID()";
$result1=mysqli_query($link,$sql1);
$row=mysqli_fetch_assoc($result1);
$orderid=$row['oid'];
foreach($_SESSION['cart'] as  $values){
    $id=$values['pid'];
    $quantity=$values['pquantity'];
    $sql3="insert into orderitem (quantity,order_id,product_id) values('$quantity','$orderid','$id')";
    mysqli_query($link,$sql3);
}
$sql4="insert into shippingaddress (country,city,address,zip,order_id) values('$country','$city','$address','$zip','$orderid')";
$result4=mysqli_query($link,$sql4);
echo "Order is successfullyysaved";
unset($_SESSION['cart']);
}

?>
