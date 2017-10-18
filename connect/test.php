<?php
require_once('database.php');
$sql = "SELECT * FROM news";
  $result = $db->query($sql);
  $all_news=$result->fetchAll(PDO::FETCH_ASSOC);

print_r($all_news);
 ?>
