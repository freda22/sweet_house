<?php
require_once('../../connect/database.php');
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){
  $sql= "UPDATE page SET
          content= :content,
          createdDate= :createdDate WHERE pageID=:pageID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
  $sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
  $sth ->bindParam(":pageID", $_POST['pageID'], PDO::PARAM_INT);
  $sth -> execute();

  header('Location: list.php?pageID='.$_POST['pageID']);
}
$sth = $db->query("SELECT * FROM page WHERE pageID=".$_GET['pageID']);
$page = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page['title'];?></title>
    <?php include_once('../template/header.php'); ?>
  </head><body>
    <?php include_once('../template/nav.php'); ?>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="text-left"><?php echo $page['title'];?>管理</h1>
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
                <a href="#"><?php echo $page['title'];?>管理</a>
              </li>
              <li class="active">編輯</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" role="form" method="post" action="edit.php">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="content" class="control-label">內容</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="content" name="content"><?php echo $page['content'];?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="pageID" value="<?php echo $page['pageID'];?>">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="createddate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                  <a href="list.php" class="btn btn-primary">取消</a>
                  <button type="submit" class="btn btn-primary">送出</button>
                </div>
              </div>
            </form>
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
