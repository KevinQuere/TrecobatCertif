<?php
//$username = "u1yfibkm9py2jsmu";
//$password = "u1yfibkm9py2jsmu";
$conn = new PDO(
    "mysql:host=" . getenv("MYSQL_ADDON_HOST") . ";dbname=" . getenv("MYSQL_ADDON_DB"),
    getenv("MYSQL_ADDON_USER"),
    getenv("MYSQL_ADDON_PASSWORD")
);
//$conn = new PDO("mysql:host=bh0z42juiyw0f6cxnetu-mysql.services.clever-cloud.com:3306;dbname=bh0z42juiyw0f6cxnetu;charset=utf8", $username, $password);
?>
