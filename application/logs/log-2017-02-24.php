<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-24 14:09:10 --> Query error: Unknown column 'sales_report.d1ate' in 'where clause' - Invalid query: SELECT *, (stock_out_history.price + stock_out_history.vat + stock_out_history.mark_up) AS prod_price, (rendered_history.price + rendered_history.vat) AS service_price, `service_info`.`service_name` AS `service_name1`, `package`.`package_name` AS `package_name1`
FROM `sales_report`
LEFT JOIN `rendered_history` ON `sales_report`.`r_id` = `rendered_history`.`r_id`
LEFT JOIN `stock_out_history` ON `sales_report`.`stock_out_hist_id` = `stock_out_history`.`stock_out_hist_id`
LEFT JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
LEFT JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `rendered_history`.`r_id` = `artist_commision`.`r_id`
WHERE `sales_report`.`d1ate` >= '2017-02-24'
AND `sales_report`.`date` <= '2017-02-24'
ERROR - 2017-02-24 14:15:38 --> Query error: Unknown column 'sales_report.d1ate' in 'where clause' - Invalid query: SELECT *, (stock_out_history.price + stock_out_history.vat + stock_out_history.mark_up) AS prod_price, (rendered_history.price + rendered_history.vat) AS service_price, `service_info`.`service_name` AS `service_name1`, `package`.`package_name` AS `package_name1`
FROM `sales_report`
LEFT JOIN `rendered_history` ON `sales_report`.`r_id` = `rendered_history`.`r_id`
LEFT JOIN `stock_out_history` ON `sales_report`.`stock_out_hist_id` = `stock_out_history`.`stock_out_hist_id`
LEFT JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
LEFT JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `rendered_history`.`r_id` = `artist_commision`.`r_id`
WHERE `sales_report`.`d1ate` >= '2017-02-24'
AND `sales_report`.`date` <= '2017-02-24'
ERROR - 2017-02-24 14:15:44 --> Query error: Unknown column 'sales_report.d1ate' in 'where clause' - Invalid query: SELECT *, (stock_out_history.price + stock_out_history.vat + stock_out_history.mark_up) AS prod_price, (rendered_history.price + rendered_history.vat) AS service_price, `service_info`.`service_name` AS `service_name1`, `package`.`package_name` AS `package_name1`
FROM `sales_report`
LEFT JOIN `rendered_history` ON `sales_report`.`r_id` = `rendered_history`.`r_id`
LEFT JOIN `stock_out_history` ON `sales_report`.`stock_out_hist_id` = `stock_out_history`.`stock_out_hist_id`
LEFT JOIN `barcode` ON `stock_out_history`.`bc_id` = `barcode`.`bc_id`
LEFT JOIN `product_main_info` ON `barcode`.`prod_id` = `product_main_info`.`prod_id`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `rendered_history`.`r_id` = `artist_commision`.`r_id`
WHERE `sales_report`.`d1ate` >= '2017-02-23'
AND `sales_report`.`date` <= '2017-02-23'
ERROR - 2017-02-24 16:41:45 --> Severity: Notice --> Undefined variable: code C:\xampp\htdocs\sochic\application\controllers\sell.php 1098
ERROR - 2017-02-24 16:50:16 --> Severity: Notice --> Undefined variable: code C:\xampp\htdocs\sochic\application\controllers\sell.php 1098
ERROR - 2017-02-24 16:50:20 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:20 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:21 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:33 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:39 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:40 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:49 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:53 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:54 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:55 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:55 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:55 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:57 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:50:59 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:00 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:07 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:10 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:14 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:20 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:20 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:24 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:25 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:27 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:29 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:39 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:44 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:47 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:55 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:56 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:57 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:58 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:51:59 --> Severity: Error --> Class CI_Session_database_driver contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (SessionHandlerInterface::open, SessionHandlerInterface::read) C:\xampp\htdocs\sochic\system\libraries\Session\drivers\Session_database_driver.php 49
ERROR - 2017-02-24 16:53:45 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2170
ERROR - 2017-02-24 16:53:54 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2170
ERROR - 2017-02-24 16:54:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2170
ERROR - 2017-02-24 16:54:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2170
ERROR - 2017-02-24 17:00:00 --> Severity: Notice --> Undefined index: qty C:\xampp\htdocs\sochic\application\controllers\sell.php 2018
ERROR - 2017-02-24 17:09:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2170
ERROR - 2017-02-24 17:09:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2170
ERROR - 2017-02-24 17:39:57 --> Query error: Unknown column 'disount' in 'field list' - Invalid query: INSERT INTO `rendered_history` (`r_id`, `service_info_id`, `date_rendered`, `quantity`, `disount`, `price`, `vat`, `roominfo_id`, `amenities_id`, `food_id`, `table_info_id`, `tour_info`, `p_id`, `acc_id`) VALUES (NULL, NULL, '2017-02-24', '2', NULL, '1607.14', '192.86', NULL, NULL, NULL, NULL, NULL, '49', '32')
ERROR - 2017-02-24 17:40:00 --> Query error: Unknown column 'disount' in 'field list' - Invalid query: INSERT INTO `rendered_history` (`r_id`, `service_info_id`, `date_rendered`, `quantity`, `disount`, `price`, `vat`, `roominfo_id`, `amenities_id`, `food_id`, `table_info_id`, `tour_info`, `p_id`, `acc_id`) VALUES (NULL, NULL, '2017-02-24', '2', NULL, '1607.14', '192.86', NULL, NULL, NULL, NULL, NULL, '49', '32')
ERROR - 2017-02-24 17:40:04 --> Query error: Unknown column 'disount' in 'field list' - Invalid query: INSERT INTO `rendered_history` (`r_id`, `service_info_id`, `date_rendered`, `quantity`, `disount`, `price`, `vat`, `roominfo_id`, `amenities_id`, `food_id`, `table_info_id`, `tour_info`, `p_id`, `acc_id`) VALUES (NULL, NULL, '2017-02-24', '2', NULL, '1607.14', '192.86', NULL, NULL, NULL, NULL, NULL, '49', '32')
ERROR - 2017-02-24 17:46:52 --> Severity: Notice --> Undefined property: stdClass::$quantity C:\xampp\htdocs\sochic\application\controllers\reports.php 133
ERROR - 2017-02-24 17:46:52 --> Severity: Notice --> Undefined property: stdClass::$quantity C:\xampp\htdocs\sochic\application\controllers\reports.php 133
ERROR - 2017-02-24 17:52:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '// COUNT(service_info.service_name) AS service_qty, // COUNT(package.package_nam' at line 1 - Invalid query: SELECT *, `service_info`.`service_name` AS `s_name`, `package`.`package_name` AS `p_name`, // COUNT(service_info.service_name) AS service_qty, // COUNT(package.package_name) AS package_qty, (rendered_history.price + rendered_history.vat) AS service_price, SUM(artist_commision.commission) AS commission
FROM `rendered_history`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `artist_commision`.`r_id` = `rendered_history`.`r_id`
WHERE `rendered_history`.`date_rendered` >= '2017-02-24'
AND `rendered_history`.`date_rendered` <= '2017-02-24'
GROUP BY `service_info`.`service_name`, `package`.`package_name`, `service_info`.`service_name`
