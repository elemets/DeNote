<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<?php
require_once("../Header - Footer/header.php");
?>
</head>
<body>
    <?php
$id = "view.php?id=" . $_GET['id'];
?>

<div class = "embed-responsive embed-responsive-16by9">
<p align="center">
  <iframe src="<?php echo $id ?>"  width="960" height="900">

</iframe></p>
</div>
<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box" style="width:80%;margin-left:10%"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1550317288312");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->

</body>
<footer>
<?php
require_once("../Header - Footer/footer.html");
?>
</footer>
</html>
