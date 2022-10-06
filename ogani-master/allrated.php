<?php
include "dbconnection.php";
if(isset($_POST['offset'])){
$offset=$_POST['offset'];
}else{
    $offset=0;
}
$sql1="SELECT p.pname,p.pid,p.pimage,p.pprice,max(rate)as rated from rating r left join product p on r.product_id= p.pid group by product_id order by rated desc limit $offset,3";
$result1 = mysqli_query($link, $sql1);
$output1 = "";
while ($row1 = mysqli_fetch_assoc($result1)) {
    $output1 .= '<a href="#" class="latest-product__item">
    <div class="latest-product__item__pic eachproduct" data-id="'.$row1['pid'].'">
       <img src="images/'.$row1['pimage'].'" alt="">
   </div>
   <div class="latest-product__item__text">
       <h6>'.$row1['pname'].'</h6>
       <span> PerKg Rs.'.$row1['pprice'].'</span><span> Rating:'.$row1['rated'].'Star</span>
   </div>
</a>';
}
echo $output1;
?>

