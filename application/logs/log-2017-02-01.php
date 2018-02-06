<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-01 08:30:08 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 08:32:16 --> Severity: Notice --> Undefined variable: remove_service C:\xampp\htdocs\sochic\application\controllers\sell.php 773
ERROR - 2017-02-01 08:32:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 773
ERROR - 2017-02-01 08:32:16 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\sell.php 794
ERROR - 2017-02-01 08:32:42 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 08:34:47 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 08:37:59 --> Severity: Notice --> Undefined property: Sell::$ar_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 09:40:31 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp\htdocs\sochic\application\controllers\sell.php 964
ERROR - 2017-02-01 09:40:42 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\controllers\sell.php 964
ERROR - 2017-02-01 09:43:33 --> Severity: error --> Exception: syntax error, unexpected '$service_rendered' (T_VARIABLE) C:\xampp\htdocs\sochic\application\controllers\sell.php 779
ERROR - 2017-02-01 10:19:50 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file C:\xampp\htdocs\sochic\application\controllers\sell.php 946
ERROR - 2017-02-01 10:33:31 --> Severity: error --> Exception: Unable to locate the model you have specified: Artist_commission C:\xampp\htdocs\sochic\system\core\Loader.php 344
ERROR - 2017-02-01 10:34:17 --> Severity: error --> Exception: C:\xampp\htdocs\sochic\application\models/Artist_commission_model.php exists, but doesn't declare class Artist_commission_model C:\xampp\htdocs\sochic\system\core\Loader.php 336
ERROR - 2017-02-01 10:35:03 --> Severity: error --> Exception: Unable to locate the model you have specified: Artist_commision_model C:\xampp\htdocs\sochic\system\core\Loader.php 344
ERROR - 2017-02-01 10:37:17 --> Query error: Unknown column 'id' in 'field list' - Invalid query: INSERT INTO `Artist_commision` (`id`, `commision`, `date`, `ar_id`, `r_id`, `commission`) VALUES (NULL, NULL, '2017-02-01', '33', 68, '150')
ERROR - 2017-02-01 10:38:28 --> Query error: Unknown column 'commision' in 'field list' - Invalid query: INSERT INTO `Artist_commision` (`ac_id`, `commision`, `date`, `ar_id`, `r_id`, `commission`) VALUES (NULL, NULL, '2017-02-01', '33', 69, '150')
ERROR - 2017-02-01 11:38:25 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ')' C:\xampp\htdocs\sochic\application\controllers\reports.php 41
ERROR - 2017-02-01 12:19:43 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\sochic\application\views\reports\artist.php 39
ERROR - 2017-02-01 14:03:54 --> Severity: Notice --> Undefined property: Reports::$all_report C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 14:04:14 --> Query error: Table 'sochic.artist_commission' doesn't exist - Invalid query: SELECT *
FROM `artist`
JOIN `Artist_commission` ON `Artist_commission`.`ar_id` = `artist`.`ar_id`
ERROR - 2017-02-01 14:13:42 --> Severity: Notice --> Undefined variable: code C:\xampp\htdocs\sochic\application\controllers\sell.php 694
ERROR - 2017-02-01 14:35:24 --> Query error: Unknown column 'ar_id' in 'field list' - Invalid query: INSERT INTO `Artist_temp` (`artist_id`, `service_info_id`, `ar_id`, `acc_id`, `id`, `commission`) VALUES (NULL, '62', '33', '32', '29', 6)
ERROR - 2017-02-01 14:37:39 --> Query error: Unknown column 'id' in 'field list' - Invalid query: INSERT INTO `Artist_temp` (`artist_id`, `service_info_id`, `ar_id`, `acc_id`, `id`, `commission`) VALUES (NULL, '62', '33', '32', '29', 0.36)
ERROR - 2017-02-01 14:40:24 --> Severity: error --> Exception: Class 'Artist_temp' not found C:\xampp\htdocs\sochic\application\controllers\sell.php 149
ERROR - 2017-02-01 14:40:53 --> Severity: error --> Exception: Class 'Artist_temp' not found C:\xampp\htdocs\sochic\application\controllers\sell.php 149
ERROR - 2017-02-01 14:45:09 --> Severity: Notice --> Undefined property: Sell::$service_artist_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 14:45:24 --> Severity: Notice --> Undefined property: Sell::$service_artist_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 14:47:02 --> Severity: Notice --> Undefined property: Sell::$service_artist_id C:\xampp\htdocs\sochic\system\core\Model.php 77
ERROR - 2017-02-01 14:50:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 14:50:16 --> Query error: Column 'bc_id' cannot be null - Invalid query: INSERT INTO `temp_table` (`id`, `bc_id`, `acc_id`, `discount`, `price`, `mark_up`, `quantity`, `vat`, `last_update`) VALUES (NULL, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL)
ERROR - 2017-02-01 14:50:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 14:50:22 --> Query error: Column 'bc_id' cannot be null - Invalid query: INSERT INTO `temp_table` (`id`, `bc_id`, `acc_id`, `discount`, `price`, `mark_up`, `quantity`, `vat`, `last_update`) VALUES (NULL, NULL, NULL, '500', NULL, NULL, NULL, NULL, NULL)
ERROR - 2017-02-01 14:50:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 14:50:29 --> Query error: Column 'bc_id' cannot be null - Invalid query: INSERT INTO `temp_table` (`id`, `bc_id`, `acc_id`, `discount`, `price`, `mark_up`, `quantity`, `vat`, `last_update`) VALUES (NULL, NULL, NULL, '50%', NULL, NULL, NULL, NULL, NULL)
ERROR - 2017-02-01 14:50:51 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`sochic`.`service_artist_temp`, CONSTRAINT `service_artist_temp_ibfk_2` FOREIGN KEY (`id`) REFERENCES `service_temp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `Service_artist_temp` (`service_artist_id`, `ar_id`, `id`, `acc_id`, `service_info_id`, `commission`) VALUES (NULL, '35', '13', '32', '60', 30)
ERROR - 2017-02-01 14:52:32 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 14:52:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 15:07:37 --> Severity: error --> Exception: syntax error, unexpected '}', expecting variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\sochic\application\controllers\sell.php 82
ERROR - 2017-02-01 15:07:57 --> Severity: error --> Exception: syntax error, unexpected '}', expecting variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\sochic\application\controllers\sell.php 83
ERROR - 2017-02-01 15:07:59 --> Severity: error --> Exception: syntax error, unexpected '}', expecting variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\sochic\application\controllers\sell.php 83
ERROR - 2017-02-01 15:08:08 --> Severity: error --> Exception: syntax error, unexpected '}', expecting variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\sochic\application\controllers\sell.php 83
ERROR - 2017-02-01 15:08:08 --> Severity: error --> Exception: syntax error, unexpected '}', expecting variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\sochic\application\controllers\sell.php 83
ERROR - 2017-02-01 15:08:12 --> Severity: error --> Exception: syntax error, unexpected '}', expecting variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\sochic\application\controllers\sell.php 83
ERROR - 2017-02-01 15:14:55 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 663
ERROR - 2017-02-01 15:14:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 15:14:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\core\MY_Model.php 114
ERROR - 2017-02-01 15:14:55 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\sochic\application\controllers\web_setting.php 739
ERROR - 2017-02-01 15:21:04 --> Query error: Unknown column 'service_info.service_names' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price` >0
AND `status` = 'available'
AND `service_info`.`service_names` LIKE 's%'
ERROR - 2017-02-01 15:21:06 --> Query error: Unknown column 'service_info.service_names' in 'where clause' - Invalid query: SELECT *
FROM `service_info`
JOIN `service_type` ON `service_type`.`service_type_id` = `service_info`.`service_type_id`
JOIN `service_class` ON `service_class`.`service_class_id` = `service_info`.`service_class_id`
JOIN `Availability_status` ON `Availability_status`.`service_info_id` = `service_info`.`service_info_id`
JOIN `pricing` ON `pricing`.`service_info_id` = `service_info`.`service_info_id`
WHERE `service_info`.`on_delete` IS NULL
AND `price` >0
AND `status` = 'available'
AND `service_info`.`service_names` LIKE 's%'
ERROR - 2017-02-01 15:26:30 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) C:\xampp\htdocs\sochic\application\models\service_info.php 101
ERROR - 2017-02-01 15:26:30 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) C:\xampp\htdocs\sochic\application\models\service_info.php 101
ERROR - 2017-02-01 15:26:33 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) C:\xampp\htdocs\sochic\application\models\service_info.php 101
ERROR - 2017-02-01 15:45:00 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\system\database\DB_query_builder.php 669
ERROR - 2017-02-01 15:45:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT *
FROM `package`
JOIN `Service_package` ON `Service_package`.`p_id` = `package`.`p_id`
WHERE `package`.`package_name` =
ERROR - 2017-02-01 15:47:10 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\system\database\DB_query_builder.php 669
ERROR - 2017-02-01 15:47:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT *
FROM `package`
JOIN `Service_package` ON `Service_package`.`p_id` = `package`.`p_id`
WHERE `package`.`package_name` =
ERROR - 2017-02-01 15:47:23 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:48:46 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:48:50 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:48:55 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:49:12 --> Severity: error --> Exception: Call to undefined method Package::get_packages() C:\xampp\htdocs\sochic\application\controllers\sell.php 96
ERROR - 2017-02-01 15:49:28 --> Severity: error --> Exception: Call to undefined method Package::get_packages() C:\xampp\htdocs\sochic\application\controllers\sell.php 96
ERROR - 2017-02-01 15:49:59 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 96
ERROR - 2017-02-01 15:51:07 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\system\database\DB_query_builder.php 669
ERROR - 2017-02-01 15:51:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT *
FROM `package`
JOIN `Service_package` ON `Service_package`.`p_id` = `package`.`p_id`
WHERE `package`.`package_name` =
ERROR - 2017-02-01 15:51:35 --> Severity: error --> Exception: Call to undefined method Package::get_packages() C:\xampp\htdocs\sochic\application\controllers\sell.php 96
ERROR - 2017-02-01 15:56:11 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:56:22 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:59:26 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 15:59:26 --> Query error: Unknown column 'package.package_namse' in 'where clause' - Invalid query: SELECT *
FROM `package`
WHERE `package`.`package_namse` LIKE '%'
ERROR - 2017-02-01 16:01:00 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:01:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sIS NULL
AND `package_namse` LIKE '%'' at line 3 - Invalid query: SELECT *
FROM `package`
WHERE package.on_delete sIS NULL
AND `package_namse` LIKE '%'
ERROR - 2017-02-01 16:03:12 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:03:12 --> Query error: Unknown column 'package_namse' in 'where clause' - Invalid query: SELECT *
FROM `package`
WHERE `package`.`on_delete` IS NULL
AND `package_namse` LIKE '%'
ERROR - 2017-02-01 16:03:34 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:04:27 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:04:39 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:04:52 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:07:54 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\models\package.php 58
ERROR - 2017-02-01 16:07:58 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\models\package.php 58
ERROR - 2017-02-01 16:08:03 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\models\package.php 58
ERROR - 2017-02-01 16:08:06 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\models\package.php 58
ERROR - 2017-02-01 16:08:07 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\models\package.php 58
ERROR - 2017-02-01 16:08:09 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\sochic\application\models\package.php 58
ERROR - 2017-02-01 16:08:32 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:08:34 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:08:36 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 50
ERROR - 2017-02-01 16:11:32 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:13:39 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:13:45 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:13:52 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:15:06 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:16:52 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:18:32 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:27:04 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 49
ERROR - 2017-02-01 16:32:18 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\sochic\application\controllers\sell.php 75
ERROR - 2017-02-01 16:43:52 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 51
ERROR - 2017-02-01 16:43:56 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 51
ERROR - 2017-02-01 16:44:07 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 51
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 99
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 101
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 104
ERROR - 2017-02-01 16:45:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\sochic\application\controllers\sell.php 105
ERROR - 2017-02-01 16:46:35 --> Severity: 4096 --> Object of class Package could not be converted to string C:\xampp\htdocs\sochic\application\models\package.php 53
ERROR - 2017-02-01 16:46:35 --> Query error: Unknown column 'package.1package_name' in 'where clause' - Invalid query: SELECT *
FROM `package`
WHERE `package`.`1package_name` LIKE '%'
ERROR - 2017-02-01 17:03:52 --> Severity: Warning --> mysqli::real_escape_string() expects parameter 1 to be string, object given C:\xampp\htdocs\sochic\system\database\drivers\mysqli\mysqli_driver.php 391
ERROR - 2017-02-01 17:15:29 --> Query error: Unknown column 'package.1package_name' in 'where clause' - Invalid query: SELECT *
FROM `package`
WHERE `package`.`1package_name` LIKE 's%'
ERROR - 2017-02-01 17:15:31 --> Query error: Unknown column 'package.1package_name' in 'where clause' - Invalid query: SELECT *
FROM `package`
WHERE `package`.`1package_name` LIKE 's%'
ERROR - 2017-02-01 17:17:48 --> Severity: error --> Exception: syntax error, unexpected 'foreach' (T_FOREACH) C:\xampp\htdocs\sochic\application\controllers\sell.php 98
