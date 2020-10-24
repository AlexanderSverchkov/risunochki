<?php
define("DB_HOST","p66935.mysql.ihc.ru");
define("DB_LOGIN","p66935_ris");
define("DB_PASS","7G5VhZK2kw");
define("DB_NAME","p66935_ris");
$site_url="http://risunochki.ru/";
mysql_connect(DB_HOST,DB_LOGIN,DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME);
mysql_query("SET NAMES utf8") or die("Не удалось установить кодировку");

?>