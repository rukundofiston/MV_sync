<html>
	<head>
		<meta charset="utf-8">
		<title>{block name=title}MVsync{/block}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="css/images/favicon.png">
		<link href="../css/jquery-ui.css" rel="stylesheet">
		<link href="../css/admin/base.css" rel="stylesheet">
		<link href="../css/admin/style.css" rel="stylesheet">
		<link href="../css/admin/responsive.css" rel="stylesheet">
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript" src="js/ajout.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
	</head>
	<body>
	<div id="sidebar" class="collapse">
		<div class="logo">
	   		<a href="index.html"></a>
		</div>
		<ul id="sidebar_menu" class="navbar nav nav-list sidebar_box">
			<li class="accordion-group active">
				<a class="dashboard" href="delegues.php">
					<img src="img/menu_icons/dashboard.png">Délégué</a>
			</li>
			<li class="accordion-group active">
				<a class="dashboard" href="superviseur.php">
					<img src="img/menu_icons/dashboard.png">Superviseur</a>
			</li>
			<li class="accordion-group active">
				<a class="dashboard" href="comptes.php">
					<img src="img/menu_icons/dashboard.png">Administrateur</a>
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