<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])) {
	echo "<link href='../config/adminstyle.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul Siakad, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Halaman Dosen</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/jquery.wysiwyg.css" type="text/css"/>

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							STIA Indragiri 2014					</small>					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-ok"></i>
									4 Tasks to complete								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="bar"></div>
										</div>
									</a>								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>										</div>

										<div class="progress progress-mini progress-danger">
											<div style="width:35%" class="bar"></div>
										</div>
									</a>								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>										</div>

										<div class="progress progress-mini progress-warning">
											<div style="width:15%" class="bar"></div>
										</div>
									</a>								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>										</div>

										<div class="progress progress-mini progress-success progress-striped active">
											<div style="width:90%" class="bar"></div>
										</div>
									</a>								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>									</a>								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									8 Notifications								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
												New Comments											</span>
											<span class="pull-right badge badge-info">+12</span>										</div>
									</a>								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Bob just signed up as an editor ...									</a>								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												New Orders											</span>
											<span class="pull-right badge badge-success">+8</span>										</div>
									</a>								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-twitter"></i>
												Followers											</span>
											<span class="pull-right badge badge-info">+11</span>										</div>
									</a>								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>									</a>								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-envelope-alt"></i>
									5 Messages								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>											</span>										</span>									</a>								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>											</span>										</span>									</a>								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>											</span>										</span>									</a>								</li>

								<li>
									<a href="#">
										See all messages
										<i class="icon-arrow-right"></i>									</a>								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/avatar.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome</small></span>

								<i class="icon-caret-down"></i>							</a>

						  <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings									</a>								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile									</a>								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php" title="Sign Out">
										<i class="icon-off"></i>
										Logout									</a>								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>			</a>

			<div class="sidebar" id="sidebar">
			  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						
					  <span class="menu-text"> <?php include "menu.php"; ?> </span>										</li>
				</ul>
				<!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
			  <i class="icon-double-angle-left"></i>				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="?module=home">Home</a>


					</ul><!--.breadcrumb--><!--#nav-search-->
				</div>

				<div class="page-content"><!--/.page-header-->

								<span class="content-box-content">
								<?php include "content.php"; ?>
								</span></div>

						  <div id="modal-table" class="modal hide fade" tabindex="-1">
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										Results for "Latest Registered Domains"									</div>
								</div>

								<div class="modal-body no-padding">
									<div class="row-fluid">
										<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
											<thead>
												<tr>
													<th>Domain</th>
													<th>Price</th>
													<th>Clicks</th>

													<th>
														<i class="icon-time bigger-110"></i>
														Update													</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>
														<a href="#">ace.com</a>													</td>
													<td>$45</td>
													<td>3,330</td>
													<td>Feb 12</td>
												</tr>

												<tr>
													<td>
														<a href="#">base.com</a>													</td>
													<td>$35</td>
													<td>2,595</td>
													<td>Feb 18</td>
												</tr>

												<tr>
													<td>
														<a href="#">max.com</a>													</td>
													<td>$60</td>
													<td>4,400</td>
													<td>Mar 11</td>
												</tr>

												<tr>
													<td>
														<a href="#">best.com</a>													</td>
													<td>$75</td>
													<td>6,500</td>
													<td>Apr 03</td>
												</tr>

												<tr>
													<td>
														<a href="#">pro.com</a>													</td>
													<td>$55</td>
													<td>4,250</td>
													<td>Jan 21</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
										<i class="icon-remove"></i>
										Close									</button>

									<div class="pagination pull-right no-margin">
										<ul>
											<li class="prev disabled">
												<a href="#">
													<i class="icon-double-angle-left"></i>												</a>											</li>

											<li class="active">
												<a href="#">1</a>											</li>

											<li>
												<a href="#">2</a>											</li>

											<li>
												<a href="#">3</a>											</li>

											<li class="next">
												<a href="#">
													<i class="icon-double-angle-right"></i>												</a>											</li>
										</ul>
									</div>
								</div>
							</div><!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

			 
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

				<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
        <script language="javascript" type="text/javascript"
src="../tinymcpuk/tiny_mce_src.js"></script>
<script type="text/javascript">
tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
                    "aaSorting":[[0, "asc"]],
                });
            })
			
		</script>
	</body>
</html>
<?php
}
?>