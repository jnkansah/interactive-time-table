<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>

<html>
<?php
include('../dist/includes/dbcon.php');
/* $schedule=mysqli_query($con,"select * from schedule")or die(mysqli_error($con));

$schedule_rows = array();
while($row=mysqli_fetch_array($schedule)){
	$schedule_rows[] = $row;
}
$room=mysqli_query($con,"select * from room")or die(mysqli_error($con));

$rooms_rows = array();
while($row=mysqli_fetch_array($room)){
	$room_rows[] = $row;
}
$time=mysqli_query($con,"select * from time")or die(mysqli_error($con));

$time_rows = array();
while($row=mysqli_fetch_array($time)){
	$time_rows[] = $row; */

?>	
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<script src="../dist/js/jquery.min.js"></script>
</head>

<body>
<?php
// print_r($_POST);
?>
<section class="content">
            <div class="row">
	      <div class="col-md-9">
              <div class="box box-warning">
               <form method="post" id="reg-form" action="bookingform.php">
                <div class="box-body">
				<div class="row">
					<div class="col-md-6">
							<table class="table table-bordered table-striped" style="margin-right:-10px">
							<thead>
							  <tr>
								<th>Time</th>
								<th>M</th>
								<th>W</th>
								<th>F</th>
								
							  </tr>
							</thead>
							
		<?php
				include('../dist/includes/dbcon.php');
				$query=mysqli_query($con,"select * from time where days='mwf' order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
								<td><?php echo $start."-".$end;?></td>
								<td><input type="radio" name="m[]" value="<?php echo $id;?>" style="width: 20px; height: 20px;"></td>
								<td><input type="radio" name="w[]" value="<?php echo $id;?>" style="width: 20px; height: 20px;"></td>
								<td><input type="radio" name="f[]" value="<?php echo $id;?>" style="width: 20px; height: 20px;"></td>
								
							  </tr>
							
		<?php }?>					  
		</table>    
		</div><!--col end -->
		<div class="col-md-6">
			<table class="table table-bordered table-striped">
								<thead>
								  <tr>
									<th>Time</th>
									<th>T</th>
									<th>TH</th>
									
								  </tr>
								</thead>
								
			<?php
					include('../dist/includes/dbcon.php');
					$query=mysqli_query($con,"select * from time where days='tth' order by time_start")or die(mysqli_error());
						
					while($row=mysqli_fetch_array($query)){
							$id=$row['time_id'];
							$start=date("h:i a",strtotime($row['time_start']));
							$end=date("h:i a",strtotime($row['time_end']));
			?>
								  <tr >
									<td><?php echo $start."-".$end;?></td>
									<td><input type="radio" name="t[]" value="<?php echo $id;?>" style="width: 20px; height: 20px;"></td>
									<td><input type="radio" name="th[]" value="<?php echo $id;?>" style="width: 20px; height: 20px;"></td>
									
								  </tr>
								
			<?php }?>					  
			</table>  
			<div class="result" id="form">
			<a href= "bookingform.php"><button type="submit" class="btn btn-primary btn-block btn-flat" default>Submit</button>
			</a>
					  </div>			
         </div><!--col end-->           
        </div><!--row end-->  
		</form>


</body>
</html>