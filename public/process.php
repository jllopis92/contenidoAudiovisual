<?php

date_default_timezone_set('America/Santiago');

$con = mysqli_connect('localhost','root','root','contenidoAudiovisual');

$type = $_POST['type'];

if($type == 'new'){
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$title = $_POST['title'];
	$url = $_POST['url'];

	$date1 = new DateTime($startdate);
	$start_at = $date1->format('Y-m-d H:i:s');
	
	$date2 = new DateTime($enddate);
	$end_at = $date2->format('Y-m-d H:i:s');

	$insert = mysqli_query($con,"INSERT INTO calendar(`title`, `startdate`, `enddate`, `start_at`, `end_at`, `url`, `allDay`) VALUES('$title','$startdate','$enddate','$start_at','$end_at','$url','false')");
	$lastid = mysqli_insert_id($con);
	echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($type == 'changetitle'){
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'resetdate'){
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$eventid = $_POST['eventid'];

	$date1 = new DateTime($startdate);
	$start_at = $date1->format('Y-m-d H:i:s');
	
	$date2 = new DateTime($enddate);
	$end_at = $date2->format('Y-m-d H:i:s');

	/*$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate', 'start_at' = '$start_at', 'end_at'= '$end_at' where id='$eventid'");*/

	
	$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate', start_at = '$start_at', end_at = '$end_at' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'remove'){
	$eventid = $_POST['eventid'];
	$delete = mysqli_query($con,"DELETE FROM calendar where id='$eventid'");
	if($delete)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'fetch'){
	$events = array();
	$query = mysqli_query($con, "SELECT * FROM calendar");
	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$e = array();
		$e['id'] = $fetch['id'];
		$e['title'] = $fetch['title'];
		$e['start'] = $fetch['startdate'];
		$e['end'] = $fetch['enddate'];

		$allday = ($fetch['allDay'] == "true") ? true : false;
		$e['allDay'] = $allday;

		array_push($events, $e);
	}
	echo json_encode($events);
}


?>