#HCB_<?php
require_once("../Header - Footer/header.php");
session_start();
if($_SESSION["username"] == null)
{
	header('Location: ../index.html');
}
?>
<title>Page Title</title>
<style>
body {
	padding-top: 50px;
}
body > p {
	text-align: center;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
	text-align: center;
}
.col-sm-3 {
	padding-bottom: 30px;
}
.container-fluid {
margin: 0px;
padding: 0px 0px;
}
#HCB_comment_box .clearfix{*zoom:1}
#HCB_comment_box .clearfix:before,
#HCB_comment_box .clearfix:after,
#HCB_comment_box .form-actions:before,
#HCB_comment_box .form-actions:after,#HCB_comment_box .form-horizontal .control-group:before,#HCB_comment_box .form-horizontal .control-group:after,#HCB_comment_box .btn-group:before,#HCB_comment_box .btn-group:after{content:"";display:table}#HCB_comment_box .clearfix:after,#HCB_comment_box .form-actions:after,#HCB_comment_box .form-horizontal .control-group:after,#HCB_comment_box .btn-group:after{clear:both}
#HCB_comment_box .hide-text{background-color:transparent;border:0;color:transparent;font:0/0 a;text-shadow:none}#HCB_comment_box .input-block-level{width:100%;box-sizing:border-box;-ms-box-sizing:border-box;display:block;-webkit-box-sizing:border-box;min-height:28px;-moz-box-sizing:border-box}#HCB_comment_box form{margin:0 0 18px}#HCB_comment_box fieldset{margin:0;border:0;padding:0}
#HCB_comment_box legend{margin-bottom:27px;line-height:36px;width:100%;display:block;font-size:19.5px;border-bottom:1px solid #eee;border:0;color:#333;padding:0}#HCB_comment_box legend small{color:#999;font-size:13.5px}#HCB_comment_box label,#HCB_comment_box input,#HCB_comment_box input.btn,#HCB_comment_box select,
#HCB_comment_box textarea{line-height:18px;font-size:13px;font-weight:400}#HCB_comment_box input,#HCB_comment_box input.btn,#HCB_comment_box select,#HCB_comment_box textarea{font-family:helvetica neue,Helvetica,Arial,sans-serif}#HCB_comment_box label{margin-bottom:5px;display:block;color:#333}#HCB_comment_box input,#HCB_comment_box textarea,#HCB_comment_box select,
#HCB_comment_box .uneditable-input{padding:4px;line-height:18px;display:inline-block;border:1px solid #ccc;margin-bottom:9px;-moz-border-radius:3px;border-radius:3px;-webkit-border-radius:3px;font-size:13px;background-color:#fff;color:#555}#HCB_comment_box .uneditable-textarea,#HCB_comment_box input[type=button],#HCB_comment_box input[type=reset],
#HCB_comment_box input[type=submit]{height:auto;width:auto}#HCB_comment_box label input,#HCB_comment_box label textarea,#HCB_comment_box label select{display:block}#HCB_comment_box input[type=image],#HCB_comment_box input[type=checkbox],
#HCB_comment_box input[type=radio]{-webkit-border-radius:0;background-color:transparent;margin:3px 0;-moz-border-radius:0;cursor:pointer;border-radius:0;height:auto;padding:0;line-height:normal;border:0 9;*margin-top:0;width:auto}#HCB_comment_box input[type=image]{border:0}
#HCB_comment_box input[type=file]{-webkit-box-shadow:none;box-shadow:none;border:initial;line-height:initial;background-color:initial;-moz-box-shadow:none;background-color:#fff;padding:initial;width:auto}#HCB_comment_box select,#HCB_comment_box input[type=file]{*margin-top:4px;height:28px;line-height:28px}#HCB_comment_box input[type=file]{line-height:18px 9}
#HCB_comment_box select{width:220px;background-color:#fff}#HCB_comment_box select[multiple],#HCB_comment_box select[size],#HCB_comment_box textarea{height:auto}#HCB_comment_box input[type=image]{-webkit-box-shadow:none;box-shadow:none;-moz-box-shadow:none}#HCB_comment_box input[type=hidden],#HCB_comment_box .form-search .hide,#HCB_comment_box .form-inline .hide,
#HCB_comment_box .form-horizontal .hide{display:none}#HCB_comment_box .radio,#HCB_comment_box .checkbox{min-height:18px;padding-left:18px}#HCB_comment_box .radio input[type=radio],#HCB_comment_box .checkbox input[type=checkbox]{float:left;margin-left:-18px}#HCB_comment_box .controls>.radio:first-child,#HCB_comment_box .controls>.checkbox:first-child{padding-top:5px}#HCB_comment_box .radio.inline,#HCB_comment_box .checkbox.inline{display:inline-block;margin-bottom:0;padding-top:5px;vertical-align:middle}#HCB_comment_box .radio.inline+.radio.inline,#HCB_comment_box .checkbox.inline+.checkbox.inline{margin-left:10px}#HCB_comment_box input,#HCB_comment_box textarea{-moz-box-shadow:inset 0 1px 1px rgba(0,0,0,.07);-moz-transition:border linear .2s,box-shadow linear .2s;-webkit-transition:border linear .2s,box-shadow linear .2s;box-shadow:inset 0 1px 1px rgba(0,0,0,.07);transition:border linear .2s,box-shadow linear .2s;-ms-transition:border linear .2s,box-shadow linear .2s;-o-transition:border linear .2s,box-shadow linear .2s;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.07)}#HCB_comment_box input:focus,#HCB_comment_box textarea:focus{-moz-box-shadow:inset 0 1px 1px rgba(0,0,0,.07),0 0 8px rgba(82,168,236,.6);-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.07),0 0 8px rgba(82,168,236,.6);border-color:rgba(82,168,236,.8);box-shadow:inset 0 1px 1px rgba(0,0,0,.07),0 0 8px rgba(82,168,236,.6);outline:thin dotted 9;outline:0}#HCB_comment_box input[type=file]:focus,#HCB_comment_box input[type=radio]:focus,#HCB_comment_box input[type=checkbox]:focus,#HCB_comment_box select:focus{-webkit-box-shadow:none;box-shadow:none;outline:thin dotted #333;-moz-box-shadow:none;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}#HCB_comment_box .input-mini{width:60px}#HCB_comment_box .input-small{width:90px}#HCB_comment_box .input-medium{width:150px}#HCB_comment_box .input-large,#HCB_comment_box input.span3,#HCB_comment_box textarea.span3,#HCB_comment_box .uneditable-input.span3{width:210px}#HCB_comment_box .input-xlarge{width:270px}#HCB_comment_box .input-xxlarge,#HCB_comment_box input.span7,#HCB_comment_box textarea.span7,#HCB_comment_box .uneditable-input.span7{width:530px}#HCB_comment_box input[class*=span],#HCB_comment_box select[class*=span],#HCB_comment_box textarea[class*=span],#HCB_comment_box .uneditable-input[class*=span],#HCB_comment_box .row-fluid input[class*=span],#HCB_comment_box .row-fluid select[class*=span],#HCB_comment_box .row-fluid textarea[class*=span],#HCB_comment_box .row-fluid .uneditable-input[class*=span]{margin-left:0;float:none}#HCB_comment_box input,#HCB_comment_box textarea,#HCB_comment_box .uneditable-input{margin-left:0}#HCB_comment_box input.span12,#HCB_comment_box textarea.span12,#HCB_comment_box .uneditable-input.span12{width:930px}#HCB_comment_box input.span11,#HCB_comment_box textarea.span11,#HCB_comment_box .uneditable-input.span11{width:850px}#HCB_comment_box input.span10,#HCB_comment_box textarea.span10,#HCB_comment_box .uneditable-input.span10{width:770px}#HCB_comment_box input.span9,#HCB_comment_box textarea.span9,#HCB_comment_box .uneditable-input.span9{width:690px}#HCB_comment_box input.span8,#HCB_comment_box textarea.span8,#HCB_comment_box .uneditable-input.span8{width:610px}#HCB_comment_box input.span6,#HCB_comment_box textarea.span6,#HCB_comment_box .uneditable-input.span6{width:450px}#HCB_comment_box input.span5,#HCB_comment_box textarea.span5,#HCB_comment_box .uneditable-input.span5{width:370px}#HCB_comment_box input.span4,#HCB_comment_box textarea.span4,#HCB_comment_box .uneditable-input.span4{width:290px}#HCB_comment_box input.span2,#HCB_comment_box textarea.span2,#HCB_comment_box .uneditable-input.span2{width:130px}#HCB_comment_box input.span1,#HCB_comment_box textarea.span1,#HCB_comment_box .uneditable-input.span1{width:50px}#HCB_comment_box input[disabled],#HCB_comment_box select[disabled],#HCB_comment_box textarea[disabled],#HCB_comment_box input[readonly],#HCB_comment_box select[readonly],#HCB_comment_box textarea[readonly]{background-color:#eee;cursor:false;border-color:#ddd}#HCB_comment_box input[type=radio][disabled],#HCB_comment_box input[type=checkbox][disabled],#HCB_comment_box input[type=radio][readonly],#HCB_comment_box input[type=checkbox][readonly]{background-color:transparent}#HCB_comment_box .control-group.warning>label,#HCB_comment_box .control-group.warning .help-block,#HCB_comment_box .control-group.warning .help-inline{color:#c09853}#HCB_comment_box .control-group.warning input,#HCB_comment_box .control-group.warning select,#HCB_comment_box .control-group.warning textarea{color:#c09853;border-color:#c09853}#HCB_comment_box .control-group.warning input:focus,#HCB_comment_box .control-group.warning select:focus,#HCB_comment_box .control-group.warning textarea:focus{box-shadow:0 0 6px #dbc59e;border-color:#a47e3c;-webkit-box-shadow:0 0 6px #dbc59e;-moz-box-shadow:0 0 6px #dbc59e}#HCB_comment_box .control-group.warning .input-prepend .add-on,#HCB_comment_box .control-group.warning .input-append .add-on{background-color:#fcf8e3;color:#c09853;border-color:#c09853}#HCB_comment_box .control-group.error>label,#HCB_comment_box .control-group.error .help-block,#HCB_comment_box .control-group.error .help-inline{color:#b94a48}#HCB_comment_box .control-group.error input,#HCB_comment_box .control-group.error select,#HCB_comment_box .control-group.error textarea{border-color:#b94a48;color:#b94a48}#HCB_comment_box .control-group.error input:focus,#HCB_comment_box .control-group.error select:focus,#HCB_comment_box .control-group.error textarea:focus{border-color:#953b39;box-shadow:0 0 6px #d59392;-moz-box-shadow:0 0 6px #d59392;-webkit-box-shadow:0 0 6px #d59392}#HCB_comment_box .control-group.error .input-prepend .add-on,#HCB_comment_box .control-group.error .input-append .add-on{border-color:#b94a48;color:#b94a48;background-color:#f2dede}#HCB_comment_box .control-group.success>label,#HCB_comment_box .control-group.success .help-block,#HCB_comment_box .control-group.success .help-inline{color:#468847}#HCB_comment_box .control-group.success input,#HCB_comment_box .control-group.success select,#HCB_comment_box .control-group.success textarea{color:#468847;border-color:#468847}#HCB_comment_box .control-group.success input:focus,#HCB_comment_box .control-group.success select:focus,#HCB_comment_box .control-group.success textarea:focus{border-color:#356635;box-shadow:0 0 6px #7aba7b;-webkit-box-shadow:0 0 6px #7aba7b;-moz-box-shadow:0 0 6px #7aba7b}#HCB_comment_box .control-group.success .input-prepend .add-on,#HCB_comment_box .control-group.success .input-append .add-on{color:#468847;background-color:#dff0d8;border-color:#468847}#HCB_comment_box input:focus:required:invalid,#HCB_comment_box textarea:focus:required:invalid,#HCB_comment_box select:focus:required:invalid{border-color:#ee5f5b;color:#b94a48}#HCB_comment_box input:focus:required:invalid:focus,#HCB_comment_box textarea:focus:required:invalid:focus,#HCB_comment_box select:focus:required:invalid:focus{border-color:#e9322d;box-shadow:0 0 6px #f8b9b7;-moz-box-shadow:0 0 6px #f8b9b7;-webkit-box-shadow:0 0 6px #f8b9b7}#HCB_comment_box .form-actions{border-top:1px solid #ddd;padding:17px 20px 18px;background-color:#f5f5f5;margin-bottom:18px;*zoom:1;margin-top:18px}#HCB_comment_box .uneditable-input{border-color:#eee;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.03);cursor:false;overflow:hidden;box-shadow:inset 0 1px 2px rgba(0,0,0,.03);background-color:#fff;white-space:nowrap;-moz-box-shadow:inset 0 1px 2px rgba(0,0,0,.03)}#HCB_comment_box :-moz-placeholder,#HCB_comment_box ::-webkit-input-placeholder{color:#999}#HCB_comment_box .help-block,#HCB_comment_box .help-inline{color:#555}#HCB_comment_box .help-block{margin-bottom:9px;display:block}#HCB_comment_box .help-inline{padding-left:5px}#HCB_comment_box .input-prepend,#HCB_comment_box .input-append{margin-bottom:5px}#HCB_comment_box .input-prepend input,#HCB_comment_box .input-append input,#HCB_comment_box .input-prepend select,#HCB_comment_box .input-append select,#HCB_comment_box .input-prepend .uneditable-input,#HCB_comment_box .input-append .uneditable-input{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;*margin-left:0;margin-bottom:0;border-radius:0 3px 3px 0;vertical-align:middle;position:relative}#HCB_comment_box .input-prepend input:focus,#HCB_comment_box .input-append input:focus,#HCB_comment_box .input-prepend select:focus,#HCB_comment_box .input-append select:focus,#HCB_comment_box .input-prepend .uneditable-input:focus,#HCB_comment_box .input-append .uneditable-input:focus,#HCB_comment_box .btn-group>.btn:hover,#HCB_comment_box .btn-group>.btn:focus,#HCB_comment_box .btn-group>.btn:active,#HCB_comment_box .btn-group>.btn.active{z-index:2}#HCB_comment_box .input-prepend .uneditable-input,#HCB_comment_box .input-append .uneditable-input{border-left-color:#ccc}#HCB_comment_box .input-prepend .add-on,#HCB_comment_box .input-append .add-on{background-color:#eee;text-align:center;line-height:18px;display:inline-block;border:1px solid #ccc;min-width:16px;padding:4px 5px;text-shadow:0 1px 0 #fff;font-weight:400;height:18px;vertical-align:middle;width:auto}#HCB_comment_box .input-prepend .add-on,#HCB_comment_box .input-append .add-on,#HCB_comment_box .input-prepend .btn,#HCB_comment_box .input-append .btn{-webkit-border-radius:0;-moz-border-radius:0;margin-left:-1px;border-radius:0}#HCB_comment_box .input-prepend .active,#HCB_comment_box .input-append .active{background-color:#a9dba9;border-color:#46a546}#HCB_comment_box .input-prepend .add-on,#HCB_comment_box .input-prepend .btn{margin-right:-1px}#HCB_comment_box .input-prepend .add-on:first-child,#HCB_comment_box .input-prepend .btn:first-child,#HCB_comment_box .input-append input,#HCB_comment_box .input-append select,#HCB_comment_box .input-append .uneditable-input{-webkit-border-radius:3px 0 0 3px;-moz-border-radius:3px 0 0 3px;border-radius:3px 0 0 3px}#HCB_comment_box .input-append .uneditable-input{border-left-color:#eee;border-right-color:#ccc}#HCB_comment_box .input-append .add-on:last-child,#HCB_comment_box .input-append .btn:last-child{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0}#HCB_comment_box .input-prepend.input-append input,#HCB_comment_box .input-prepend.input-append select,#HCB_comment_box .input-prepend.input-append .uneditable-input{-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}#HCB_comment_box .input-prepend.input-append .add-on:first-child,#HCB_comment_box .input-prepend.input-append .btn:first-child{margin-right:-1px;-webkit-border-radius:3px 0 0 3px;-moz-border-radius:3px 0 0 3px;border-radius:3px 0 0 3px}#HCB_comment_box .input-prepend.input-append .add-on:last-child,#HCB_comment_box .input-prepend.input-append .btn:last-child{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;margin-left:-1px;border-radius:0 3px 3px 0}#HCB_comment_box .search-query{border-radius:14px;margin-bottom:0;padding-left:4px 9;-moz-border-radius:14px;-webkit-border-radius:14px;padding-right:4px 9;padding-left:14px;padding-right:14px}#HCB_comment_box .form-search input,#HCB_comment_box .form-inline input,#HCB_comment_box .form-horizontal input,#HCB_comment_box .form-search textarea,#HCB_comment_box .form-inline textarea,#HCB_comment_box .form-horizontal textarea,#HCB_comment_box .form-search select,#HCB_comment_box .form-inline select,#HCB_comment_box .form-horizontal select,#HCB_comment_box .form-search .help-inline,#HCB_comment_box .form-inline .help-inline,#HCB_comment_box .form-horizontal .help-inline,#HCB_comment_box .form-search .uneditable-input,#HCB_comment_box .form-inline .uneditable-input,#HCB_comment_box .form-horizontal .uneditable-input,#HCB_comment_box .form-search .input-prepend,#HCB_comment_box .form-inline .input-prepend,#HCB_comment_box .form-horizontal .input-prepend,#HCB_comment_box .form-search .input-append,#HCB_comment_box .form-inline .input-append,#HCB_comment_box .form-horizontal .input-append{display:inline-block;margin-bottom:0;*zoom:1;*display:inline}#HCB_comment_box .form-search label,#HCB_comment_box .form-inline label{display:inline-block}#HCB_comment_box .form-search .input-append,#HCB_comment_box .form-inline .input-append,#HCB_comment_box .form-search .input-prepend,#HCB_comment_box .form-inline .input-prepend{margin-bottom:0}#HCB_comment_box .form-search .radio,#HCB_comment_box .form-search .checkbox,#HCB_comment_box .form-inline .radio,#HCB_comment_box .form-inline .checkbox{margin-bottom:0;vertical-align:middle;padding-left:0}#HCB_comment_box .form-search .radio input[type=radio],#HCB_comment_box .form-search .checkbox input[type=checkbox],#HCB_comment_box .form-inline .radio input[type=radio],#HCB_comment_box .form-inline .checkbox input[type=checkbox]{margin-left:0;margin-right:3px;float:left}#HCB_comment_box .control-group{margin-bottom:9px}#HCB_comment_box legend+.control-group{-webkit-margin-top-collapse:separate;margin-top:18px}#HCB_comment_box .form-horizontal .control-group{margin-bottom:18px;*zoom:1}#HCB_comment_box .form-horizontal .control-label{text-align:right;width:140px;float:left;padding-top:5px}#HCB_comment_box .form-horizontal .controls{*display:inline-block;*margin-left:0;*padding-left:20px;margin-left:160px}#HCB_comment_box .form-horizontal .controls:first-child{*padding-left:160px}#HCB_comment_box .form-horizontal .help-block{margin-bottom:0;margin-top:9px}#HCB_comment_box .form-horizontal .form-actions{padding-left:160px}#HCB_comment_box .btn{text-align:center;*margin-left:.3em;background-color:#f5f5f5;border:1px solid #ccc;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);text-shadow:0 1px 1px rgba(255,255,255,.75);background-image:linear-gradient(top,#fff,#e6e6e6);border-radius:4px;line-height:18px;border-bottom-color:#b3b3b3;padding:4px 10px;cursor:pointer;background-image:-webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e6e6e6));font-size:13px;*border:0;box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);background-image:-ms-linear-gradient(top,#fff,#e6e6e6);margin-bottom:0;background-image:-moz-linear-gradient(top,#fff,#e6e6e6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#e6e6e6',GradientType=0);*line-height:20px;*background-color:#e6e6e6;-moz-box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);-moz-border-radius:4px;background-image:-webkit-linear-gradient(top,#fff,#e6e6e6);background-image:-o-linear-gradient(top,#fff,#e6e6e6);color:#333;border-color:#e6e6e6 #e6e6e6 #bfbfbf;-webkit-border-radius:4px}#HCB_comment_box .btn:hover,#HCB_comment_box .btn:active,#HCB_comment_box .btn.active,#HCB_comment_box .btn.disabled,#HCB_comment_box .btn[disabled]{*background-color:#d9d9d9;background-color:#e6e6e6}#HCB_comment_box .btn:active,#HCB_comment_box .btn.active{background-color:#ccc 9}#HCB_comment_box .btn:first-child,#HCB_comment_box .btn-group:first-child{*margin-left:0}#HCB_comment_box .btn:hover{-o-transition:background-position .1s linear;*background-color:#d9d9d9;-webkit-transition:background-position .1s linear;background-position:0 -15px;transition:background-position .1s linear;-moz-transition:background-position .1s linear;-ms-transition:background-position .1s linear;text-decoration:none;color:#333;background-color:#e6e6e6}#HCB_comment_box .btn:focus{outline:thin dotted #333;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}#HCB_comment_box .btn.active,#HCB_comment_box .btn:active{background-color:#e6e6e6;background-color:#d9d9d9 9;outline:0}#HCB_comment_box .btn.disabled,#HCB_comment_box .btn[disabled]{-webkit-box-shadow:none;box-shadow:none;opacity:.65;filter:alpha(opacity=65);cursor:default;-moz-box-shadow:none;background-image:none;background-color:#e6e6e6}#HCB_comment_box .btn-large{padding:9px 14px;border-radius:5px;font-size:15px;-moz-border-radius:5px;line-height:normal;-webkit-border-radius:5px}#HCB_comment_box .btn-large [class^=icon-]{margin-top:1px}#HCB_comment_box .btn-small{font-size:11px;padding:5px 9px;line-height:16px}#HCB_comment_box .btn-small [class^=icon-]{margin-top:-1px}#HCB_comment_box .btn-mini{padding:2px 6px;line-height:14px;font-size:11px}#HCB_comment_box .btn-primary,#HCB_comment_box .btn-primary:hover,#HCB_comment_box .btn-warning,#HCB_comment_box .btn-warning:hover,#HCB_comment_box .btn-danger,#HCB_comment_box .btn-danger:hover,#HCB_comment_box .btn-success,#HCB_comment_box .btn-success:hover,#HCB_comment_box .btn-info,#HCB_comment_box .btn-info:hover,#HCB_comment_box .btn-inverse,#HCB_comment_box .btn-inverse:hover{text-shadow:0 -1px 0 rgba(0,0,0,.25);color:#fff}#HCB_comment_box .btn-primary.active,#HCB_comment_box .btn-warning.active,#HCB_comment_box .btn-danger.active,#HCB_comment_box .btn-success.active,#HCB_comment_box .btn-info.active,#HCB_comment_box .btn-inverse.active{color:rgba(255,255,255,.75)}#HCB_comment_box .btn{border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);border-color:#ccc}#HCB_comment_box .btn-primary{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc',endColorstr='#0055cc',GradientType=0);background-image:-webkit-gradient(linear,0 0,0 100%,from(#08c),to(#05c));background-color:#0074cc;background-image:-webkit-linear-gradient(top,#08c,#05c);background-image:linear-gradient(top,#08c,#05c);background-image:-ms-linear-gradient(top,#08c,#05c);border-color:#05c #05c #003580;background-image:-o-linear-gradient(top,#08c,#05c);*background-color:#05c;background-image:-moz-linear-gradient(top,#08c,#05c)}#HCB_comment_box .btn-primary:hover,#HCB_comment_box .btn-primary:active,#HCB_comment_box .btn-primary.active,#HCB_comment_box .btn-primary.disabled,#HCB_comment_box .btn-primary[disabled]{*background-color:#004ab3;background-color:#05c}#HCB_comment_box .btn-primary:active,#HCB_comment_box .btn-primary.active{background-color:#004099 9}#HCB_comment_box .btn-warning{background-image:-webkit-gradient(linear,0 0,0 100%,from(#fbb450),to(#f89406));background-image:-webkit-linear-gradient(top,#fbb450,#f89406);background-image:-ms-linear-gradient(top,#fbb450,#f89406);border-color:#f89406 #f89406 #ad6704;background-image:linear-gradient(top,#fbb450,#f89406);background-image:-o-linear-gradient(top,#fbb450,#f89406);background-image:-moz-linear-gradient(top,#fbb450,#f89406);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fbb450',endColorstr='#f89406',GradientType=0);background-color:#faa732;*background-color:#f89406}#HCB_comment_box .btn-warning:hover,#HCB_comment_box .btn-warning:active,#HCB_comment_box .btn-warning.active,#HCB_comment_box .btn-warning.disabled,#HCB_comment_box .btn-warning[disabled]{*background-color:#df8505;background-color:#f89406}#HCB_comment_box .btn-warning:active,#HCB_comment_box .btn-warning.active{background-color:#c67605 9}#HCB_comment_box .btn-danger{background-image:-moz-linear-gradient(top,#ee5f5b,#bd362f);background-image:-webkit-linear-gradient(top,#ee5f5b,#bd362f);background-image:-ms-linear-gradient(top,#ee5f5b,#bd362f);*background-color:#bd362f;border-color:#bd362f #bd362f #802420;background-image:-o-linear-gradient(top,#ee5f5b,#bd362f);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ee5f5b',endColorstr='#bd362f',GradientType=0);background-image:linear-gradient(top,#ee5f5b,#bd362f);background-color:#da4f49;background-image:-webkit-gradient(linear,0 0,0 100%,from(#ee5f5b),to(#bd362f))}#HCB_comment_box .btn-danger:hover,#HCB_comment_box .btn-danger:active,#HCB_comment_box .btn-danger.active,#HCB_comment_box .btn-danger.disabled,#HCB_comment_box .btn-danger[disabled]{*background-color:#a9302a;background-color:#bd362f}#HCB_comment_box .btn-danger:active,#HCB_comment_box .btn-danger.active{background-color:#942a25 9}#HCB_comment_box .btn-success{background-color:#5bb75b;background-image:-o-linear-gradient(top,#62c462,#51a351);background-image:-webkit-gradient(linear,0 0,0 100%,from(#62c462),to(#51a351));background-image:-moz-linear-gradient(top,#62c462,#51a351);background-image:-webkit-linear-gradient(top,#62c462,#51a351);background-image:-ms-linear-gradient(top,#62c462,#51a351);*background-color:#51a351;border-color:#51a351 #51a351 #387038;background-image:linear-gradient(top,#62c462,#51a351);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#62c462',endColorstr='#51a351',GradientType=0)}#HCB_comment_box .btn-success:hover,#HCB_comment_box .btn-success:active,#HCB_comment_box .btn-success.active,#HCB_comment_box .btn-success.disabled,#HCB_comment_box .btn-success[disabled]{*background-color:#499249;background-color:#51a351}#HCB_comment_box .btn-success:active,#HCB_comment_box .btn-success.active{background-color:#408140 9}#HCB_comment_box .btn-info{border-color:#2f96b4 #2f96b4 #1f6377;background-image:-webkit-gradient(linear,0 0,0 100%,from(#5bc0de),to(#2f96b4));background-image:-ms-linear-gradient(top,#5bc0de,#2f96b4);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5bc0de',endColorstr='#2f96b4',GradientType=0);background-image:linear-gradient(top,#5bc0de,#2f96b4);*background-color:#2f96b4;background-image:-moz-linear-gradient(top,#5bc0de,#2f96b4);background-image:-o-linear-gradient(top,#5bc0de,#2f96b4);background-image:-webkit-linear-gradient(top,#5bc0de,#2f96b4);background-color:#49afcd}#HCB_comment_box .btn-info:hover,#HCB_comment_box .btn-info:active,#HCB_comment_box .btn-info.active,#HCB_comment_box .btn-info.disabled,#HCB_comment_box .btn-info[disabled]{background-color:#2f96b4;*background-color:#2a85a0}#HCB_comment_box .btn-info:active,#HCB_comment_box .btn-info.active{background-color:#24748c 9}#HCB_comment_box .btn-inverse{background-image:-moz-linear-gradient(top,#555,#222);background-image:-o-linear-gradient(top,#555,#222);background-color:#414141;*background-color:#222;border-color:#222 #222 #000;background-image:linear-gradient(top,#555,#222);background-image:-webkit-gradient(linear,0 0,0 100%,from(#555),to(#222));background-image:-webkit-linear-gradient(top,#555,#222);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#555555',endColorstr='#222222',GradientType=0);background-image:-ms-linear-gradient(top,#555,#222)}#HCB_comment_box .btn-inverse:hover,#HCB_comment_box .btn-inverse:active,#HCB_comment_box .btn-inverse.active,#HCB_comment_box .btn-inverse.disabled,#HCB_comment_box .btn-inverse[disabled]{*background-color:#151515;background-color:#222}#HCB_comment_box .btn-inverse:active,#HCB_comment_box .btn-inverse.active{background-color:#080808 9}#HCB_comment_box .btn,#HCB_comment_box input[type=submit].btn{*padding-bottom:2px;*padding-top:2px}#HCB_comment_box .btn::-moz-focus-inner,#HCB_comment_box input[type=submit].btn::-moz-focus-inner{border:0;padding:0}#HCB_comment_box .btn.btn-large,#HCB_comment_box input[type=submit].btn.btn-large{*padding-top:7px;*padding-bottom:7px}#HCB_comment_box .btn.btn-small,#HCB_comment_box input[type=submit].btn.btn-small{*padding-top:3px;*padding-bottom:3px}#HCB_comment_box .btn.btn-mini,#HCB_comment_box input[type=submit].btn.btn-mini{*padding-bottom:1px;*padding-top:1px}#HCB_comment_box .btn-group{*margin-left:.3em;*zoom:1;position:relative}#HCB_comment_box .btn-group+.btn-group{margin-left:5px}#HCB_comment_box .btn-toolbar{margin-bottom:9px;margin-top:9px}#HCB_comment_box .btn-toolbar .btn-group{display:inline-block;*zoom:1;*display:inline}#HCB_comment_box .btn-group>.btn{-webkit-border-radius:0;-moz-border-radius:0;margin-left:-1px;border-radius:0;float:left;position:relative}#HCB_comment_box .btn-group>.btn:first-child{-moz-border-radius-topleft:4px;-webkit-border-top-left-radius:4px;margin-left:0;border-bottom-left-radius:4px;-moz-border-radius-bottomleft:4px;border-top-left-radius:4px;-webkit-border-bottom-left-radius:4px}#HCB_comment_box .btn-group>.btn:last-child,#HCB_comment_box .btn-group>.dropdown-toggle{-moz-border-radius-topright:4px;-webkit-border-top-right-radius:4px;-moz-border-radius-bottomright:4px;border-top-right-radius:4px;border-bottom-right-radius:4px;-webkit-border-bottom-right-radius:4px}#HCB_comment_box .btn-group>.btn.large:first-child{-webkit-border-bottom-left-radius:6px;-webkit-border-top-left-radius:6px;margin-left:0;border-top-left-radius:6px;-moz-border-radius-topleft:6px;-moz-border-radius-bottomleft:6px;border-bottom-left-radius:6px}#HCB_comment_box .btn-group>.btn.large:last-child,#HCB_comment_box .btn-group>.large.dropdown-toggle{border-bottom-right-radius:6px;-moz-border-radius-bottomright:6px;-webkit-border-bottom-right-radius:6px;-moz-border-radius-topright:6px;border-top-right-radius:6px;-webkit-border-top-right-radius:6px}#HCB_comment_box .btn-group .dropdown-toggle:active,#HCB_comment_box .btn-group.open .dropdown-toggle{outline:0}#HCB_comment_box .btn-group>.dropdown-toggle{box-shadow:inset 1px 0 0 rgba(255,255,255,.13),inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);padding-right:8px;-webkit-box-shadow:inset 1px 0 0 rgba(255,255,255,.13),inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:inset 1px 0 0 rgba(255,255,255,.13),inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);padding-left:8px;*padding-bottom:4px;*padding-top:4px}#HCB_comment_box .btn-group>.btn-mini.dropdown-toggle{padding-right:5px;padding-left:5px}#HCB_comment_box .btn-group>.btn-small.dropdown-toggle{*padding-bottom:4px;*padding-top:4px}#HCB_comment_box .btn-group>.btn-large.dropdown-toggle{padding-right:12px;padding-left:12px}#HCB_comment_box .btn-group.open .btn.dropdown-toggle{background-color:#e6e6e6}#HCB_comment_box .btn-group.open .btn-primary.dropdown-toggle{background-color:#05c}#HCB_comment_box .btn-group.open .btn-warning.dropdown-toggle{background-color:#f89406}#HCB_comment_box .btn-group.open .btn-danger.dropdown-toggle{background-color:#bd362f}#HCB_comment_box .btn-group.open .btn-success.dropdown-toggle{background-color:#51a351}#HCB_comment_box .btn-group.open .btn-info.dropdown-toggle{background-color:#2f96b4}#HCB_comment_box .btn-group.open .btn-inverse.dropdown-toggle{background-color:#222}#HCB_comment_box .btn .caret{margin-left:0;margin-top:7px}#HCB_comment_box .btn:hover .caret,#HCB_comment_box .open.btn-group .caret{opacity:1;filter:alpha(opacity=100)}#HCB_comment_box .btn-mini .caret{margin-top:5px}#HCB_comment_box .btn-small .caret{margin-top:6px}#HCB_comment_box .btn-large .caret{border-top-width:5px;margin-top:6px;border-left-width:5px;border-right-width:5px}#HCB_comment_box .dropup .btn-large .caret{border-top:0;border-bottom:5px solid #000}#HCB_comment_box .btn-primary .caret,#HCB_comment_box .btn-warning .caret,#HCB_comment_box .btn-danger .caret,#HCB_comment_box .btn-info .caret,#HCB_comment_box .btn-success .caret,#HCB_comment_box .btn-inverse .caret{filter:alpha(opacity=75);opacity:.75;border-bottom-color:#fff;border-top-color:#fff}#HCB_comment_box .btn,#HCB_comment_box .btn-primary,#HCB_comment_box .btn-warning,#HCB_comment_box .btn-danger,#HCB_comment_box .btn-success,#HCB_comment_box .btn-info,#HCB_comment_box .btn-inverse{filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);background-repeat:repeat-x}#HCB_comment_box .btn.active,#HCB_comment_box .btn:active,#HCB_comment_box .btn-group.open .dropdown-toggle{box-shadow:inset 0 2px 4px rgba(0,0,0,.15),0 1px 2px rgba(0,0,0,.05);background-image:none;-webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15),0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15),0 1px 2px rgba(0,0,0,.05)}#HCB_comment_box .help-inline,#HCB_comment_box .btn{display:inline-block;*zoom:1;*display:inline;vertical-align:middle}




