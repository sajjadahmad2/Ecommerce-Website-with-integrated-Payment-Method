<?php
include "dbconnection.php";
if(isset($_POST['offset'])){
$offset=$_POST['offset'];
}else{
    $offset=0;
}
$sql = "select * from product order by date_added limit $offset,3";
$result = mysqli_query($link, $sql);
$output = "";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '<a  class="latest-product__item">
   <div class="latest-product__item__pic eachproduct" data-id="'.$row['pid'].'">
       <img src="images/'.$row['pimage'].'" alt="">
   </div>
   <div class="latest-product__item__text">
       <h6>'.$row['pname'].'</h6>
       <span> PerKg Rs.'.$row['pprice'].'</span>
   </div>
</a>';
}
echo $output;
?>

