<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-01-26 13:27:26 --> Query error: Unknown column 'is_service' in 'field list' - Invalid query: INSERT INTO `temp_table` (`id`, `bc_id`, `acc_id`, `discount`, `price`, `mark_up`, `quantity`, `vat`, `last_update`, `is_service`) VALUES (NULL, '808', '32', '0', '714.29', '150', '1', '85.71', '2017-01-26 01:01:26', 0)
ERROR - 2017-01-26 13:27:31 --> Query error: Unknown column 'is_service' in 'field list' - Invalid query: INSERT INTO `temp_table` (`id`, `bc_id`, `acc_id`, `discount`, `price`, `mark_up`, `quantity`, `vat`, `last_update`, `is_service`) VALUES (NULL, '808', '32', '0', '714.29', '150', '1', '85.71', '2017-01-26 01:01:31', 0)
ERROR - 2017-01-26 13:31:54 --> Query error: Unknown column 'is_service' in 'field list' - Invalid query: INSERT INTO `temp_table` (`id`, `bc_id`, `acc_id`, `discount`, `price`, `mark_up`, `quantity`, `vat`, `last_update`, `is_service`) VALUES (NULL, '790', '32', '0', '5357.14', '100', '1', '642.86', '2017-01-26 01:01:54', 0)
ERROR - 2017-01-26 13:39:21 --> Severity: Notice --> Undefined index: qty C:\xampp\htdocs\sochic\application\controllers\sell.php 1389
ERROR - 2017-01-26 13:51:08 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `stock_out_history`.`date_out` = '2017-01-26'
AND `trans_code`.`acc_id` = '32'
AND `trans_code`.`t_code` = '000014'
ERROR - 2017-01-26 13:53:19 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `stock_out_history`.`date_out` = '2017-01-26'
AND `trans_code`.`acc_id` = '32'
AND `trans_code`.`t_code` = '000014'
ERROR - 2017-01-26 13:53:22 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `stock_out_history`.`date_out` = '2017-01-26'
AND `trans_code`.`acc_id` = '32'
AND `trans_code`.`t_code` = '000014'
ERROR - 2017-01-26 13:53:27 --> Query error: Unknown column 'product_main_info.prod_class_id' in 'on clause' - Invalid query: SELECT *
FROM `trans_code`
JOIN `stock_out_history` ON `stock_out_history`.`tc_id` = `trans_code`.`tc_id`
JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `size` ON `product_main_info`.`prod_size_id` = `size`.`prod_size_id`
JOIN `weight_unit` ON `product_main_info`.`prod_wu_id` = `weight_unit`.`prod_wu_id`
JOIN `product_type` ON `product_main_info`.`prod_type_id` = `product_type`.`prod_type_id`
JOIN `product_class` ON `product_class`.`prod_type_id` = `product_type`.`prod_type_id` AND `product_main_info`.`prod_class_id` = `product_class`.`prod_class_id`
WHERE `stock_out_history`.`date_out` = '2017-01-26'
AND `trans_code`.`acc_id` = '32'
AND `trans_code`.`t_code` = '000014'
ERROR - 2017-01-26 13:54:56 --> Severity: Notice --> Undefined variable: code C:\xampp\htdocs\sochic\application\controllers\sell.php 682
ERROR - 2017-01-26 14:06:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\user_account.php 285
ERROR - 2017-01-26 14:06:10 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\user_account.php 292
ERROR - 2017-01-26 14:51:59 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-26 14:51:59 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 14:51:59 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 14:52:41 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 14:52:41 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 14:52:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `p' at line 3 - Invalid query: SELECT *
FROM `product_main_info`
JOIN `product_class` ON `product_class`. = `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `product_main_info`.`prod_type_id`
JOIN `barcode` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `weight_unit` ON `weight_unit`.`prod_wu_id` = `product_main_info`.`prod_wu_id`
JOIN `size` ON `size`.`prod_size_id` = `product_main_info`.`prod_size_id`
JOIN `stock_in` ON `stock_in`.`bc_id` = `barcode`.`bc_id`
JOIN `pricing` ON `pricing`.`bc_id` = `barcode`.`bc_id`
WHERE `barcode`.`prod_id` = 825
ERROR - 2017-01-26 15:33:29 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-26 15:33:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 15:33:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 15:33:30 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 739
ERROR - 2017-01-26 15:34:53 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:34:53 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:34:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `p' at line 3 - Invalid query: SELECT *
FROM `product_main_info`
JOIN `product_class` ON `product_class`. = `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `product_main_info`.`prod_type_id`
JOIN `barcode` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `weight_unit` ON `weight_unit`.`prod_wu_id` = `product_main_info`.`prod_wu_id`
JOIN `size` ON `size`.`prod_size_id` = `product_main_info`.`prod_size_id`
JOIN `stock_in` ON `stock_in`.`bc_id` = `barcode`.`bc_id`
JOIN `pricing` ON `pricing`.`bc_id` = `barcode`.`bc_id`
WHERE `barcode`.`prod_id` = 825
ERROR - 2017-01-26 15:34:57 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:34:57 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:34:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `p' at line 3 - Invalid query: SELECT *
FROM `product_main_info`
JOIN `product_class` ON `product_class`. = `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `product_main_info`.`prod_type_id`
JOIN `barcode` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `weight_unit` ON `weight_unit`.`prod_wu_id` = `product_main_info`.`prod_wu_id`
JOIN `size` ON `size`.`prod_size_id` = `product_main_info`.`prod_size_id`
JOIN `stock_in` ON `stock_in`.`bc_id` = `barcode`.`bc_id`
JOIN `pricing` ON `pricing`.`bc_id` = `barcode`.`bc_id`
WHERE `barcode`.`prod_id` = 825
ERROR - 2017-01-26 15:35:28 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:35:28 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:35:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `p' at line 3 - Invalid query: SELECT *
FROM `product_main_info`
JOIN `product_class` ON `product_class`. = `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `product_main_info`.`prod_type_id`
JOIN `barcode` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `weight_unit` ON `weight_unit`.`prod_wu_id` = `product_main_info`.`prod_wu_id`
JOIN `size` ON `size`.`prod_size_id` = `product_main_info`.`prod_size_id`
JOIN `stock_in` ON `stock_in`.`bc_id` = `barcode`.`bc_id`
JOIN `pricing` ON `pricing`.`bc_id` = `barcode`.`bc_id`
WHERE `barcode`.`prod_id` = 822
ERROR - 2017-01-26 15:36:33 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:36:33 --> Severity: Notice --> Undefined variable: commonPk C:\xampp\htdocs\sochic\application\core\MY_Model.php 95
ERROR - 2017-01-26 15:36:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `p' at line 3 - Invalid query: SELECT *
FROM `product_main_info`
JOIN `product_class` ON `product_class`. = `product_main_info`.
JOIN `product_type` ON `product_type`.`prod_type_id` = `product_main_info`.`prod_type_id`
JOIN `barcode` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
JOIN `weight_unit` ON `weight_unit`.`prod_wu_id` = `product_main_info`.`prod_wu_id`
JOIN `size` ON `size`.`prod_size_id` = `product_main_info`.`prod_size_id`
JOIN `stock_in` ON `stock_in`.`bc_id` = `barcode`.`bc_id`
JOIN `pricing` ON `pricing`.`bc_id` = `barcode`.`bc_id`
WHERE `barcode`.`prod_id` = 825
ERROR - 2017-01-26 15:39:08 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-01-26 15:39:08 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-01-26 15:39:08 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-01-26 15:39:08 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-01-26 15:47:22 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-01-26 15:47:22 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-01-26 15:48:47 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-26 15:48:47 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 739
ERROR - 2017-01-26 15:48:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 15:48:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 15:49:14 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-01-26 15:49:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 15:49:15 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 739
ERROR - 2017-01-26 15:49:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-01-26 17:06:39 --> Query error: Unknown column 'name' in 'field list' - Invalid query: INSERT INTO `Service_artist_temp` (`service_artist_id`, `ar_id`, `id`, `acc_id`, `service_info_id`, `commission`, `name`) VALUES (NULL, NULL, NULL, '32', '', '56', 'John Jjj Doe')
