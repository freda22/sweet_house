<?php
require_once('../../connect/database.php');
$sth = $db->query("SELECT * FROM product categoryID=".$_GET['categoryID']." ORDER BY remain DESC");
/*$sql= "SELECT * FROM product WHERE categoryID=:categoryID ORDER BY remain DESC";
$sth = $db ->prepare($sql);
$sth ->bindParam(":categoryID", $_GET['categoryID'], PDO::PARAM_INT);
$sth ->execute();*/
$product = $sth->fetchAll(PDO::FETCH_ASSOC);
$TotalRaws = count($product);
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="..\css\admin.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" contenteditable="true">Sweet House</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#">頁面管理</a>
              </li>
              <li class="active">
                <a href="#">最新消息管理</a>
              </li>
              <li>
                <a href="#">產品管理</a>
              </li>
              <li>
                <a href="#">訂單管理</a>
              </li>
              <li>
                <a href="#">會員管理</a>
              </li>
              <li>
                <a href="#">登出</a>
              </li>
            </ul>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="text-left">產品管理</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="#">主控台</a>
              </li>
              <li>
                <a href="#" class="active">產品管理</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary" href="add.php?categoryID=<?php echo $_GET['categoryID']; ?>">新增一筆</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>產品圖片</th>
                  <th>產品名稱</th>
                  <th>價格</th>
                  <th>有效日期</th>
                  <th>內容</th>
                  <th>編輯</th>
                  <th>刪除</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($TotalRaws > 0){ ?>
                <?php foreach ($product as $rows) {?>
                <tr>
                  <td><img src="../../uploads/products/<?php echo $rows['picture']; ?>" alt="" width="200"></td>
                  <td><?php echo $rows['name']; ?></td>
                  <td><?php echo $rows['price']; ?></td>
                  <td><?php echo $rows['remain']; ?></td>
                  <td><?php echo $rows['description']; ?></td>
                  <td><a href="edit.php?categoryID=<?php echo $rows['categoryID']; ?>&productID=<?php echo $rows['productID']; ?>">編輯</a></td>
                  <td><a href="delete.php?categoryID=<?php echo $rows['categoryID']; ?>&productID=<?php echo $rows['productID']; ?>" onclick="if(!confirm('是否刪除此筆資料？')){return false;};">刪除</a></td>
                </tr><?php } ?>
              <?php }else {?>
                <tr>
                  <td colspan="7">目前無資料，請新增一筆</td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="pagination">
              <li>
                <a href="#">上一頁</a>
              </li>
              <li>
                <a href="#">1</a>
              </li>
              <li>
                <a href="#">2</a>
              </li>
              <li>
                <a href="#">3</a>
              </li>
              <li>
                <a href="#">4</a>
              </li>
              <li>
                <a href="#">5</a>
              </li>
              <li>
                <a href="#">下一頁</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>聖保羅廚房</h1>
            <p contenteditable="true">版權所有 © 2016 &nbsp; St Paul Kitchen All Right Reserved.</p>
          </div>
        </div>
      </div>
    </footer>


</body></html>
