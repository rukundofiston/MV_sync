<html>
	<head>
		<meta charset="utf-8">
		<title>{block name=title}MVsync{/block}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="css/images/favicon.png">
		<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
	</head>
	<body>
	<div id="sidebar" class="collapse">
		<div class="logo">
	   		<a href="index.html"></a>
		</div>
		<ul id="sidebar_menu" class="navbar nav nav-list sidebar_box">
			<li class="accordion-group active">
				<a class="dashboard" href="index.html"><img src="img/menu_icons/dashboard.png">Dashboard</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="index.html"><img src="img/menu_icons/calendar.png">Dashboard</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="index.html"><img src="img/menu_icons/tables.png">Dashboard</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="index.html"><img src="img/menu_icons/dashboard.png">Dashboard</a>
			</li>
		</ul>
	</div>
	<div id="main">
		<div class="container">
			<div class="container_top">
				<div class="row-fluid">
					<div class="top_bar_stats to_hide_tablet">
					</div>
				</div>
				<div class="top-right">
					<ul class="nav ">
						<li>
							<!--<form class="form-search">
								<div class="input-append"><input type="text" class=" search-query" placeholder="Search.."></div>
							</form>-->
						</li>
					</ul>
					<ul class="nav nav_menu">
					</ul>
				</div>
			</div>
			<div class="container2">
				<div class="row-fluid">
					{block name=content}{/block}
				</div>
			</div>
		</div>
	</div>
	</body>
</html>