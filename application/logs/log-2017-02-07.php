<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-07 09:28:00 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `trans_code`.`tc_id` = ''
ORDER BY `stock_out_history`.`stock_out_hist_id` DESC
ERROR - 2017-02-07 09:40:38 --> Severity: Compile Error --> Cannot redeclare Reports::detail_report() C:\xampp\htdocs\sochic\application\controllers\reports.php 228
ERROR - 2017-02-07 09:40:49 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `trans_code`.`tc_id` = 38
ORDER BY `stock_out_history`.`stock_out_hist_id` DESC
ERROR - 2017-02-07 11:48:34 --> Severity: Notice --> Undefined variable: grand_total C:\xampp\htdocs\sochic\application\controllers\reports.php 196
ERROR - 2017-02-07 14:00:59 --> Severity: Notice --> Undefined variable: temp_table C:\xampp\htdocs\sochic\application\controllers\sell.php 1643
ERROR - 2017-02-07 14:00:59 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 1643
ERROR - 2017-02-07 14:00:59 --> Severity: error --> Exception: Call to a member function affected_rows() on null C:\xampp\htdocs\sochic\application\controllers\sell.php 1643
ERROR - 2017-02-07 15:26:39 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-02-07 15:26:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-07 15:26:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
