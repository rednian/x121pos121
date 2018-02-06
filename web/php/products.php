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

//Limit our results within a specified range.
$query = "SELECT * FROM product_main_info, pricing, barcode, product_type
        WHERE product_main_info.prod_id = barcode.prod_id
        AND barcode.bc_id = pricing.bc_id
        AND product_main_info.prod_type_id = product_type.prod_type_id
         AND product_main_info.on_delete IS NULL
        AND product_main_info.`view` = 1 ORDER BY prod_name LIMIT $page_position, $item_per_page";

 $results = $conn->query($query);

 if($results->num_rows > 0){
   while($row = $results->fetch_array()){ ?>

    <div class="col-md-3 col-sm-3 col-xs-12">
      <img class="img-thumbnail" style="border: 1px solid #eeeeee; width:250px; height:auto; max-height:205px;" src="<?php echo '../uploads/'.$row['prod_image']; ?>" />
      <p class="text-white text-center" style="margin-top:2%;"><?php echo ucwords(htmlspecialchars($row['prod_name'])); ?></p>
    </div>
   
  <?php }
 }

?>
  
