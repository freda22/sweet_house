<?php
require_once("../../connect/database.php");
if(isset($_POST['MM_insert']) && $_POST['MM_insert'] == 'INSERT'){
  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
      if (!file_exists('../../uploads/products')) mkdir('../../uploads/products', 0755, true);
      $filename = $_FILES['picture']['name'];
      move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/products/".$filename);   // 搬移上傳檔案
    }

  $sql= "INSERT INTO product
          (name,
          picture,
          price,
          remain,
          description) VALUES (
          :name,
          :picture,
          :price,
          :remain,
          :description)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_INT);
  $sth ->bindParam(":remain", $_POST['remain'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth -> execute();

  header('Location: list.php');
}
 ?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../validator.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../js/jquery/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../../new_tiny/tinymce/js/tinymce/skins/lightgray/skin.min.css" rel="stylesheet" type="text/css">
    <link href="../css/admin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../../js/jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="../../new_tiny/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      //js程式區塊
      $(function(){
    $( "#remain" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });
  tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});
  </script>
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
          <a class="navbar-brand" href="#">Sweet House</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
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
                <a href="#">產品管理</a>
              </li>
              <li class="active">新增一筆</li>
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
            <form class="form-horizontal" role="form" method="post" action="add.php" enctype="multipart/form-data">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="picture" class="control-label">產品圖片</label>
                </div>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="picture" name="picture">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">產品名稱</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="price" class="control-label">價格</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="remain" class="control-label">保存期限</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="remain" name="remain">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="description" class="control-label">商品說明</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="description" name="description"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_insert" value="INSERT">
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
  </body>
</html>
