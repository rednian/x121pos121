<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-03-02 09:47:37 --> Query error: Unknown column 'stock_out_history.date_out1' in 'order clause' - Invalid query: SELECT *
FROM `stock_out_history`
JOIN `barcode` ON `barcode`.`bc_id` = `stock_out_history`.`bc_id`
JOIN `product_main_info` ON `product_main_info`.`prod_id` = `barcode`.`prod_id`
ORDER BY `stock_out_history`.`date_out1` DESC
ERROR - 2017-03-02 09:59:51 --> Query error: Unknown column 'rendered_history.rid' in 'order clause' - Invalid query: SELECT *, `service_info`.`service_name` AS `s_name`, `package`.`package_name` AS `p_name`, (rendered_history.price + rendered_history.vat) AS service_price
FROM `rendered_history`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `artist_commision`.`r_id` = `rendered_history`.`r_id`
ORDER BY `rendered_history`.`rid` DESC
ERROR - 2017-03-02 10:05:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:05:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:06 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:06 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:06 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:07 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:09:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:10:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:10:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:10:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:10:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:11:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2172
ERROR - 2017-03-02 10:13:07 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2177
ERROR - 2017-03-02 10:14:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2177
ERROR - 2017-03-02 10:15:47 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\sochic\application\controllers\sell.php 2175
ERROR - 2017-03-02 10:16:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2177
ERROR - 2017-03-02 10:19:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2174
ERROR - 2017-03-02 10:19:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2174
ERROR - 2017-03-02 10:19:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2174
ERROR - 2017-03-02 10:19:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2174
ERROR - 2017-03-02 10:19:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2174
ERROR - 2017-03-02 10:19:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sochic\application\controllers\sell.php 2174
