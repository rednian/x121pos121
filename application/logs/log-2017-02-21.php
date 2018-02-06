<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-02-21 16:36:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(COUNT(service_info.service_name) +  COUNT(package.package_name)) AS qty
FROM `r' at line 2 - Invalid query: SELECT *, (rendered_history.price + rendered_history.vat) AS amount, service_info.service_name AS name
        (COUNT(service_info.service_name) +  COUNT(package.package_name)) AS qty
FROM `rendered_history`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `artist_commision`.`r_id` = `rendered_history`.`r_id`
GROUP BY `service_info`.`service_name`, `package`.`package_name`
ERROR - 2017-02-21 16:39:18 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$commission C:\xampp\htdocs\sochic\application\controllers\reports.php 51
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:39:19 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$date_rendered C:\xampp\htdocs\sochic\application\controllers\reports.php 61
ERROR - 2017-02-21 16:40:03 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:40:34 --> Severity: Notice --> Undefined property: stdClass::$package_name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:41:19 --> Severity: Notice --> Undefined property: stdClass::$name C:\xampp\htdocs\sochic\application\controllers\reports.php 62
ERROR - 2017-02-21 16:55:39 --> Severity: error --> Exception: syntax error, unexpected ',' C:\xampp\htdocs\sochic\application\controllers\reports.php 72
ERROR - 2017-02-21 19:11:55 --> Query error: Unknown column 'artist_commiwsion.r_id' in 'on clause' - Invalid query: SELECT (rendered_history.price + rendered_history.vat) AS amount, `service_info`.`service_name` AS `name`, `artist_commision`.`commission`, `rendered_history`.`date_rendered`, `package_name`, (COUNT(service_info.service_name) +  COUNT(package.package_name)) AS qty
FROM `rendered_history`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `artist_commiwsion`.`r_id` = `rendered_history`.`r_id`
WHERE `rendered_history`.`date_rendered` >= '2017-02-21'
AND `rendered_history`.`date_rendered` <= '2017-02-21'
GROUP BY `service_info`.`service_name`, `package`.`package_name`
ERROR - 2017-02-21 19:12:00 --> Query error: Unknown column 'artist_commiwsion.r_id' in 'on clause' - Invalid query: SELECT (rendered_history.price + rendered_history.vat) AS amount, `service_info`.`service_name` AS `name`, `artist_commision`.`commission`, `rendered_history`.`date_rendered`, `package_name`, (COUNT(service_info.service_name) +  COUNT(package.package_name)) AS qty
FROM `rendered_history`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `artist_commiwsion`.`r_id` = `rendered_history`.`r_id`
WHERE `rendered_history`.`date_rendered` >= '2017-02-21'
AND `rendered_history`.`date_rendered` <= '2017-02-21'
GROUP BY `service_info`.`service_name`, `package`.`package_name`
ERROR - 2017-02-21 19:13:40 --> Query error: Unknown column 'artist_commiwsion.r_id' in 'on clause' - Invalid query: SELECT (rendered_history.price + rendered_history.vat) AS amount, `service_info`.`service_name` AS `name`, `artist_commision`.`commission`, `rendered_history`.`date_rendered`, `package_name`, (COUNT(service_info.service_name) +  COUNT(package.package_name)) AS qty
FROM `rendered_history`
LEFT JOIN `service_info` ON `rendered_history`.`service_info_id` = `service_info`.`service_info_id`
LEFT JOIN `package` ON `rendered_history`.`p_id` = `package`.`p_id`
LEFT JOIN `artist_commision` ON `artist_commiwsion`.`r_id` = `rendered_history`.`r_id`
WHERE `rendered_history`.`date_rendered` >= '2017-02-21'
AND `rendered_history`.`date_rendered` <= '2017-02-21'
GROUP BY `service_info`.`service_name`, `package`.`package_name`
