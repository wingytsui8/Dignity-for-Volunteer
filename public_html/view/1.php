<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Home</title>
	<base href="{{base_url}}" />
	<meta name="viewport" content="width=1200" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!-- Facebook Open Graph -->
	<meta property="og:title" content="Home" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{curr_url}}" />
	<!-- Facebook Open Graph end -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js?v=20190117142751" type="text/javascript"></script>
	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20190117142750" rel="stylesheet" type="text/css" />
	<link href="css/common.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<link href="css/1.css?ts=1556705653" rel="stylesheet" type="text/css" />
	<ga-code/>
	<script type="text/javascript">
		window.useTrailingSlashes = true;
	</script>
	<link href="css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="root">
		<div class="vbox wb_container" id="wb_header">
			<div class="wb_cont_inner">
				<div id="wb_element_instance0" class="wb_element wb-menu">
					<ul class="hmenu">
						<li class="active">
							<a href="" target="_self">Home</a>
						</li>
						<li>
							<a href="Event/" target="_self">Event</a>
						</li>
						<li>
							<a href="About/" target="_self">About</a>
						</li>
						<li>
							<a href="Login/" target="_self">Login</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div id="wb_element_instance1" class="wb_element wb_element_picture" title="">
					<a href="http://dignityforchildren.org/" target="1">
						<img alt="gallery/dignity_logo" src="gallery_gen/37c944c27b869908c211dea96575621f_190x60.png">
					</a>
				</div>
			</div>
			<div class="wb_cont_outer"></div>
			<div class="wb_cont_bg"></div>
		</div>
		<div class="vbox wb_container" id="wb_main">
			<div class="wb_cont_inner">
				<div id="wb_element_instance3" class="wb_element wb-elm-orient-horizontal">
					<div class="wb-elm-line"></div>
				</div>
				<div id="wb_element_instance4" class="wb_element wb_text_element" style=" line-height: normal;">
					<h1 class="wb-stl-heading1">About us</h1>
				</div>
				<div id="wb_element_instance5" class="wb_element wb_text_element" style=" line-height: normal;">
					<h2 class="wb-stl-heading2">Easier life</h2>
					<p class="wb-stl-normal">Please insert information that will be useful to your customers here...</p>
				</div>
				<div id="wb_element_instance6" class="wb_element wb_text_element" style=" line-height: normal;">
					<h2 class="wb-stl-heading2">Categories</h2>
					<p class="wb-stl-normal">This text should be replaced with information about you and your...</p>
				</div>
				<div id="wb_element_instance7" class="wb_element wb_text_element" style=" line-height: normal;">
					<h2 class="wb-stl-heading2">Advantages</h2>
					<p class="wb-stl-normal">You will find the latest information about our company here. You will...</p>
				</div>
				<div id="wb_element_instance8" class="wb_element wb_text_element" style=" line-height: normal;">
					<h2 class="wb-stl-heading2">WHO IS DIGNITY?</h2>
					<p></p>
					<p class="wb-stl-custom2">
						<strong>Dignity for Children Foundation is a non-governmental organization that provides holistic care and education for urban poor children in Kuala Lumpur, Malaysia.</strong>
					</p>
					<p></p>
					<p class="wb-stl-custom2">Dignity 
						<strong>
							primarily operates Harvest Learning Centre that serves over 1000 children and youth aged 1-18 years.
						</strong> 
						Other than operating education programmes in Sentul, Dignity also supports other community schools working with poor children in South East Asia through its 
						<strong>
							community-school start up
						</strong> and teachers’ training programmes.
					</p>
				</div>
				<div id="wb_element_instance9" class="wb_element">
					<a class="wb_button" href="About/">
						<span>Register Event</span>
					</a>
				</div>
				<div id="wb_element_instance10" class="wb_element wb_text_element" style=" line-height: normal;">
					<h5 class="wb-stl-subtitle" style="text-align: center;">Dignity for volunteer</h5>
				</div>
				<div id="wb_element_instance11" class="wb_element wb_text_element" style=" line-height: normal;">
					<p class="wb-stl-normal" style="text-align: center;">
						<span style="color:#ffffff;">This text should be replaced with information about you and your business This text should be replaced with information about you and your business This text should be replaced with information...
						</span>
					</p>
				</div>
				<div id="wb_element_instance12" class="wb_element wb_element_shape">
					<div class="wb_shp"></div>
				</div>
				<div id="wb_element_instance13" class="wb_element" style="width: 100%;">
					<?php
					global $show_comments;
					if (isset($show_comments) && $show_comments) {
						renderComments(1);
						?>
						<script type="text/javascript">
							$(function() {
								var block = $("#wb_element_instance13");
								var comments = block.children(".wb_comments").eq(0);
								var contentBlock = $("#wb_main");
								contentBlock.height(contentBlock.height() + comments.height());
							});
						</script>
						<?php
					} else {
						?>
						<script type="text/javascript">
							$(function() {
								$("#wb_element_instance13").hide();
							});
						</script>
						<?php
					}
					?>
				</div>
			</div>
			<div class="wb_cont_outer"></div>
			<div class="wb_cont_bg"></div>
		</div>
		<div class="vbox wb_container" id="wb_footer">
			<div class="wb_cont_inner" style="height: 144px;">
				<div id="wb_element_instance2" class="wb_element wb_text_element" style=" line-height: normal;">
					<p class="wb-stl-footer">© 2019 
						<a href="http://dignityforvolunteer.000webhostapp.com">dignityforvolunteer.000webhostapp.com</a>
					</p>
				</div>
				<div id="wb_element_instance14" class="wb_element" style="text-align: center; width: 100%;">
					<div class="wb_footer"></div>
					<script type="text/javascript">
						$(function() {
							var footer = $(".wb_footer");
							var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
							if (!html) {
								footer.parent().remove();
								footer = $("#wb_footer, #wb_footer .wb_cont_inner");
								footer.css({height: ""});
							}
						});
					</script>
				</div>
			</div>
			<div class="wb_cont_outer"></div>
			<div class="wb_cont_bg"></div>
		</div>
		<div class="wb_sbg"></div>
	</div>{{hr_out}}
</body>
</html>
