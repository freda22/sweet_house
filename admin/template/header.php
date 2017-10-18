<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="..\css\admin.css" rel="stylesheet" type="text/css">
<link href="../../new_tiny/tinymce/js/tinymce/skins/lightgray/skin.min.css" rel="stylesheet" type="text/css">
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../jquery-1.12.4.js"></script>
<script type="text/javascript" src="../../jquery-ui/jquery/jquery-ui.js"></script>
<script type="text/javascript" src="../../new_tiny/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  //js程式區塊
  $(function(){
$( "#pd" ).datepicker({
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
