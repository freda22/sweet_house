<?php
require_once('../../connect/database.php');
$sth = $db->query("DELETE FROM product_category WHERE categoryID=".$_GET['categoryID']);
header('Location: list.php');
 ?>
