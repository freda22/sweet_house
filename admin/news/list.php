<?php
require_once('../../connect/database.php');
$limit = 2;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sth = $db->query("SELECT * FROM news ORDER BY publishedDate DESC LIMIT ".$start_from.",".$limit);
$news = $sth->fetchAll(PDO::FETCH_ASSOC);
$totalRows = count($news);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once('../template/header.php'); ?>
</head>
<body>
  <?php include_once('../template/nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Heading</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb my-3" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item">
              <a href="#">主控台</a>
            </li>
            <li class="breadcrumb-item active">Link</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary" href="">新增一筆</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table my-3">
            <thead>
              <tr>
                <th>發佈日期</th>
                <th>新聞標題</th>
                <th>編輯</th>
                <th>刪除
                  <br>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($news as $rows) {?>
              <tr>
                <td><?php echo $rows['publishedDate']; ?></td>
                <td><?php echo $rows['title']; ?></td>
                <td><a href="edit.php?newsID=<?php echo $rows['newsID']; ?>">編輯</a></td>
                <td><a href="delete.php?newsID=<?php echo $rows['newsID']; ?>" onclick="if(!confirm('是否刪除此筆資料？')){return false;};">刪除</a></td>
              </tr><?php } ?>
            </tbody>
          </table>
        </div>
      </div>
        <?php  if($totalRows > 0){
        $sth = $db->query("SELECT * FROM news ORDER BY PublishedDate DESC ");
        $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
        $total_pages = ceil($data_count / $limit);
       ?>
      <div class="row">
        <div class="col-md-12">
          <ul class="pagination">
            <?php   if($page > 1){ ?>
              <li>
                <a href="list.php?page=<?php echo $page-1;?>">上一頁</a>
              </li>
              <?php }else{ ?>
                <li>
                  <a href="#">上一頁</a>
                </li>
                <?php } ?>
            <?php for ($i=1; $i<=$total_pages; $i++) { ?>

            <li>
              <a href="list.php?page=<?php echo $i;?>"><?php echo $i;?></a>
            </li>
            <?php } ?>
            <?php if($page < $total_pages){ ?>
            <li>
              <a href="list.php?page=<?php echo $page+1;?>">下一頁</a>
            </li>
            <?php }else{ ?>
              <li>
                <a href="#">下一頁</a>
              </li>
              <?php } ?>
            </ul>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
