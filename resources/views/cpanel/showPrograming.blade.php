<!doctype html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="home_icon" href="/images/home.png">

    <title>CINECL UV</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sidebar_menu.js"></script>

	<script src="/dhtmlxScheduler_v4.3.1/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	<script src='/dhtmlxScheduler_v4.3.1/codebase/ext/dhtmlxscheduler_outerdrag.js' type="text/javascript"></script>
	<script src="/dhtmlxScheduler_v4.3.1/codebase/dhtmlxtree.js"></script>
	<link rel="stylesheet" href="/dhtmlxScheduler_v4.3.1/codebase/dhtmlxscheduler.css" type="text/css" title="no title" charset="utf-8">

	<link rel="stylesheet" type="text/css" href="/dhtmlxScheduler_v4.3.1/codebase/dhtmlxtree.css">
    

	<style type="text/css" media="screen">
		html, body {
			margin: 0px;
			padding: 0px;
			height: 100%;
			overflow: hidden;
		}
	</style>

	<script type="text/javascript" charset="utf-8">
		function init() {
			scheduler.config.xml_date = "%Y-%m-%d %H:%i";
			scheduler.config.icons_select = [
			   "icon_delete"
			];
			scheduler.config.touch = "true";
			scheduler.config.readonly = true;
			
			scheduler.init('scheduler_here', new Date(), "day");
			scheduler.load("dhtmlxScheduler_v4.3.1/samples/01_initialization_loading/data/events_safe.php");
			scheduler.attachEvent("onClick", function (id, e){
		        alert("text: "+id);
		        return true;
		  	});
			scheduler.attachEvent("onExternalDragIn", function(id, source, event){
			    var label = tree.getItemText(tree._dragged[0].id);
			    scheduler.getEvent(id).text = label;
			    return true;
			});

			var dp = new dataProcessor("dhtmlxScheduler_v4.3.1/samples/01_initialization_loading/data/events_safe.php");
			dp.init(scheduler);
		}
	</script>
</head>
<body onload="init();">
	<div id="scheduler_here" class="dhx_cal_container" style='width:50%; height:50%;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>
	</div>

	<div id="treeBox" style="width:200;height:200"></div>
</body>
