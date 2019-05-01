<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Dignity For Volunteer - Event</title>
	<base href="{{base_url}}" />
	<meta name="viewport" content="width=1200" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!-- Facebook Open Graph -->
	<meta property="og:title" content="Login" />
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
	<link href="css/event.css?ts=1556705653" rel="stylesheet" type="text/css" />
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
				<div id="wb_element_instance26" class="wb_element wb-menu">
					<ul class="hmenu">
						<li><a href="Home" target="_self">Home</a></li>
						<li class="active"><a href="Event/" target="_self">Event</a></li>
						<li><a href="Upcoming/" target="_self">Upcoming</a></li>
						<li><a href="Register/" target="_self">Register</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div id="wb_element_instance27" class="wb_element wb_element_picture" title="">
					<a href="http://dignityforchildren.org/" target="1"><img alt="gallery/dignity_logo" src="gallery_gen/37c944c27b869908c211dea96575621f_190x60.png"></a>
				</div>
			</div>
			<div class="wb_cont_outer"></div>
			<div class="wb_cont_bg"></div>
		</div>
		<div class="vbox wb_container" id="wb_main">

			<div class="wb_cont_inner">
				<div id="wb_element_instance29" class="wb_element wb_text_element" style=" line-height: normal;">
					<h1 class="wb-stl-heading1">Become Volunteer ...</h1></div>
					<div id="wb_element_instance30" class="wb_element wb_text_element" style=" line-height: normal;">
						<p class="wb-stl-normal"><span dir="ltr" style="direction: ltr;">+1 212 736 3100</span></p>
						<p class="wb-stl-normal">Empire State Building</p>
						<p class="wb-stl-normal">350 5th Ave</p>
						<p class="wb-stl-normal">New York</p>
						<p class="wb-stl-normal">NY 10118</p>
						<p class="wb-stl-normal">USA</p>
					</div>
					<div id="wb_element_instance31" class="wb_element wb_text_element" style=" line-height: normal;">
						<h2 class="wb-stl-heading2">This text should be replaced with information about you and your business This text should be replaced with information about you and your business This text should be...</h2></div>
						<div id="wb_element_instance32" class="wb_element">
							<form class="wb_form" method="post" enctype="multipart/form-data">
								<input type="hidden" name="wb_form_id" value="a9e12055">
								<textarea name="message" rows="3" cols="20" class="hpc"></textarea>
								<table>
									<tr>
										<th>Name&nbsp;&nbsp;</th>
										<td>
											<input type="hidden" name="wb_input_0" value="Name">
											<input class="form-control form-field" type="text" value="" name="wb_input_0" required="required">
										</td>
									</tr>
									<tr>
										<th>E-mail&nbsp;&nbsp;</th>
										<td>
											<input type="hidden" name="wb_input_1" value="E-mail">
											<input class="form-control form-field" type="text" value="" name="wb_input_1" required="required">
										</td>
									</tr>
									<tr class="area-row">
										<th>Message&nbsp;&nbsp;</th>
										<td>
											<input type="hidden" name="wb_input_2" value="Message">
											<textarea class="form-control form-field form-area-field" rows="3" cols="20" name="wb_input_2" required="required"></textarea>
										</td>
									</tr>
									<tr class="form-footer">
										<td colspan="2">
											<button type="submit" class="btn btn-default">Submit</button>
										</td>
									</tr>
								</table>
							</form>
							<script type="text/javascript">
								<?php $wb_form_id = popSessionOrGlobalVar("wb_form_id"); if ($wb_form_id == "a9e12055") { ?>
									var formValues = <?php echo json_encode(popSessionOrGlobalVar("post")); ?>;
									var formErrors = <?php echo json_encode(popSessionOrGlobalVar("formErrors")); ?>;
									wb_form_validateForm("a9e12055", formValues, formErrors);
									<?php $wb_form_send_success = popSessionOrGlobalVar("wb_form_send_success");
									if (($wb_form_send_state = popSessionOrGlobalVar("wb_form_send_state"))) { ?>
										var prompt = $("<div>")
										.addClass("alert alert-<?php echo $wb_form_send_success ? "
											success " : "
											danger "; ?>")
										.css({
											position: "fixed",
											opacity: 0,
											right: "-50px",
											top: "10px",
											zIndex: 10000,
											fontSize: "24px",
											padding: "30px 50px",
											lineHeight: "24px",
											maxWidth: "748px"
										})
										.append("<?php echo str_replace('"
											', '\
											"', $wb_form_send_state); ?>")
										.prepend($("<button>").addClass("close")
											.css({
												marginRight: "-40px",
												marginTop: "-24px"
											})
											.html("&nbsp;&times;")
											.on("click", function() {
												$(this).parent().remove();
											})
											)
										.appendTo("body");
										setTimeout(function() {
											prompt.animate({
												opacity: 1,
												right: "10px"
											}, 250);
										}, 250);
										<?php $wb_form_send_success = false; $wb_form_send_state = null; ?>
									<?php } ?>
								<?php } ?>
							</script>
						</div>
						<div id="wb_element_instance33" class="wb_element" style="width: 100%;">
							<?php
							global $show_comments;
							if (isset($show_comments) && $show_comments) {
								renderComments(3);
								?>
								<script type="text/javascript">
									$(function() {
										var block = $("#wb_element_instance33");
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
										$("#wb_element_instance33").hide();
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
						<div id="wb_element_instance28" class="wb_element wb_text_element" style=" line-height: normal;">
							<p class="wb-stl-footer">© 2019 <a href="http://dignityforvolunteer.000webhostapp.com">dignityforvolunteer.000webhostapp.com</a></p>
						</div>
						<div id="wb_element_instance34" class="wb_element" style="text-align: center; width: 100%;">
							<div class="wb_footer"></div>
							<script type="text/javascript">
								$(function() {
									var footer = $(".wb_footer");
									var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
									if (!html) {
										footer.parent().remove();
										footer = $("#wb_footer, #wb_footer .wb_cont_inner");
										footer.css({
											height: ""
										});
									}
								});
							</script>
						</div>
					</div>
					<div class="wb_cont_outer"></div>
					<div class="wb_cont_bg"></div>
				</div>
				<div class="wb_sbg"></div>
			</div>{{hr_out}}</body>

			</html>