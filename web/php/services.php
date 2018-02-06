<?php
require_once 'config.php';




//Get page number from Ajax
if(isset($_POST["page"])){
   $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
   if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
   $page_number = 1; //if there's no page number, set it to 1
}


$item_per_page = 5;

//position of records
$page_position = (($page_number-1) * $item_per_page);


$query = "SELECT * FROM service_info, availability_status, pricing
          WHERE service_info.service_info_id = pricing.service_info_id
          AND service_info.service_info_id = availability_status.service_info_id
          AND availability_status.`status` = 'available'
          AND service_info.`view` = 1
          ORDER BY service_info.service_name
          LIMIT $page_position,$item_per_page";

 $results = $conn->query($query);

 if($results->num_rows > 0){
   while($row = $results->fetch_array()){ ?>

    <div class="col-md-3 col-sm-3 col-xs-12">
      <img class="img-thumbnail" style="border: 1px solid #eeeeee; width:250px; height:auto; max-height:205px;" src="<?php echo '../uploads/'.$row['service_image']; ?>" />
      <p class="text-white text-center" style="margin-top:2%;"><?php echo ucwords(htmlspecialchars($row['service_name'])); ?></p>
    </div>
   
  <?php }
 }

?>
  
