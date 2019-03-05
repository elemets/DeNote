<?php
require_once("../Header - Footer/header.php");
?>
<title>Note Preview Page</title>
<style>
body {
	padding-top: 50px;
}
</style>
<body>
  <div id="top" class="container-fluid">
  <div class="row">
    		<div class="col-sm-12">
  	      <h4>Title</h4>
          <h5> Author</h5>
          <h5> Time</h5>
        </div>
  </div>
<?php
$id = "view.php?id=" . $_GET['id'];
?>
</div>
<div class="embed-responsive embed-responsive-4by3"
<div  style="position:relative; top: 50px; ">
<p align="center">
  <iframe src="<?php echo $id ?>"  >

</iframe></p>
</div>
</div>
  <div id="top" class="container-fluid">
      <div class="row justify-content-md-center">
       <div class="col-sm-9" style="margin:0% 12.5%;"
<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box" style="width:80%;margin-left:10%"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1550317288312");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
       </div>
</div>
</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
