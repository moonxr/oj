<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<?php include("template/$OJ_TEMPLATE/css.php");?>     
  <?php include("template/$OJ_TEMPLATE/js.php");?> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
	<?php require_once("oj-header.php");?>
<div id=main>
	
<link href='highlight/styles/shCore.css' rel='stylesheet' type='text/css'/> 
<link href='highlight/styles/shThemeDefault.css' rel='stylesheet' type='text/css'/> 
<script src='highlight/scripts/shCore.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushCpp.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushCss.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushJava.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushDelphi.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushRuby.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushBash.js' type='text/javascript'></script>
<script src='highlight/scripts/shBrushPython.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushPhp.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushPerl.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushCSharp.js' type='text/javascript'></script> 
<script src='highlight/scripts/shBrushVb.js' type='text/javascript'></script>

<script language='javascript'> 
SyntaxHighlighter.config.bloggerMode = false;
SyntaxHighlighter.config.clipboardSwf = 'highlight/scripts/clipboard.swf';
SyntaxHighlighter.all();
</script>
<?php

   if ($ok==true){
		if($view_user_id!=$_SESSION['user_id'])
			echo "<a href='mail.php?to_user=$view_user_id&title=$MSG_SUBMIT $id'>Mail the auther</a>";
		$brush=strtolower($language_name[$slanguage]);
		if ($brush=='pascal') $brush='delphi';
		if ($brush=='obj-c') $brush='c';
		if ($brush=='freebasic') $brush='vb';
		echo "<pre class=\"brush:".$brush.";\">";
		ob_start();
		echo "/**************************************************************\n";
		echo "\tProblem: $sproblem_id\n\tUser: $suser_id\n";
		echo "\tLanguage: ".$language_name[$slanguage]."\n\tResult: ".$judge_result[$sresult]."\n";
		if ($sresult==4){
			echo "\tTime:".$stime." ms\n";
			echo "\tMemory:".$smemory." kb\n";
		}
		echo "****************************************************************/\n\n";
		$auth=ob_get_contents();
		ob_end_clean();

		echo htmlspecialchars(str_replace("\n\r","\n",$view_source))."\n".$auth."</pre>";
		
	}else{
		
		echo "I am sorry, You could not view this code!";
	}
?>
</div><!--end main-->
<div id=foot>
	<?php require_once("oj-footer.php");?>
</div><!--end foot-->

</div><!--end wrapper-->
</body>
</html>