<?php
require_once('../../connect/database.php');
$sth = $db->query("DELETE FROM product WHERE productID=".$_GET['productID']);
header('Location: list.php');
 ?>
