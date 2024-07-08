<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>

<html>  
<?php
include('../dist/includes/dbcon.php');
?>
<head>  
</head>  
<body bgcolor="Lightskyblue">  

<?php
$room_rows = array();
$query2=mysqli_query($con,"select * from room order by room")or die(mysqli_error($con));
	while($row=mysqli_fetch_array($query2)){
	$room_rows[]=$row;
	}
$find_time = function($time_id, $day){
include('../dist/includes/dbcon.php');
$schedule=mysqli_query($con,"select * from schedule where time_id='$time_id' and day='$day'") or die(mysqli_error($con));
$sched_rows=array();
	while($row=mysqli_fetch_array($schedule)){
	$sched_rows[]=$row;
	}
return $sched_rows;
};
if($_POST["m"]){
$time_id_m = $_POST["m"][0];
$_SESSION["time_id"] = $_POST["m"][0];
$sched_events = $find_time($time_id_m, "m");
$sched_room = $sched_events[0]["room"];
$rooms=array_map(fn($row)=>$row["room"],$room_rows);
$available_rooms = array_filter($rooms, function($room){
global $sched_room;
if ($room === $sched_room){
	return false;
} else{
	return true;
}
});
// print_r($available_rooms);
// print_r($sched_events);
// print_r($room_rows);
}
?>

<form method="POST" action="savebooking1.php">  
<label> Name: </label>         
<input type="text" name= "name" size="15"/> <br> <br>  
<label> Class: </label>         
<input type="text" name= "class" size="15"/> <br> <br>  
<label> Room: </label>
<select name= "room"> 
<?php 
foreach ($available_rooms as $freeroom){
echo "<option value=".$freeroom['room'].">".$freeroom."</option>"; 
}
?>
</select>

<button type="submit" name="submit"> SUBMIT </button>
</form>
</body>
</html>