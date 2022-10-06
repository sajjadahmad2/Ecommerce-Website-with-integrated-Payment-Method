<?php
include "dbconnection.php";
if(isset($_POST['id'])){
   $id=$_POST['id'];
   $sql="select * from product where category_id=$id";
   $result=mysqli_query($link,$sql);
   $output="";
   while($row=mysqli_fetch_assoc($result)){

   $output .='<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
   <div class="featured__item">
       <div class="featured__item__pic set-bg">
       <img class="featured__item__pic set-bg eachproduct" data-id="'.$row['pid'].'" src="images/'.$row['pimage'].'">
           <ul class="featured__item__pic__hover">
               <li><a href="#"><i class="fa fa-heart"></i></a></li>
               <li><a href="#"><i class="fa fa-retweet"></i></a></li>
               <li><a class="addtocart" data-id="'.$row['pid'].'"><i class="fa fa-shopping-cart"></i></a></li>
           </ul>
       </div>
       <div class="featured__item__text">
           <h6><a href="#">'.$row['pname'].'</a></h6>
           <h5>RS.'.$row['pprice'].'</h5>
       </div>
   </div>
</div>';
}
echo $output;
}
?>