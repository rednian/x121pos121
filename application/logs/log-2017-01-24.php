<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-01-24 09:11:16 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 09:18:02 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 09:21:27 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 10:42:05 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:42:09 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:42:23 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:42:30 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:42:37 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:42:46 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:43:00 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\models\package.php 38
ERROR - 2017-01-24 10:43:46 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 10:51:35 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 10:52:20 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 10:59:59 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 11:18:59 --> Query error: Column 'p_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `package`
JOIN `Service_package` ON `Service_package`.`p_id` = `package`.`p_id`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `p_id` = '1'
ERROR - 2017-01-24 11:25:25 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 11:32:48 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 11:49:23 --> Query error: Unknown column 'service_package.p_id' in 'where clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_package`.`p_id` = '4'
ERROR - 2017-01-24 11:53:59 --> Query error: Unknown column 'Service_package.service_info_id' in 'on clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_info`.`service_info_id` = '4'
ERROR - 2017-01-24 11:54:14 --> Query error: Unknown column 'Service_package.service_info_id' in 'on clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_info`.`service_info_id` = '7'
ERROR - 2017-01-24 11:54:24 --> Query error: Unknown column 'Service_package.service_info_id' in 'on clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_info`.`service_info_id` = '1'
ERROR - 2017-01-24 13:41:41 --> Query error: Unknown column 'Service_package.service_info_id' in 'on clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_info`.`service_info_id` = ''
ERROR - 2017-01-24 13:41:47 --> Query error: Unknown column 'Service_package.service_info_id' in 'on clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_info`.`service_info_id` = '56'
ERROR - 2017-01-24 13:42:53 --> Query error: Unknown column 'service_package.service_info_id' in 'where clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_package`.`service_info_id` = ''
ERROR - 2017-01-24 13:45:09 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 13:46:15 --> Query error: Unknown column 'service_package.service_info_id' in 'where clause' - Invalid query: SELECT *
FROM `package`
JOIN `service_info` ON `service_info`.`service_info_id` = `Service_package`.`service_info_id`
WHERE `service_package`.`service_info_id` = ''
ERROR - 2017-01-24 13:49:48 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 13:50:13 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 13:50:30 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 13:50:57 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 13:52:36 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 1124
ERROR - 2017-01-24 13:53:27 --> Severity: Notice --> Undefined variable: code C:\xampp\htdocs\sochic\application\controllers\sell.php 682
ERROR - 2017-01-24 14:21:06 --> Severity: Notice --> Undefined variable: code C:\xampp\htdocs\sochic\application\controllers\sell.php 682
ERROR - 2017-01-24 15:06:35 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-24 15:06:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-24 15:06:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-24 15:07:47 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-24 15:07:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-24 15:07:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-24 15:07:57 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-24 15:08:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-24 15:08:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-24 16:03:07 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\views\profile\product\product_details.php 2
ERROR - 2017-01-24 16:07:59 --> Severity: Notice --> Undefined variable: temp_table C:\xampp\htdocs\sochic\application\controllers\sell.php 1326
ERROR - 2017-01-24 16:07:59 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 1326
ERROR - 2017-01-24 16:07:59 --> Severity: error --> Exception: Call to a member function affected_rows() on null C:\xampp\htdocs\sochic\application\controllers\sell.php 1326
ERROR - 2017-01-24 16:15:39 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:15:39 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:15:39 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:22:12 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:22:12 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:22:12 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:23:06 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:23:35 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:25:12 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:25:13 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:25:13 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:25:49 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:25:49 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:25:50 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:26:20 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:26:20 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:26:20 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:26:30 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:26:30 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:26:30 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:28:28 --> Query error: Unknown column 'price1' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price1` >0
ORDER BY `service_info`.`service_info_id` DESC
ERROR - 2017-01-24 16:30:06 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `stock_out_history`.`date_out` = '2017-01-24'
AND `trans_code`.`acc_id` = '32'
AND `trans_code`.`t_code` = '000001'