</style>

<body>
<div id="top" class="container-fluid">

<!-- Title and profile icon -->
<div id="My_Profile" class="text-center">
  <h1 style="font-size:60px;padding-top: 55px;"><?php echo $_SESSION['username']; ?></h1>
  <?php
  require_once('config.inc.php');
  $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
  $conn2 = new mysqli($database_host, $database_user, $database_pass, "2018_comp10120_z3");
   ?>
  <img src="Icons/Profile_Icon.png" alt="" style="width: 250px; height: auto;">
</div>
<!-- My notes Section -->
<div id="My_notes" class="grid-container"></div>
      <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px">My notes</h3>
        <div class="jumbotron Container-fluid">
<div class="row">
	<?php
    	$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
    	$stat = $conn->prepare("SELECT * FROM Notes WHERE UserID = ?");
    	$stat->bindParam(1, $userID);
    	$stat->execute();

    	while($row = $stat->fetch()){

		$noteID = $row['NoteID'];
		$stat2 = $conn->prepare("SELECT * FROM `Votes` WHERE NoteID = '$noteID'");
		$stat2->execute();
		$counterLikes = 0;
		$counterDislikes = 0;
		while($row2 = $stat2->fetch())
		{
			if($row2['type'] == 1)
  				$counterLikes++;
			else
				$counterDislikes++;
		}

?>
	<div class="col-sm-3">
		      <a <?php echo "href='../Notes Page/NotesPreview.php?id=".$row['NoteID']."'>"; ?>
					<img src="squareElement.png" style="width:100%">
			        <div class="centered"><h2 style="color: #fff;">
					<?php echo $row['TitleNote'];?>
					</br> Likes: <?php echo $counterLikes; ?>
					</br> Dislikes: <?php echo $counterDislikes; ?></h2></div>
				  </a>
        </div>
<?php
}

