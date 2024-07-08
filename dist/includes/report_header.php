<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<style>
	span{
		font-size: 11px!important;
	}
	table td,th{
		border: 1px solid black;
		
	}
	table{
		border-collapse:collapse;
		text-align:center;
		font-size:9px;
	}
	tr{
		height:45px;
	}
	thead tr {
		height:5px!important;
	}
	.logo{
		float:left;
		margin-left:100px
	}
	.logo2{
		float:right;
		margin-right:100px
	}
	.wrapper_print{
		width:60%;
		margin:auto;
	}
	.first{
		width:50px
	}
	.action a{
		float:right;
		color:#ff0000;
		text-decoration:none;
		font-weight:bolder;
	}
	th{
		width:25%
	}
	.sec{
		width:30%;
	}
	.hideme{
		display:none;
	}
	.showme{
		font-size: 10px!important;
	}
	ul li{
		list-style-type:none;
		display:block;
		text-align: center;
		margin-left:-40px;

	}
	ul{
		margin-bottom: 0px;
	}
	.options{
		
	}
</style>
<h5 align = "center">

<?php
	
	if($member<>"")
	{
		$room="";
		$class="";	
		$text="Faculty";
		$value=$row['member_salut']." ".$row['member_first']." ".$row['member_last'];  
		echo "FACULTY SCHEDULE";
		$displaym="hideme";
		$displayr="showme";
		$displayc="showme";
		
	}
	elseif($room<>"")
	{
		$member="";
		$class="";
		$text="Room";
		$value=$room;
		echo "ROOM SCHEDULE";
		$displayr="hideme";
		$displayc="showme";
		$displaym="showme";
	}
	elseif($class<>"")
	{
		$room="";
		$member="";
		$text="Class";
		$value=$class;
		echo "CLASS SCHEDULE";
		$displayc="hideme";
		$displaym="showme";
		$displayr="showme";
	}
?>

</h5>