?>



<?php
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowerUserID = '$userID'");
        $stat->execute();
        $count = 0;
        $usernameArray = array();
        $links = array();
        while($row = $stat->fetch()){

          $FollowedUserID = $row['FollowedUserID'];
          $syn = "SELECT Username FROM Users WHERE UserID =" . $row['FollowedUserID'];
          $username = $conn2->query($syn)->fetch_object()->Username;
          array_push($usernameArray, $username);
          $link = "profile2.php?id=" . $FollowedUserID;
          array_push($links, $link);
          $count = $count + 1;
         }

?>






  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px"> <?php echo $count;?> Followings</h3>
    <div class="jumbotron Container-fluid">
        <?php
         for($counter = 0; $counter < $count; $counter++)
         { ?>
          <a href= "<?php echo $links[$counter]; ?>"> <?php echo $usernameArray[$counter]; ?> </a>
<?php
}
?>
<?php
$userID = $conn2->query("SELECT UserID FROM Users WHERE Username ='$_SESSION[username]'")->fetch_object()->UserID;//userID query
        $stat = $conn->prepare("SELECT  * FROM `Followers` WHERE FollowedUserID = '$userID'");
        $stat->execute();
        $count = 0;
        $usernameArray = array();
        $links = array();
        while($row = $stat->fetch()){
          $FollowerUserID = $row['FollowerUserID'];
          $syn = "SELECT Username FROM Users WHERE UserID =" . $row['FollowerUserID'];
          $username = $conn2->query($syn)->fetch_object()->Username;
          array_push($usernameArray, $username);
          $link = "profile2.php?id=" . $FollowerUserID;
          array_push($links, $link);
          $count = $count + 1;
         }

?>
    </div>
  </div>
  <div class="">
    <h3 style="font-size: 50px; padding-top: 30px; padding-left: 60px"><?php echo $count;?> Followers</h3>
	<div class="jumbotron Container-fluid">
        <?php
         for($counter = 0; $counter < $count; $counter++)
         { ?>
          <a href= "<?php echo $links[$counter]; ?>"> <?php echo $usernameArray[$counter]; ?> </a>
<?php
}
?>
	</div>
  </div>

</div>
</div>
<div class="row">
		 <div class="col-sm-12 container" style="padding-left: 20px;">


<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box" style="width:100%;"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1550317288312");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
			</div>
	</div>
</body>
<?php
require_once("../Header - Footer/footer.html");
?>
</html>
